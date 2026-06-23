<?php
get_header();
?><div class="container">
    <h1><?php post_type_archive_title(); ?></h1>
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="excerpt"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile;
        the_posts_pagination();
    else :
        echo '<p>' . esc_html__( 'No units yet.', 'agro-theme' ) . '</p>';
    endif; ?>
</div>
<?php get_footer();
