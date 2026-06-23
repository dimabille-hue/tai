<?php
/**
 * Register 'unit' custom post type
 */
function agro_register_unit_cpt() {
    $labels = array(
        'name'               => _x( 'Units', 'post type general name', 'agro-theme' ),
        'singular_name'      => _x( 'Unit', 'post type singular name', 'agro-theme' ),
        'menu_name'          => _x( 'Units', 'admin menu', 'agro-theme' ),
        'name_admin_bar'     => _x( 'Unit', 'add new on admin bar', 'agro-theme' ),
        'add_new'            => _x( 'Add New', 'unit', 'agro-theme' ),
        'add_new_item'       => __( 'Add New Unit', 'agro-theme' ),
        'new_item'           => __( 'New Unit', 'agro-theme' ),
        'edit_item'          => __( 'Edit Unit', 'agro-theme' ),
        'view_item'          => __( 'View Unit', 'agro-theme' ),
        'all_items'          => __( 'All Units', 'agro-theme' ),
        'search_items'       => __( 'Search Units', 'agro-theme' ),
        'not_found'          => __( 'No units found.', 'agro-theme' ),
        'not_found_in_trash' => __( 'No units found in Trash.', 'agro-theme' )
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'unit' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'unit', $args );
}
add_action( 'init', 'agro_register_unit_cpt' );
