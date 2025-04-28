<?php
/**
 * Plugin Name: My Addon
 * Description: Learning Elementor Widget Development.
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  
 * Text Domain: my-addon
 *
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

function register_hello_world_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/heading.php' );
	require_once( __DIR__ . '/widgets/image.php' );
    require_once( __DIR__ . '/widgets/my-icon.php' );


	$widgets_manager->register( new \Heading() );
	$widgets_manager->register( new \My_Image() );
	$widgets_manager->register( new \My_Icon() );

}
add_action( 'elementor/widgets/register', 'register_hello_world_widget' );