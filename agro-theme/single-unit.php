<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
            <h1><?php the_title(); ?></h1>
            <div class="unit-meta">
                <?php if ( function_exists( 'carbon_get_post_meta' ) ) :
                    $rent = carbon_get_post_meta( get_the_ID(), 'crb_rent_price' );
                    $sq   = carbon_get_post_meta( get_the_ID(), 'crb_square' );
                    if ( $rent ) : ?><div class="meta-rent"><?php echo esc_html( $rent ); ?></div><?php endif;
                    if ( $sq ) : ?><div class="meta-square"><?php echo esc_html( $sq ); ?></div><?php endif;
                endif; ?>
            </div>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile;
else :
    echo '<p>' . esc_html__( 'No units found.', 'agro-theme' ) . '</p>';
endif;
get_footer();
