<?php 
//var
define('ROOT_DIR', get_theme_file_path());
define('STYLES_DIR', get_template_directory_uri() . '/assets/css');
define('IMAGES_DIR', get_template_directory_uri() . '/assets/images');
define('SCRIPTS_DIR', get_template_directory_uri() . '/assets/js');
define('INCLUDES_DIR', ROOT_DIR . '/includes');

//Includes
include_once(INCLUDES_DIR . '/enqueue.php');

?>