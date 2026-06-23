<?php
/* Index template */
get_header(); ?>
<div class="container">
    <?php if ( have_posts() ) : ?>
        <div class="posts-list">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="entry-summary"><?php the_excerpt(); ?></div>
            </article>
        <?php endwhile; ?>
        </div>
        <?php the_posts_pagination(); ?>
    <?php else: ?>
        <p><?php esc_html_e( 'No posts found', 'agro-theme' ); ?></p>
    <?php endif; ?>
</div>
<?php get_footer(); ?>
