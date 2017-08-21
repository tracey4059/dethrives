<?php 
/**
 * The page template file.
 *
 * @package dethrives
 * @since 1.0.0
 */

get_header();
?>

<div class="imgcont" style="background-image: url( <?php the_post_thumbnail_url(); ?>); background-size:cover; background-repeat:no-repeat; height: 100%; width:100%; margin-bottom:3em; box-shadow: inset 0 0 0 1000px rgba(<?php the_field('rgb_value'); ?>.8);">
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
    

    <div class="large-12 medium-12 small-12 columns">
        <div class="innercontent">
            <div class="large-6 medium-6 small-6 columns circlepic">
                
               
                <?php if ( has_post_thumbnail() ) {
						echo '<div class="defpic-sz" style="background: url('; the_post_thumbnail_url('large'); echo') no-repeat; background-size:cover; overflow:hidden; border-radius:50%; float:right; padding-right:1em; margin-top:.2em; ">';
						echo '</div>';} else { ?>
                            <img class="defpic-sz" style="background-size:cover; overflow:hidden; border-radius:50%; float:right; padding-right:1em; margin-top:.2em;" src="<?php bloginfo('template_directory'); ?>/assets/img/default-img2.jpg" alt="<?php the_title(); ?>" />
                            <?php } ?>
                
 
            </div>
            <div class="large-6 medium-6 small-12 columns head-para">
            <h1 class="pagetitle-default"><?php the_title(); ?></h1>
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