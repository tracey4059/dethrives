<?php 
/*
Template Name: Circle Style
*/
get_header();
?>
<style>
#circle h2 {color: #<?php the_field('page_color'); ?>;}
#circle button {background-color: #<?php the_field('page_color'); ?> !important;}
#circle a {color: #<?php the_field('page_color'); ?>;}
</style>

<div class="imgcont" style="background-image: url( <?php the_post_thumbnail_url(); ?>); background-size:cover; background-repeat:no-repeat;  min-height:500px; height: 100%; width:100%; margin-bottom:3em; box-shadow: inset 0 0 0 1000px rgba(<?php the_field('rgb_value'); ?>.8);">
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
            <div class="large-4 medium-4 small-0 columns circlepic">
               
                <?php if ( has_post_thumbnail() ) {
						echo '<div style="background: url('; the_post_thumbnail_url('medium'); echo') no-repeat; background-size:cover; height:200px; width:200px; overflow:hidden; border-radius:50%; float:right; padding-right:1em; margin-top:3.5em; ">';
						echo '</div>';}?>
                
            </div>
            <div class="large-8 medium-8 small-12 columns head-para">
            <h1 class="pagetitle"><?php the_title(); ?></h1>
                <p><?php $excerpt = get_the_excerpt(); echo custom_echo($excerpt,349); ?></p>
            </div>
        </div>
    </div>
    
</div>

 <div id="circle">   

                     <?php
                         $owlcat = get_field('carousel_category', $post->ID);
                       ?>
   <div id="primary" class="content-area owl">
    <?php $count=0; query_posts( 'category_name=' . "$owlcat" ); ?> <!--added variable as category for template --->
       <?php while ( have_posts() ) : the_post(); $count++; ?>
       <?php endwhile; ?>
       <div class="owl-carousel <?php if ($count<5){ echo 'dots';} ?>"> 
    <?php $count=0; query_posts( 'category_name=' . "$owlcat" ); ?>
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
    
    
  
    
 
 <div class="row mtop">
     <div class="large-4 medium-12 small-12 columns mtop mbottom sidestuff">
         <div class="pc"><?php the_field('sidebar_content'); ?></div> 
     </div>
     <div class="large-8 medium-12 small-12 columns mtop mbottom pcont">
         
        <div class="pc"> <?php if ( have_posts() ) : while( have_posts() ) : the_post();
     the_content();
endwhile; endif; ?>
         
         <?php the_field('page_content'); ?></div>
     </div>
    
 </div>   
    

     
                    <?php
                       $hideart = get_field('hide_tips_articles', $post->ID);
                     ?>
                    <?php if($hideart == "") { ?>    
     
<section class="section-news" style="background-color: #<?php the_field('page_color'); ?>; box-shadow: inset 0 0 0 1000px rgba(0,0,0,.5); background-image: url( '<?php bloginfo('template_directory'); ?>/assets/img/d-triangle2.png'); background-size:cover;">
<div class="row clearfix news-margin innercontent">
    <div class="large-12 medium-12 small-12 columns clearfix">
        <h2 class="recenttips">Tips &amp; Articles</h2>
       		
                 <div class="row news-margin card1">
                     
                                        <div class="large-4 medium-4 small-12 columns margin8">
                                           <?php $tipart = get_field('tip_articles'); ?>   
                                            
                                            <?php query_posts( array('post_type' => 'tips' , 'posts_per_page' => 1 , 'tip_group' => $tipart ) ); ?>
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                     <div class="article-card-tip" style="background-image: url( <?php the_post_thumbnail_url('medium_large'); ?>); background-size:cover; background-repeat:no-repeat;">
                                                                <div class="cardcontent-tip articlecards-tips">
                                                                    <div class="main-content">
                                                                        <?php the_excerpt(); ?>
                                    
                                                                        <div class="purplehash">
                                                                           <?php if(get_field('hash_tag')): ?>
                                                                                <ul>
                                                                                <?php while(has_sub_field('hash_tag')): ?>
                                                                                    <li><span style="color:#ccc;">#</span><?php the_sub_field('hash'); ?></li>
                                                                                <?php endwhile; ?>
                                                                                </ul>
                                                                            <?php endif; ?>
                                                                        </div>
   
                                                                    </div>
                                                                </div>
                                                      </div>
                                                <?php endwhile; wp_reset_query(); ?> 
                                            
                                            <?php query_posts( array('post_type' => 'tips' , 'posts_per_page' => 1 , 'offset' => 1 , 'tip_group' => $tipart ) ); ?>
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                     <div class="article-card-tip2" style="background-color: #fff;">
                                                                <div class="cardcontent-tip articlecards-tips">
                                                                    <div class="main-content">
                                                                        <?php the_excerpt(); ?>
                                                                        
                                                                        <div class="purplehash">
                                                                           <?php if(get_field('hash_tag')): ?>
                                                                                <ul>
                                                                                <?php while(has_sub_field('hash_tag')): ?>
                                                                                    <li><span style="color:#ccc;">#</span><?php the_sub_field('hash'); ?></li>
                                                                                <?php endwhile; ?>
                                                                                </ul>
                                                                            <?php endif; ?>
                                                                        </div>
   
                                                                    </div>
                                                                </div>
                                                      </div>
                                                <?php endwhile; wp_reset_query(); ?> 
                                                
                                          </div>
                                        
                          
                     
                      <?php query_posts( array('post_type' => 'post' , 'posts_per_page' => 1, 'category_name' => $tipart) ); ?>
                      <?php while ( have_posts() ) : the_post(); ?> 
                                              <div class="large-8 medium-8 small-12 columns">
                                                        <div class="article-card" style="background-image: url( <?php the_post_thumbnail_url('medium_large'); ?>); background-size:cover; background-repeat:no-repeat;">
                                                                <div class="cardcontent articlecards">
                                                                    <p class="articlewords">ARTICLE</p>
                                                                    <h1 class="cdtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                                                        <div class="main-content">
                                                                        <p><?php the_excerpt(); ?></p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                              </div>    
                      </div>
        
                         <?php endwhile; wp_reset_query(); ?>
        
     
                     <div class="row news-margin card1">
                                            
                                    <div class="large-4 medium-4 small-12 columns margin8">
                                               
                                            <?php query_posts( array('post_type' => 'tips' , 'posts_per_page' => 1, 'offset' => 2 , 'tip_group' => $tipart ) ); ?>
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                     <div class="article-card-tip" style="background-image: url( <?php the_post_thumbnail_url('medium_large'); ?>); background-size:cover; background-repeat:no-repeat;">
                                                                <div class="cardcontent-tip articlecards-tips">
                                                                        <div class="main-content">
                                                                        <?php the_excerpt(); ?>
                                                                       
                                                                        <div class="purplehash">
                                                                           <?php if(get_field('hash_tag')): ?>
                                                                                <ul>
                                                                                <?php while(has_sub_field('hash_tag')): ?>
                                                                                    <li><span style="color:#ccc;">#</span><?php the_sub_field('hash'); ?></li>
                                                                                <?php endwhile; ?>
                                                                                </ul>
                                                                            <?php endif; ?>
                                                                        </div>
   
                                                                    </div>
                                                                </div>
                                                      </div>
                                                <?php endwhile; wp_reset_query(); ?> 
                                            
                                            <?php query_posts( array('post_type' => 'tips' , 'posts_per_page' => 1 , 'offset' => 3 , 'tip_group' => $tipart ) ); ?>
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                     <div class="article-card-tip2" style="background-color: #fff;">
                                                                <div class="cardcontent-tip articlecards-tips">
                                                                        <div class="main-content">
                                                                        <?php the_excerpt(); ?>
                                                                       
                                                                        <div class="purplehash">
                                                                           <?php if(get_field('hash_tag')): ?>
                                                                                <ul>
                                                                                <?php while(has_sub_field('hash_tag')): ?>
                                                                                    <li><span style="color:#ccc;">#</span><?php the_sub_field('hash'); ?></li>
                                                                                <?php endwhile; ?>
                                                                                </ul>
                                                                            <?php endif; ?>
                                                                        </div>
   
                                                                    </div>
                                                                </div>
                                                      </div>
                                                <?php endwhile; wp_reset_query(); ?> 
                                        
                                            <a href="<?php bloginfo('url'); ?>/?post_type=tips" class="tips-articles"><button>View All Tips</button></a>   
                                          </div>
                         
                         
                                        
                                        
                            <?php query_posts( array('post_type' => 'post' , 'posts_per_page' => 1, 'category_name' => $tipart , 'offset' => 1 ) ); ?>
                            <?php while ( have_posts() ) : the_post(); ?> 
                                              <div class="large-8 medium-8 small-12 columns">
                                                        <div class="article-card2" style="background-image: url( <?php the_post_thumbnail_url('medium_large'); ?>); background-size:cover; background-repeat:no-repeat;">
                                                                <div class="cardcontent articlecards">
                                                                    <p class="articlewords">ARTICLE</p>
                                                                    <h1 class="cdtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                                                        <div  class="main-content">
                                                                        <p><?php the_excerpt(); ?></p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                  <a href="<?php bloginfo('url'); ?>/category/<?php echo $tipart ?>/" class="tips-articles"><button>View All Family &amp; Articles</button></a>
                                              </div>    
                            </div>
                                                           
                        
                         <?php endwhile; wp_reset_query(); ?>
      
                  
       
    </div>
</div>
</section>
     <?php } ?>
</div>   

	
<?php get_footer('sub'); ?>