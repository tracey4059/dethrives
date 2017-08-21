<?php
/**
 * The template part for displaying results in search pages
 *
 * @package dethrives
 * @since 1.0.0
 */
 ?>
<section class="content-right"> 
 <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
   
 	<header class="entry-header">
		
       <?php if ( has_post_thumbnail() ) {
			echo '<div style="background: url('; the_post_thumbnail_url(); echo') no-repeat; background-size: cover; height: 100%; min-height:500px; width:100%; float:right;  overflow:hidden; margin-bottom:1.5em;">';
		echo '</div>';}?> 
        <a href="<?php the_permalink(); ?>"><h1 class="pagetitle"><?php the_title(); ?></h1></a>
        
        
	</header><!-- .entry-header -->
	
	<div class="entry-content entry-excerpt clearfix">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	
	
</article><!-- #post-## -->
</section>