<?php 
/*
Template Name: Calendar
*/

get_header();
?>

<div class="imgcont" style="background-image: url( <?php the_post_thumbnail_url(); ?> ); background-size:cover; background-repeat:no-repeat;  min-height:110px; height: 100%; width:100%; margin-bottom:3em; box-shadow: inset 0 0 0 1000px rgba(27,67,131,.9);">
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

   
    
</div>
 
      <div class="row">
        <div class="large-12 medium-12 small-12">
		<?php if ( have_posts() ) : while( have_posts() ) : the_post();
            the_content();
        endwhile; endif; ?>
        </div>
      </div>
        
	
<?php get_footer('sub'); ?>