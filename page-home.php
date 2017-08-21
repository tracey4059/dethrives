<?php 
/**
 * The homepage template file.
 *
 * @package dethrives
 * @since 1.0.0
 */

get_header();
?>

<section class="page-header<?php if (!is_front_page()) { echo "inner-page"; } ?>">
    <?php if (is_front_page()) : ?>
        <?php $arg = array(
            'post_type' => 'slides',
            'orderby' => 'rand',
            'posts_per_page' => 1
        );
        $the_query = new WP_Query($arg);
        if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post();
                $do_not_duplicate = $post->ID;
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
    <div class="page-head-bg-home">
                <div class="page-header-item"
                     style="background: url('<?php echo $thumb['0']; ?>') no-repeat; background-size: cover; height: 100%; min-height:450px; width:80%; margin-right:10%; margin-left:10%; overflow:hidden;">
                <div class="captioned">
                    <h1><?php the_title(); ?></h1><p><?php the_excerpt(); ?></p>
                    
                    <?php
                       $slidelink = get_field('slide_link', $post->ID);
                     ?>
                    <?php if($slidelink != "") { ?>  <a class="leeearn" href="<?php echo $slidelink; ?>"><button>Learn More</button></a>
                    <?php } ?>
                    
                 </div>
                    
                </div>
     </div>
            <?php endwhile; ?>
        <?php endif;
        wp_reset_query(); ?>
    <?php else : ?>

    <?php endif; ?>


  <p>&nbsp;</p>  
   <div id="primary" class="content-area owl">
       
       <?php $count=0; query_posts( 'category_name=home-banner' ); ?>
       <?php while ( have_posts() ) : the_post(); $count++; ?>
       <?php endwhile; ?>
     <div class="owl-carousel <?php if ($count<5){ echo 'dots'; echo $count;} ?>"> 
    <?php $count=0; query_posts( 'category_name=home-banner' ); ?>
       <?php while ( have_posts() ) : the_post(); $count++; ?>
                    
            <div class="homecards shadow">
                      <div class="homecardimg">
                    <?php
                       $color = get_field('page_color', $post->ID);
                     ?>
                          
                         <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail();
                            } else { ?>
                            <img src="<?php bloginfo('template_directory'); ?>/img/default-image.jpg" alt="<?php the_title(); ?>" />
                            <?php } ?>
                        </div>
                           <h2 style="color:#<?php echo $color ?> !important;"><?php the_title(); ?></h2>
                           <p><?php the_excerpt(); ?></p>
                    <div class="learnmore" style="background:#<?php echo $color ?> !important;"><a href="<?php the_permalink(); ?>">Learn More</a></div>
                </div>
       <?php endwhile; wp_reset_query(); ?>
   
    </div> 
</div> <!--- end owl carousel-->
    
<div class="row clearfix innercontent">
    <div class="large-12 medium-12 small-12 columns clearfix" style="position: relative;">
        <h2 class="recent">Recent Articles &amp; Upcoming Events</h2>
       
        
         <?php if( is_category()) { $cat = get_query_var('cat'); $yourcat = get_category ($cat); } ?>
				<?php $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
					$args = array('post_type' => 'post', 'category_name' => 'uncategorized', 'posts_per_page' => 4, 'paged' => $paged,);
					$the_query = new WP_Query( $args ); $c = 0; ?>
							<?php while ($the_query -> have_posts()) : $the_query -> the_post(); $c++;?>
							<?php if( $c == 1) : ?>
							
                                    <div class="news-margin card1">
                                            <div class="large-4 medium-4 small-12 columns topcat">
                                                <div class="topimg" style="background-image: url( <?php the_post_thumbnail_url('medium_large'); ?>); background-size:cover; background-repeat:no-repeat;">
                                                </div>
                                            </div>
                                              <div class="large-5 medium-5 small-12 columns white">
                                                        <div class="white-card">
                                                                <div class="cardcontent">
                                                                    <h1 class="cdtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                                                    <p class="date"><?php the_time('F j, Y'); ?></p>
                                                                </div>
                                                        </div>
                                              </div> 
                                        
                                         <div class="large-3 medium-3 small-12 columns cal">
                                            <?php echo do_shortcode("[tribe_events_list]"); ?>
                                        </div>
                                        
                                    </div>
		                                                                               
                                                                                                                 
						<?php else: ?>
                                
                                    <div class="smcards">
                                                <div class="large-9 medium-9 small-12 columns smallcards">
                                                      <div class="cardcontainer">                                            
                                                        <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                            echo '<div class="cardimg clearfix'; echo $c; echo'" style="background-image: url('; the_post_thumbnail_url('medium'); echo')"></div>';

                                                                echo '<div class="cardtitle white float-right">';
                                                                echo'<h2>'; the_title(); echo'</h2>';
                                                                echo'<p class="date">'; the_time('F j, Y'); echo'</p>';
                                                            echo '</div>'; ?>
                                                        </a>
                                                      </div>                                          
                                                </div> 
                                            <?php endif; ?>
                                             <?php endwhile; wp_reset_query(); ?> 
                                     
                                    </div>
        
                    <div class="row">
                             <div class="large-12 medium-12 small-12 columns">      
                                 <div class="large-9 medium-9 small-12 columns">
                                     <a href="<?php bloginfo('url'); ?>/category/uncategorized/" class="newsmore"><button>Read More</button></a>
                                 </div>
                             </div>
                    </div>
                                         
        
    </div>
</div>
    
    <div class="clear"></div>
    

            <div class="row">
                      <div class="large-12 medium-12 small-12 columns mbottom mtop">      
                            <div class="large-4 medium-4 small-12 columns mbottom">
                                 <?php echo do_shortcode("[custom-twitter-feeds]"); ?> 
                             </div>
                             <div class="large-4 medium-4 small-12 columns mbottom">
                                <?php echo do_shortcode("[WD_FB id='1']"); ?> 
                             </div>
                             <div class="large-4 medium-4 small-12 columns mbottom">
                                <iframe width="100%" height="220" src="https://www.youtube.com/embed/9fPTciP6ojw?rel=0" frameborder="0" allowfullscreen></iframe>
                                 <br><br>
                                 <iframe width="100%" height="220" src="https://www.youtube.com/embed/yzzrlk88HXk" frameborder="0" allowfullscreen></iframe>
                                 <p>Watch all of our videos on our <a href="https://www.youtube.com/user/DelawareThrives" target="_blank">Youtube Channel!</a></p>
                             </div>
                      </div>
                
              </div>

    
</section>


	
<?php get_footer(); ?>