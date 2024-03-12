<?php

function pmxe_prepend($string, $orig_filename) {
	$context = stream_context_create();
	$orig_file = fopen($orig_filename, 'r', 1, $context);

	$temp_filename = tempnam(sys_get_temp_dir(), 'php_prepend_');
	file_put_contents($temp_filename, $string);
	file_put_contents($temp_filename, $orig_file, FILE_APPEND);

	fclose($orig_file);
	unlink($orig_filename);
	rename($temp_filename, $orig_filename);
}

function pmxe_pmxe_after_export($export_id, $export)
{
	if ( ! empty(PMXE_Plugin::$session) and PMXE_Plugin::$session->has_session() )
	{
		PMXE_Plugin::$session->set('file', '');
		PMXE_Plugin::$session->save_data();
	}

	if ( ! $export->isEmpty())
    {

        $export->set(
            array(
                'registered_on' => current_time( 'mysql', 1 ),
            )
        )->save();

		$splitSize = $export->options['split_large_exports_count'];

		$exportOptions = $export->options;
		// remove previously genereted chunks
		if ( ! empty($exportOptions['split_files_list']) and ! $export->options['creata_a_new_export_file'] )
		{
			foreach ($exportOptions['split_files_list'] as $file) {
				@unlink($file);
			}
		}

		$is_secure_import = PMXE_Plugin::getInstance()->getOption('secure');

		if ( ! $is_secure_import)
		{
			$filepath = get_attached_file($export->attch_id);
		}
		else
		{
			$filepath = wp_all_export_get_absolute_path($export->options['filepath']);
		}

		//TODO: Look into what is happening with this variable and what it is used for
		$is_export_csv_headers = apply_filters('wp_all_export_is_csv_headers_enabled', true, $export->id);

        if ( isset($export->options['include_header_row']) ) {
            $is_export_csv_headers = $export->options['include_header_row'];
        }

		$removeHeaders = false;

		$removeHeaders = apply_filters('wp_all_export_remove_csv_headers', $removeHeaders, $export->id);

        // Remove headers row from CSV file
        if ( (empty($is_export_csv_headers) && @file_exists($filepath) && $export->options['export_to'] == 'csv' && $export->options['export_to_sheet'] == 'csv') || $removeHeaders){

            $tmp_file = str_replace(basename($filepath), 'iteration_' . basename($filepath), $filepath);
            copy($filepath, $tmp_file);
            $in  = fopen($tmp_file, 'r');
            $out = fopen($filepath, 'w');

            $headers = fgetcsv($in, 0, XmlExportEngine::$exportOptions['delimiter']);

            if (is_resource($in)) {
                $lineNumber = 0;
                while ( ! feof($in) ) {
                    $data = fgetcsv($in, 0, XmlExportEngine::$exportOptions['delimiter']);
                    if ( empty($data) ) continue;
                    $data_assoc = array_combine($headers, array_values($data));
                    $line = array();
                    foreach ($headers as $header) {
                        $line[$header] = ( isset($data_assoc[$header]) ) ? $data_assoc[$header] : '';
                    }
                    if ( ! $lineNumber && XmlExportEngine::$exportOptions['include_bom']){
                        fwrite($out, chr(0xEF).chr(0xBB).chr(0xBF));
                        fputcsv($out, $line, XmlExportEngine::$exportOptions['delimiter']);
                    }
                    else{
                        fputcsv($out, $line, XmlExportEngine::$exportOptions['delimiter']);
                    }
                    apply_filters('wp_all_export_after_csv_line', $out, XmlExportEngine::$exportID);
                    $lineNumber++;
                }
                fclose($in);
            }
            fclose($out);
            @unlink($tmp_file);
        }

		$preCsvHeaders = false;
		$preCsvHeaders = apply_filters('wp_all_export_pre_csv_headers', $preCsvHeaders, $export->id);

		if($preCsvHeaders) {
			pmxe_prepend($preCsvHeaders."\n", $filepath);
		}

		// Split large exports into chunks
		if ( $export->options['split_large_exports'] and $splitSize < $export->exported )
		{

			$exportOptions['split_files_list'] = array();

			if ( @file_exists($filepath) )
			{

				switch ($export->options['export_to'])
				{
					case 'xml':

                        require_once PMXE_ROOT_DIR . '/classes/XMLWriter.php';

					    switch ( $export->options['xml_template_type'])
                        {
                            case 'XmlGoogleMerchants':
                            case 'custom':
                                // Determine XML root element
                                $main_xml_tag   = false;
                                preg_match_all("%<[\w]+[\s|>]{1}%", $export->options['custom_xml_template_header'], $matches);
                                if ( ! empty($matches[0]) ){
                                  $main_xml_tag = preg_replace("%[\s|<|>]%","",array_shift($matches[0]));
                                }
                                // Determine XML recond element
                                $record_xml_tag = false;
                                preg_match_all("%<[\w]+[\s|>]{1}%", $export->options['custom_xml_template_loop'], $matches);
                                if ( ! empty($matches[0]) ){
                                  $record_xml_tag = preg_replace("%[\s|<|>]%","",array_shift($matches[0]));
                                }

                                $xml_header = PMXE_XMLWriter::preprocess_xml($export->options['custom_xml_template_header']);
                                $xml_footer = PMXE_XMLWriter::preprocess_xml($export->options['custom_xml_template_footer']);

                            break;

                            default:
                                $main_xml_tag = apply_filters('wp_all_export_main_xml_tag', $export->options['main_xml_tag'], $export->id);
                                $record_xml_tag = apply_filters('wp_all_export_record_xml_tag', $export->options['record_xml_tag'], $export->id);
                                $xml_header = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>" . "\n" . "<".$main_xml_tag.">";
                                $xml_footer = "</".$main_xml_tag.">";
                            break;

                        }


						$records_count = 0;
						$chunk_records_count = 0;
						$fileCount = 1;

						$feed = $xml_header;

						if($export->options['xml_template_type'] == 'custom'){
							$outputFileTemplate = str_replace(basename($filepath), str_replace('.xml', '', basename($filepath)) . '-{FILE_COUNT_PLACEHOLDER}.xml', $filepath);
							$exportOptions['split_files_list'] = wp_all_export_break_into_files($record_xml_tag, -1, $splitSize, file_get_contents($filepath), null, $outputFileTemplate);

							// Remove first file which just contains the empty data tag
							@unlink($exportOptions['split_files_list'][0]);
							array_shift($exportOptions['split_files_list']);
						}
					 	else {
							$file = new PMXE_Chunk($filepath, array('element' => $record_xml_tag, 'encoding' => 'UTF-8'));
							// loop through the file until all lines are read
							while ($xml = $file->read()) {

								if ( ! empty($xml) )
								{
									$records_count++;
									$chunk_records_count++;
									$feed .= $xml;
								}

								if ( $chunk_records_count == $splitSize or $records_count == $export->exported ){
									$feed .= "\n".$xml_footer;
									$outputFile = str_replace(basename($filepath), str_replace('.xml', '', basename($filepath)) . '-' . $fileCount++ . '.xml', $filepath);
									file_put_contents($outputFile, $feed);
									if ( ! in_array($outputFile, $exportOptions['split_files_list']))
										$exportOptions['split_files_list'][] = $outputFile;
									$chunk_records_count = 0;
									$feed = $xml_header;
								}
							}
						}

						break;
					case 'csv':
						$in = fopen($filepath, 'r');

						$rowCount  = 0;
						$fileCount = 1;
						$headers = fgetcsv($in);
						while (!feof($in)) {
						    $data = fgetcsv($in);
						    if (empty($data)) continue;
						    if (($rowCount % $splitSize) == 0) {
						        if ($rowCount > 0) {
						            fclose($out);
						        }
						        $outputFile = str_replace(basename($filepath), str_replace('.csv', '', basename($filepath)) . '-' . $fileCount++ . '.csv', $filepath);
						        if ( ! in_array($outputFile, $exportOptions['split_files_list']))
						        	$exportOptions['split_files_list'][] = $outputFile;

						        $out = fopen($outputFile, 'w');
						    }
						    if ($data){
						    	if (($rowCount % $splitSize) == 0) {
						    		fputcsv($out, $headers);
						    	}
						        fputcsv($out, $data);
						    }
						    $rowCount++;
						}
						fclose($in);
						fclose($out);

						break;

					default:

						break;
				}

				$export->set(array('options' => $exportOptions))->save();
			}
		}

		// make a temporary copy of current file
		if ( empty($export->parent_id) and @file_exists($filepath) and @copy($filepath, str_replace(basename($filepath), '', $filepath) . 'current-' . basename($filepath)))
		{
			$exportOptions = $export->options;
			$exportOptions['current_filepath'] = str_replace(basename($filepath), '', $filepath) . 'current-' . basename($filepath);
			$export->set(array('options' => $exportOptions))->save();
		}

		$generateBundle = apply_filters('wp_all_export_generate_bundle', true);

		if($generateBundle) {

			// genereta export bundle
			$export->generate_bundle();

			if ( ! empty($export->parent_id) )
			{
				$parent_export = new PMXE_Export_Record();
				$parent_export->getById($export->parent_id);
				if ( ! $parent_export->isEmpty() )
				{
					$parent_export->generate_bundle(true);
				}
			}
		}

		// clean session
		if ( ! empty(PMXE_Plugin::$session) and PMXE_Plugin::$session->has_session() )
		{
			PMXE_Plugin::$session->clean_session( $export->id );
		}
	}
}