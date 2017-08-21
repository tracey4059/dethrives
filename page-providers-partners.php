<?php 
get_header();
?>
<style>
#providers-partners h2 {color: #<?php the_field('page_color'); ?>;}
#providers-partners button {background-color: #<?php the_field('page_color'); ?> !important;}
#providers-partners a {color: #<?php the_field('page_color'); ?>;}  
</style>

<div class="imgcont" style="background-image: url( <?php the_post_thumbnail_url(); ?>); background-size:cover; background-repeat:no-repeat;  min-height:500px; height: 100%; width:100%; margin-bottom:3em; box-shadow: inset 0 0 0 1000px rgba(46,57,91,.8);">
    
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
            <div class="large-10 medium-10 small-12 columns head-para">
            <h1 class="pagetitle"><?php the_title(); ?></h1>
                <p><?php $excerpt = get_the_excerpt(); echo custom_echo($excerpt,349); ?></p>
            </div>
        </div>
    </div>
</div>
    
</div>

<div id="providers-partners">   

<div class="row">
  
    <div class="large-4 medium-12 small-12 columns mtop mbottom sidestuff">
        <div class="pc"><?php the_field('sidebar_content'); ?>
        </div>
        
        <div class="pc mtop">
                    <?php if(get_field('s-sidebar_content')): ?>
                        <div class="s-content mbottom">
                            <?php while(has_sub_field('s-sidebar_content')): ?>
                                <?php 
                                $image = get_sub_field('s-image');
                                ?>
                                <div class="s-image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" /></div>
                                <div class="s-cont"><?php the_sub_field('s-content'); ?></div>
                                <div style="background-color: #<?php the_field('page_color'); ?> !important;" class="s-link"><a href="<?php the_sub_field('s-link'); ?>" target="_blank"><?php the_sub_field('s-link_name'); ?></a></div>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                </div> 
        
        
        
        
     </div>
  <div class="large-8 medium-12 small-12 columns mbottom hideme"> 
    <div id="primary" class="content-area owl">
        <?php $count=0; query_posts( 'category_name=providers-partners-banner' ); ?>
           <?php while ( have_posts() ) : the_post(); $count++; ?>
           <?php endwhile; ?>
           <div class="owl-carousel-sm <?php if ($count<3){ echo 'dots';} ?>"> 
        <?php $count=0; query_posts( 'category_name=providers-partners-banner' ); ?>
           <?php while ( have_posts() ) : the_post(); $count++; ?> 

               <div class="homecards shadow hs-<?php echo $count; ?>">
                          <div class="homecardimg">

                        <?php
                           $color = get_field('page_color', $post->ID);
                         ?>
                             <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                                } else { ?>
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/ppl.jpg" alt="<?php the_title(); ?>" />
                                <?php } ?>
                            </div>
                               <h2 style="color:#<?php echo $color ?> !important;"><?php the_title(); ?></h2>
                               <p><?php $excerpt = get_the_excerpt(); echo custom_echo($excerpt,90); ?></p>
                   
                    <ul class="cardlinks">
                                        <?php
                                           $color = get_field('page_color', $post->ID);
                                         ?>
                        <style>
                            .hs-<?php echo $count; ?> #childinkz > li > a:link {color:#<?php echo $color ?>;} 
                        </style>
                    <div id="childinkz" style="color:#<?php echo $color ?> !important;"><?php wp_list_pages( array('title_li'=>'','depth'=>1,'child_of'=>$post->ID) ); ?></div>

                    </ul>
                   
                        <div class="learnmore" style="background:#<?php echo $color ?> !important;"><a href="<?php the_permalink(); ?>">Learn More</a></div>
                    </div>
           <?php endwhile; wp_reset_query(); ?>

        </div> 
    </div> <!--- end owl carousel-->
      
       <div class="pc mtop5 mbottom">
           <?php if ( have_posts() ) : while( have_posts() ) : the_post();
                     the_content();
                endwhile; endif; ?>
           <?php the_field('page_content'); ?></div>
 </div>   
</div>   
    

     <div class="clear"></div>
</div>   

	
<?php get_footer('sub'); ?>