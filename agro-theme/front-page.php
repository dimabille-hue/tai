<?php
/* Front page template */
get_header(); ?>
<section class="hero">
    <div class="hero-inner">
        <h1 class="hero-title"><?php bloginfo( 'name' ); ?></h1>
        <p class="hero-subtitle"><?php bloginfo( 'description' ); ?></p>
    </div>
</section>
<section class="content-area">
    <div class="container">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_content(); ?>
            </article>
        <?php endwhile; else: ?>
            <p><?php esc_html_e( 'No content yet.', 'agro-theme' ); ?></p>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
