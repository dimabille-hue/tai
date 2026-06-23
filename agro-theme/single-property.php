<?php
get_header();
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
            <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'large' ); } ?>
            <h1><?php the_title(); ?></h1>
            <div class="property-meta">
                <?php if ( function_exists( 'carbon_get_post_meta' ) ) :
                    $price = carbon_get_post_meta( get_the_ID(), 'crb_price' );
                    $area  = carbon_get_post_meta( get_the_ID(), 'crb_area' );
                    $addr  = carbon_get_post_meta( get_the_ID(), 'crb_address' );
                    if ( $price ) : ?><div class="meta-price"><?php echo esc_html( $price ); ?></div><?php endif;
                    if ( $area ) : ?><div class="meta-area"><?php echo esc_html( $area ); ?></div><?php endif;
                    if ( $addr ) : ?><div class="meta-address"><?php echo esc_html( $addr ); ?></div><?php endif;
                endif; ?>
            </div>
            <div class="entry-content"><?php the_content(); ?></div>
        </article>
    <?php endwhile;
else :
    echo '<p>' . esc_html__( 'No properties found.', 'agro-theme' ) . '</p>';
endif;
get_footer();
