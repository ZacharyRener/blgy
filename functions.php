<?php 
//Dequeue JavaScripts
function project_dequeue_unnecessary_scripts() {
    wp_dequeue_script( 'fullwidthbanner.js' );
        wp_deregister_script( 'fullwidthbanner.js' );
    //wp_dequeue_script( 'project-js' );
      //  wp_deregister_script( 'project-js' );
       wp_dequeue_style('flexslider-css' );
    
}
add_action( 'wp_print_scripts', 'project_dequeue_unnecessary_scripts' );

add_image_size('slide-img', 1900, 500, true );
add_image_size('portfolio-img', 800, 0 );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_stylesheet_directory() . '/Front-End-Toolkit/include/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );