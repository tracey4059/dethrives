<?php 
get_header();
?>
<style>
#directory h2 {color: #<?php the_field('page_color'); ?>;}
#directory button {background-color: #<?php the_field('page_color'); ?> !important;}
#directory a {color: #<?php the_field('page_color'); ?>;}  
</style>

<div class="imgcont" style="background-image: url( <?php the_post_thumbnail_url(); ?>); background-size:cover; background-repeat:no-repeat;  min-height:300px; height: 100%; width:100%; margin-bottom:3em; box-shadow: inset 0 0 0 1000px rgba(46,57,91,.8); position:relative;">
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
    <div class="large-4 medium-4 small-12 columns shizzle">
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
    
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <div class="innercontent">
                <div class="large-10 medium-10 small-10 columns head-para">
                <h1 class="pagetitle-dph"><?php the_title(); ?></h1>
                </div>
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


<div id="directory">
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
        <div class="pc"><?php if ( have_posts() ) : while( have_posts() ) : the_post();
                     the_content();
                endwhile; endif; ?></div>
        </div>
    </div>
    
    
    <!--- mini sites--->
    <div class="row mtop">
            
                        <?php if(get_field('mini_sites')): ?>
                            <?php while(has_sub_field('mini_sites')): ?>
             
                   <div class="large-12 medium-12 small-12">
                        <div class="large-1 medium-1 small-1 columns nopadding mtopdph">
                            <div style="background-color:#<?php the_sub_field('block_color'); ?>; height:60px; width:60px; float:right;">
                            </div>
                        </div>
                        <div class="large-3 medium-3 small-3 columns nopadding mtopdph end">
                            <div class="dphmini"><a href="<?php the_sub_field('site_link'); ?>"><?php the_sub_field('site_name'); ?></a>
                            <span class="dpharrow" style="color:#ccc; font-size:300%; font-weight:bold; right:20px; top: -7px; position:absolute;"> &#8250; </span>
                            </div>
                            
                        </div>
                   </div>  
                                <?php endwhile; wp_reset_query(); ?>
                            <?php endif; ?>
           
    </div>

    
    
    
    
 <div class="row mtop">
      <div class="large-8 medium-12 small-12 columns mtop pcont">
         <div><?php 
	           $image = get_field('sitemap');
	           if( !empty($image) ): ?>
             <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>
</div>
     </div>
     <div class="large-4 medium-12 small-12 columns mtop sidestuff">
         <div class="pc"><?php the_field('sidebar_content'); ?></div> 
     </div>
 </div>      
    

 <div class="row mtop">
     <div class="large-12 medium-12 small-12 columns mbottom pcont">
         <div class="pc"><?php the_field('page_content'); ?></div>
     </div>
    
 </div>   
    

     <div class="clear"></div>
</div>   

	
<?php get_footer('sub'); ?>