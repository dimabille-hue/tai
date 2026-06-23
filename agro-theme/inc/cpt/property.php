<?php
/**
 * Register 'property' custom post type
 */
function agro_register_property_cpt() {
    $labels = array(
        'name'               => _x( 'Properties', 'post type general name', 'agro-theme' ),
        'singular_name'      => _x( 'Property', 'post type singular name', 'agro-theme' ),
        'menu_name'          => _x( 'Properties', 'admin menu', 'agro-theme' ),
        'name_admin_bar'     => _x( 'Property', 'add new on admin bar', 'agro-theme' ),
        'add_new'            => _x( 'Add New', 'property', 'agro-theme' ),
        'add_new_item'       => __( 'Add New Property', 'agro-theme' ),
        'new_item'           => __( 'New Property', 'agro-theme' ),
        'edit_item'          => __( 'Edit Property', 'agro-theme' ),
        'view_item'          => __( 'View Property', 'agro-theme' ),
        'all_items'          => __( 'All Properties', 'agro-theme' ),
        'search_items'       => __( 'Search Properties', 'agro-theme' ),
        'not_found'          => __( 'No properties found.', 'agro-theme' ),
        'not_found_in_trash' => __( 'No properties found in Trash.', 'agro-theme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'property' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'property', $args );
}
add_action( 'init', 'agro_register_property_cpt' );
