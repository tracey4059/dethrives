<?php 
/**
 * The template for displaying author bios.
 *
 * @package dethrives
 * @since 1.0.0
 */
?>
<div id="bio">
<section class="author-info clearfix">
	<div class="author-avatar">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 120 ); ?>
	</div><!-- .author-avatar -->
	
	<div class="author-bio">
		<h3 class="author-heading">
			<?php _e( 'PUBLISHED BY', 'dethrives' ); ?>
		</h3>
		
		<h4 class="author-title">
			<?php the_author(); ?>
		</h4>
			
		<div class="author-description">
			<?php the_author_meta( 'description' ); ?>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( ' View all posts by %s &rarr;', 'dethrives' ), get_the_author() ); ?>
			</a>			
		</div>	
	</div><!-- .author-bio -->
	
</section><!-- .author-info -->
<div class="clear"></div>
</div>