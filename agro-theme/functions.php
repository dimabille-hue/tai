<?php
/**
 * Functions and definitions for Agro Theme (fixed)
 */

if ( ! function_exists( 'agro_setup' ) ) {
    function agro_setup() {
        load_theme_textdomain( 'agro-theme', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'agro-theme' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'agro_setup' );

function agro_enqueue_assets() {
    // Styles
    wp_enqueue_style( 'agro-theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'agro-theme-main', get_template_directory_uri() . '/assets/css/theme.css', array(), '1.0' );

    // Scripts (no jQuery forced)
    wp_enqueue_script( 'agro-theme-main', get_template_directory_uri() . '/assets/js/theme.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'agro_enqueue_assets' );

// Basic widgets area
function agro_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Widgets', 'agro-theme' ),
        'id'            => 'footer-widgets',
        'description'   => __( 'Widgets in footer area', 'agro-theme' ),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'agro_widgets_init' );

// Load internal includes (CPTs, helpers)
require_once get_template_directory() . '/inc/init.php';

// Secure output helpers
function agro_esc_attr( $str ) {
    return esc_attr( $str );
}
