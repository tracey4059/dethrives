<?php
/**
 * The template part for displaying posts.
 *
 * @package dethrives
 * @since 1.0.0
 */
 ?>

 <div id="cl">   
 <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
   

 	<header class="entry-header">
		     <?php if ( has_post_thumbnail() ) {
						echo '<div style="background: url('; the_post_thumbnail_url(); echo') no-repeat; background-size: cover; height: 100%; min-height:500px; width:100%; border-top-left-radius: 0; border-top-right-radius: overflow:hidden; margin-bottom:1.5em; clear:right;">';
						echo '</div>';}?>
        
	</header><!-- .entry-header -->
           

	<h1 class="pagetitle"><?php the_title(); ?></h1>
	<div class="entry-content clearfix">
		<?php 
			the_content( sprintf(
					__( 'Continue reading &raquo; %s', 'dethrives' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				)				
			);
			
			dethrives_link_pages();
		?>
       
	</div><!-- .entry-content -->

	 <?php 
		if ( is_single() && get_the_author_meta( 'description' ) ) {
			get_template_part( 'template-parts/author', 'bio' );
		}
	?>
	
	<footer class="entry-footer">
		<?php dethrives_entry_footer(); ?>
	</footer><!-- .entry-footer -->
  
</article><!-- #post-## -->
   <div class="clear"></div> 
</div>  