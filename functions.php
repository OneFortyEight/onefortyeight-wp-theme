<?php
// The following enable theme support for post thumbnails and menus
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );

// Load front-end styles
function ofe_theme_styles() {
	wp_enqueue_style( 'colorbox_css', get_template_directory_uri().'/includes/colorbox/example1/colorbox.css' );
	wp_enqueue_style( 'global_css', get_template_directory_uri().'/style.css' );
	if( is_front_page() ) {
		wp_enqueue_style( 'home_css', get_template_directory_uri().'/css/home.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'ofe_theme_styles' );

// Load front-end scripts
function ofe_theme_scripts() {
	wp_enqueue_script( 'modernizr_js', get_template_directory_uri().'/js/modernizr.js' );
	wp_enqueue_script( 'colorbox_js', get_template_directory_uri().'/includes/colorbox/jquery.colorbox-min.js', array( 'jquery' ) );
	wp_enqueue_script( 'global_js', get_template_directory_uri().'/js/global.js', array( 'jquery' ) );
	if( is_front_page() ) {
		wp_enqueue_script( 'home_js', get_template_directory_uri().'/js/home.js', array( 'jquery' ) );
	}
}
add_action( 'wp_enqueue_scripts', 'ofe_theme_scripts' );

// Initiate sidebar widget area
function ofe_widgets_init() {
	register_sidebar( array(
		'name'          => 'Main Sidebar',
		'id'            => 'main-sidebar',
		'description'	=> 'This sidebar can be used for sub-menus and/or sidebar ads.',
		'before_widget' => '<div class="sidebar-widget wp-widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="title">',
		'after_title'   => '</div>',
	) );
}
add_action( 'widgets_init', 'ofe_widgets_init' );

// Register menus
function ofe_register_menus() {
	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu' )
		)
	);
}
add_action( 'init', 'ofe_register_menus' );
?>