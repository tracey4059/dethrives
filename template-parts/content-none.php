<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package dethrives
 * @since 1.0.0
 */
 ?>
<section class="content-right"> 
 <section class="no-results not-found">
  
	<header class="page-header">
		<span class="archive-icon fa fa-exclamation-triangle"></span>
		<div class="archive-summary">
			<h1 class="page-title"><?php _e( 'Nothing Found', 'dethrives' ); ?></h1>
		</div>
	</header><!-- .page-header -->
	
	<div class="entry-content">
        
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'dethrives' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'dethrives' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'dethrives' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div><!-- .entry-content -->
      
</section><!-- .no-results -->
    
</section>