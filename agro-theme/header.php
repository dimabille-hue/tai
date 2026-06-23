<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="site-branding">
        <?php if ( has_custom_logo() ) {
            the_custom_logo();
        } else { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title"><?php bloginfo( 'name' ); ?></a>
        <?php } ?>
    </div>
    <nav class="main-navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
</header>
<main id="site-content">
