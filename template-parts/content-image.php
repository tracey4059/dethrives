<?php
/**
 * The template part for displaying image attachment page.
 *
 * @package dethrives
 * @since 1.0.0
 */
 ?>
<section class="content-right">
 <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
 	<header class="entry-header">
		<?php dethrives_entry_header(); ?> 
	</header><!-- .entry-header -->
	
	<div class="entry-content clearfix">
        <figure class="entry-attachment wp-caption">
            <?php
                // Filter the default image attachment size.
                $image_size = apply_filters( 'dethrives_attachment_size', 'large' );
                echo wp_get_attachment_image( get_the_ID(), $image_size );
            ?>
            
            <?php if ( has_excerpt() ) : ?>
                <figcaption class="entry-caption wp-caption-text">
                    <?php the_excerpt(); ?>
                </figcaption><!-- .entry-caption -->
            <?php endif; ?>
        </figure><!-- .entry-attachment -->		
		
		<?php 
			the_content();
			dethrives_link_pages(); 
		?>
	</div><!-- .entry-content -->
	
	
</article><!-- #post-## -->
</section>