<?php 
/**
 * The template file for the cart - changes header from default to woo cart header.
 */

get_header();
?>

<div class="imgcont-cart" style="background-image: url( <?php the_post_thumbnail_url(); ?>); background-size:cover; background-repeat:no-repeat; height: 100%; width:100%; margin-bottom:3em; box-shadow: inset 0 0 0 1000px rgba(<?php the_field('rgb_value'); ?>.8); position:relative;">
 <div class="row2">
    <div class="large-8 medium-8 small-12 columns mhome">
            <div class="float-left site-logo">
                <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/delogo.png" alt="DEthrives logo" /></a>
            </div>
            <div class="menu-position menu-container mlefthome">
                <div class="menu-container-child">
                  <nav class="menu-de"> <!--- menu---->
                    <div class="tmenu"><?php wp_nav_menu( array( 'menu' => 'top-menu' ) ); ?></div>
                    <div class="pmenu"><?php wp_nav_menu( array( 'menu' => 'primary-menu' ) ); ?></div>
                  </nav>
                </div>
            </div>
    </div>
    <div class="large-4 medium-4 small-12 columns">
        <div class="large-3 medium-3 small-12">
            <nav class="menu-de-social"><?php wp_nav_menu( array( 'menu' => 'social-menu' ) ); ?></nav>
        </div>
        <div class="large-1 medium-1 small-0 float-right de-search">
            <?php 
                dethrives_quicklinks(); 
            ?>
        </div>
    </div>
 </div> 
    
  <div class="breadcont">
            <div class="row">
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                        <?php if(function_exists('bcn_display'))
                        {
                            bcn_display();
                        }?>
                </div>
            </div>
    </div>     
       
</div>



<div id="content">
	<main id="main" class="site-main" role="main">
        
		<?php 
			// Loop
			while ( have_posts() ) {
				the_post();
				
				// Include the Post-Format-specific template for the content.
				get_template_part( 'template-parts/content', 'page' );				
				
				// load the comments template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;				
				}				
		?>
        
	</main><!-- #main -->
     
</div><!-- #content -->

	
<?php get_footer('sub'); ?>