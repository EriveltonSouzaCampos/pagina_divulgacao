<?php 
function enqueue(){
    wp_register_style('style', get_stylesheet_uri(), [], '1.0.0', false);
    wp_register_style( 'head', STYLE_DIR . '/header_style.css', [], '1.0.0', false );
    
}
?>