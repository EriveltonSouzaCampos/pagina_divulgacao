<?php 
function enqueue(){
    //register
    wp_register_style('style', get_stylesheet_uri(), [], '1.0.0', false);
    wp_register_style( 'head', STYLES_DIR . '/header_style.css', [], '1.0.0', false );
    wp_register_style( 'reset', STYLES_DIR . '/reset.css', [], '1.0.0', false );


    //enqueue
    wp_enqueue_style('style');
    wp_enqueue_style( 'head' );
    wp_enqueue_style( 'reset' );
    
}
?>