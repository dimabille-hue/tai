<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
            <h1><?php the_title(); ?></h1>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile;
else :
    echo '<p>' . esc_html__( 'No units found.', 'agro-theme' ) . '</p>';
endif;
get_footer();
