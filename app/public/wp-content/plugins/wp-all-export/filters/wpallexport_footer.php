<?php

function pmxe_wpallexport_footer($html){
	$src = PMXE_ROOT_URL.'/static/img/f_logo_RGB-Blue_250.png';
	$text = __('Discuss, share your work, and learn from the best.', 'wp_all_export_plugin');
	$created =  esc_html__('Created by', 'wp_all_export_plugin');

	$html = <<<EOT
	<div class="wpallexport-footer">
	<div class="wpallexport-footer-left-column">
	
	</div>
	<div class="wpallexport-soflyy">
		<a href="http://soflyy.com/" target="_blank" class="wpallexport-created-by">{$created}<span></span></a>
	</div>
	<div class="wpallexport-cta-text-link">
	    <a href="https://www.facebook.com/groups/wpallimport" target="_blank" ><img src="{$src}" alt="Find us on Facebook"/></a>
        <p><a href="https://www.facebook.com/groups/wpallimport" target="_blank" >{$text}</a></p>
    </div>
	</div>
EOT;

	return $html;
}