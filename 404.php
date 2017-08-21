<?php 
/**
 * The template for displaying 404 pages (not found)
 *
 * @package dethrives
 * @since 1.0.0
 */

get_header();
?>
	
<div id="content" class="site-content clearfix">
	<main id="main" class="site-main" role="main">
	<section class="content-right"> 
		<section class="error-404 not-found top404">
			<header class="page-header">
				<span class="archive-icon fa fa-exclamation-triangle"></span>
				<div class="archive-summary">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'dethrives' ); ?></h1>
				</div>
			</header><!-- .page-header -->
			
			<div class="entry-content">
				<p><?php _e( 'It looks like nothing was found at that location. Maybe try a search?', 'dethrives' ); ?></p>

				<?php get_search_form(); ?>
                <br>
			</div><!-- .entry-content -->
		</section><!-- .error-404 -->
    </section>
	</main><!-- #main -->
</div><!-- #content -->
	

	
<?php get_footer(); ?>