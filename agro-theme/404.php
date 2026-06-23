<?php
/* 404 template */
get_header(); ?>
<div class="container">
    <h1><?php esc_html_e( 'Page not found', 'agro-theme' ); ?></h1>
    <p><?php esc_html_e( 'It looks like nothing was found at this location. Try a search?', 'agro-theme' ); ?></p>
    <?php get_search_form(); ?>
</div>
<?php get_footer(); ?>
