<?php
/**
 * Functions and definitions for Agro Theme (fixed)
 */

if ( ! function_exists( 'agro_setup' ) ) {
    function agro_setup() {
        load_theme_textdomain( 'agro-theme', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'agro-theme' ),
        ) );
    }
}
add_action( 'after_setup_theme', 'agro_setup' );

function agro_enqueue_assets() {
    // Fonts: preferred local fonts (from logobook) or fall back to Google
    // If you placed local webfonts in assets/fonts/, fonts.css will load them.
    wp_enqueue_style( 'agro-theme-fonts', get_template_directory_uri() . '/assets/css/fonts.css', array(), '1.0' );

    // Google Fonts fallback (used if local fonts are not installed)
    wp_enqueue_style( 'agro-theme-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Inter:wght@300;400;600&display=swap', array(), null );

    // Styles
    wp_enqueue_style( 'agro-theme-style', get_stylesheet_uri(), array( 'agro-theme-google-fonts', 'agro-theme-fonts' ), wp_get_theme()->get( 'Version' ) );
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

    register_sidebar( array(
        'name'          => __( 'Sidebar', 'agro-theme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Main sidebar', 'agro-theme' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'agro_widgets_init' );

// Load internal includes (CPTs, helpers)
require_once get_template_directory() . '/inc/init.php';

// Flush rewrite rules after theme switch (safe method): set flag on switch, flush on init (after CPT registration)
function agro_flag_flush_rewrite() {
    add_option( 'agro_flush_rewrite', 1 );
}
add_action( 'after_switch_theme', 'agro_flag_flush_rewrite' );

function agro_maybe_flush_rewrite() {
    if ( get_option( 'agro_flush_rewrite' ) ) {
        // Ensure CPTs are registered before flushing; inc/cpt files are loaded above on init
        flush_rewrite_rules();
        delete_option( 'agro_flush_rewrite' );
    }
}
add_action( 'init', 'agro_maybe_flush_rewrite', 20 );

// Helper: inline SVG sprite helper (returns SVG symbol by id)
function agro_get_svg( $id, $class = '' ) {
    $svg_path = get_template_directory() . '/assets/img/icons.svg';
    if ( ! file_exists( $svg_path ) ) {
        return '';
    }
    $svg = file_get_contents( $svg_path );
    if ( ! $svg ) {
        return '';
    }
    // Return <svg><use xlink:href="#id"></use></svg>
    $safe_id = esc_attr( $id );
    $class_attr = $class ? ' class="' . esc_attr( $class ) . '"' : '';
    return '<svg' . $class_attr . ' role="img" aria-hidden="true"><use xlink:href="#' . $safe_id . '"></use></svg>';
}

// Secure output helpers
function agro_esc_attr( $str ) {
    return esc_attr( $str );
}
