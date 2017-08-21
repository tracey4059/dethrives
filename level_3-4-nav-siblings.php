<?php 
/*
Template Name: Level 3 or 4 with Nav-siblings
*/
get_header();
?>
<style>
#communities h2 {color: #<?php the_field('page_color'); ?>;}
#communities button {background-color: #<?php the_field('page_color'); ?> !important;}
#communities a {color: #<?php the_field('page_color'); ?>;} 
ul.cardlinks-temp2 li a:hover {color:#fff !important;}
ul.cardlinks-temp2 li:hover {font-weight: bold; background-color: #<?php the_field('page_color'); ?>; color:#fff !important; }
ul.cardlinks-temp2 li .nohover a:hover  {color:#000 !important;}
ul.cardlinks-temp2 li.nohover:hover  {background-color: #fff; color:#000 !important;}
ul.cardlinks-temp2 li.current_page_item {font-weight: bold; background-color: #<?php the_field('page_color'); ?> !important; color:#fff !important; }
ul.cardlinks-temp2 li.current_page_item a {color:#fff !important;}
</style>

<div class="imgcont" style="background-image: url( '<?php bloginfo('template_directory'); ?>/assets/img/d-triangle3.png'); background-size:cover; background-repeat:repeat; min-height:450px; height: 100%; width:100%; background-color: #<?php the_field('page_color'); ?>; box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3); position:relative;">
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
        
            <div class="large-4 medium-4 small-12 columns"> 
               <h1 class="pagetitle-temp2 float-right"><?php the_title(); ?></h1> 
                <div class="temp2-tri"><img src="<?php bloginfo('template_directory'); ?>/assets/img/whiteTri.png" /></div> 
            </div>
            <div class="large-8 medium-8 small-12 columns">
                <div class="imgwidth"><?php if ( has_post_thumbnail() ) {
						echo '<div style="background: url('; the_post_thumbnail_url('large'); echo') no-repeat; background-size:cover; height:350px; overflow:hidden; width:100%; bottom:0; border-top-right-radius: 2em; border-top-left-radius: 2em;">';
						echo '</div>';} else { ?>
                            <img style="background-size:cover; height:350px; overflow:hidden; width:100%; bottom:0; border-top-right-radius: 2em; border-top-left-radius: 2em;" src="<?php bloginfo('template_directory'); ?>/assets/img/default-img.jpg" alt="<?php the_title(); ?>" />
                            <?php } ?>
                </div>
            </div>
        
    </div>
 </div>
    
</div>

<div id="communities">   

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
     
             <div class="large-4 medium-4 small-12 columns">
                                         
                 
   <!--- Shows child page links as separate bubble / shows nothing if no children--->             
                 
  <?php
    $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) ); if ( $mypages[0] ): ?>
        <div class="temp2-menu2">  
          <ul class="cardlinks-temp2">
                <?php foreach( $mypages as $page ) {        
                   $content = $page->post_content;
                    if ( ! $content ) // Check for empty page
                        continue;

                ?>
                    <li><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></li>

                <?php
                } ?>  
          </ul>
         </div>
    <?php endif; ?>
                
                          
                   <!--- Shows parent page link as overview ans siblings withing section--->           
                     
                 <div class="temp2-menu2">
                     <ul class="cardlinks-temp2">
                         <li>
                          <?php global $post;
                              if ( $post->post_parent ) { ?>
                                <a href="<?php echo get_permalink( $post->post_parent ); ?>" >
                                <strong>More from: <?php echo get_the_title( $post->post_parent ); ?></strong>
                                </a>
                            <?php } ?>
                         </li>
  
                            <?php
                                global $post;
                                $current_page_parent = ( $post->post_parent ? $post->post_parent : $post->ID );

                                wp_list_pages( array(
                                     'title_li' => '',
                                     'child_of' => $current_page_parent,
                                     // 'exclude' => $post->ID,
                                     'depth' => '1' )
                                );
                                ?>

                          
                      <!--- custom links option--->    
                                <?php
                                   $fact = get_field('custom_links', $post->ID);
                                 ?>
                                <?php if($fact != "") { ?>  
                                    <li class="nohover"><strong><?php the_field('custom_nav_name'); ?></strong></li>
                                <?php } ?>
                          
                                <?php while(has_sub_field('custom_links')): ?>
                                            <li><a href="<?php the_sub_field('custom_link'); ?>" target="_blank"><?php the_sub_field('custom_link_name'); ?></a>
                                            </li>
                                <?php endwhile; wp_reset_query(); ?>
                      </ul> 
    
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
        
             <div class="large-8 medium-8 small-12 columns"> 
                        <div class="temp3-pc pc"><?php if ( have_posts() ) : while( have_posts() ) : the_post();
                             the_content();
                        endwhile; endif; ?>
                        </div>
                 
                    <?php
                       $fact = get_field('fact', $post->ID);
                     ?>
                    <?php if($fact != "") { ?>  <div class="padding20 fact mbottom"><?php echo $fact; ?></div>
                     <?php } ?>
                 
                    <?php
                       $fact = get_field('fact', $post->ID);
                     ?>
                    <?php if($fact == "") { ?>  <div class="<?php if($fact == "") { echo 'roundcorners'; } ?>">&nbsp;</div>
                    <?php } ?>
                       
                 
                    
                    <?php
                       $helpfulres = get_field('helpful_resources', $post->ID);
                     ?>
                    <?php if($helpfulres != "") { ?>  
  
                    <div class="whitebg mbottom" style="border-top: 6px solid #<?php the_field('page_color'); ?> !important;">
                          <div class="padding20">
                                <?php the_field('resource_info'); ?>
                                   
                                        <?php while(has_sub_field('helpful_resources')): ?>
                                            <hr class="gray">
                                            <p><a href="<?php the_sub_field('helpful_link'); ?>"><?php the_sub_field('helpful_link_name'); ?> > </a><br>
                                            <span style="color:#666;"><?php the_sub_field('link_desc'); ?></span></p>
                                            <?php endwhile; wp_reset_query(); ?>
                                        
                            </div>
                         <a href="<?php bloginfo('url'); ?>/directory/" class="resources"><button>View More Resources</button></a> 
                     </div>           
                 
                    <?php } ?>
                      
             </div>
      
    </div>
</div>   
    
  
                    <?php
                       $hideart = get_field('hide_tips_articles', $post->ID);
                     ?>
                    <?php if($hideart == "") { ?>   
    
<section class="section-news" style="background-color: #<?php the_field('page_color'); ?>; box-shadow: inset 0 0 0 1000px rgba(0,0,0,.5); background-image: url( '<?php bloginfo('template_directory'); ?>/assets/img/d-triangle2.png'); background-size:cover; ">
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