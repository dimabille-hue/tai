<?php
// Init includes
$includes = [
    '/inc/cpt/property.php',
    '/inc/cpt/unit.php',
    '/inc/carbon-fields.php',
];

foreach ( $includes as $file ) {
    $path = get_template_directory() . $file;
    if ( file_exists( $path ) ) {
        require_once $path;
    }
}
