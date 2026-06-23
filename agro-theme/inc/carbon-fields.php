<?php
// Carbon Fields integration (optional)
use Carbon_Fields\Container;
use Carbon_Fields\Field;

if ( ! function_exists( 'agro_carbon_fields_register' ) ) {
    function agro_carbon_fields_register() {
        if ( ! class_exists( 'Carbon_Fields\Container' ) ) {
            // Carbon Fields plugin not active — nothing to register
            return;
        }

        Container::make( 'post_meta', __( 'Property Details', 'agro-theme' ) )
            ->where( 'post_type', '=', 'property' )
            ->add_fields( array(
                Field::make( 'text', 'crb_price', __( 'Price', 'agro-theme' ) ),
                Field::make( 'text', 'crb_area', __( 'Area', 'agro-theme' ) ),
                Field::make( 'text', 'crb_address', __( 'Address', 'agro-theme' ) ),
            ) );

        Container::make( 'post_meta', __( 'Unit Details', 'agro-theme' ) )
            ->where( 'post_type', '=', 'unit' )
            ->add_fields( array(
                Field::make( 'text', 'crb_rent_price', __( 'Rent price', 'agro-theme' ) ),
                Field::make( 'text', 'crb_square', __( 'Square meters', 'agro-theme' ) ),
            ) );
    }
}
add_action( 'carbon_fields_register_fields', 'agro_carbon_fields_register' );

// If Carbon Fields is included as a library in theme (rare), boot it explicitly.
add_action( 'after_setup_theme', function() {
    if ( class_exists( 'Carbon_Fields\Carbon_Fields' ) ) {
        \Carbon_Fields\Carbon_Fields::boot();
    }
} );
