<?php 
get_header();
?>

<div class="imgcont" style="min-height:360px; height: 100%; width:100%; margin-bottom:3em; box-shadow: inset 0 0 0 1000px rgba(46,57,91,.8); position:relative;">
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
    
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <div class="innercontent">
                <div class="large-10 medium-10 small-12 columns head-para woo">
                <h1 class="pagetitle-woo">Digital Materials</h1>
                    <p>
                    <?php the_field('page_description'); ?> 
                    </p>
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

    
<div class="row">
   
    <!------------- digital materials repeater in a repeater loop ------------->      
        <div class="large-12 medium-12 small-12 whitebgwoo-dm shopf"><!---start white bg--->
               <?php while ( have_posts() ) : the_post(); ?>

				<?php 

				// check for rows (parent repeater)
				if( have_rows('digital_material_section') ): ?>
      
					<div class="dm-section">
                        
					<?php 
					// loop through rows (parent repeater)
					while( have_rows('digital_material_section') ): the_row(); ?>
                        
                        
						   <div class="row whiterow-dm dm">
                            <div class="large-12 medium-12 small-12 grayy tbcell-dm">
							     <h2><?php the_sub_field('dm_section_name'); ?></h2>
                            
                      
							<?php 

							// check for rows (sub repeater)
							if( have_rows('digital_material') ): ?>
				                <div class="large-6 medium-6 small-12 columns digital-cont">
								<?php 
								// loop through rows (sub repeater)
								while( have_rows('digital_material') ): the_row();
									// display each item as a list 
									?>
                           
                                    <img src="<?php the_sub_field('dm_image'); ?>" class="dm-image" /><br>
                                    <p><strong><?php the_sub_field('digital_material_title'); ?></strong></p>
                                    <p><?php the_sub_field('dm_short_description'); ?></p>
                                    <a class="woobtn" href="<?php the_sub_field('dm_download_link'); ?>" target="_blank">Download</a>
                           
                                 </div>
								  <?php endwhile; wp_reset_query(); ?> 
                               <?php endif; //if( get_sub_field('items') ): ?>
                              </div> <!---end 12 large--->
                        
                            </div> <!---end white row--->			
							
						  
					<?php endwhile; wp_reset_query(); // while( has_sub_field('to-do_lists') ): ?>
                </div><!---end dm section--->
    
				<?php endif; // if( get_field('to-do_lists') ): ?>
       
     
			<?php endwhile; // end of the loop. ?>
        </div> <!---end white bg--->        
     
</div>

           
	
<?php get_footer('sub'); ?>