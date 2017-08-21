<?php 
/*
Template Name: Blog Style
*/
get_header();
?>
<style>
#blogstyle h2 {color: #<?php the_field('page_color'); ?>;}
#blogstyle button {background-color: #<?php the_field('page_color'); ?> !important;}
#blogstyle a {color: #<?php the_field('page_color'); ?>;}
</style>

<div class="imgcont" style="background-image: url( <?php the_post_thumbnail_url(); ?>); background-size:cover; background-repeat:no-repeat; min-height:400px; height: 100%; width:100%; box-shadow: inset 0 0 0 1000px rgba(<?php the_field('rgb_value'); ?>.8); position:relative;">
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
    <div class="large-4 medium-4 small-12 columns blog-mobile">
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
          <div class="blog-pic">
                <div class="large-4 medium-4 small-0 columns circlepic">
                    <?php if ( has_post_thumbnail() ) {
                            echo '<div style="background: url('; the_post_thumbnail_url('medium'); echo') no-repeat; background-size:cover; height:180px; width:300px; overflow:hidden; float:right; padding-right:1em; margin-top:2.5em; border-radius:1em; ">';
                            echo '</div>';}?>
                </div>
          </div>
            <div class="large-8 medium-8 small-12 columns head-para blog-text">
            <h1 class="pagetitle"><?php the_title(); ?></h1>
                <p><?php if ( have_posts() ) : while( have_posts() ) : the_post();
                     the_content();
                endwhile; endif; ?></p>
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

<div id="blogstyle">   

<?php if( have_rows('tip-article_grouping') ): ?>    
   <?php while( have_rows('tip-article_grouping') ): the_row(); ?>    
   
<section class="blogstyle-news" style="background-color: /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,d3c8e4+100 */
background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top, #ffffff 0%, #<?php the_sub_field('group_background_color'); ?> 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top, #ffffff 0%,#<?php the_sub_field('group_background_color'); ?> 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom, #ffffff 0%,#<?php the_sub_field('group_background_color'); ?> 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#<?php the_sub_field('group_background_color'); ?>',GradientType=0 ); /* IE6-9 */">
<div class="row clearfix innercontent">
    <div class="large-12 medium-12 small-12 columns clearfix mtop">
       
                 <div class="row card1 clearfix">
                     
                                        <div class="large-3 medium-3 small-12 columns">
                                     
                                           <h2>#<?php the_sub_field('group_title'); ?></h2>
                                           <div class="blog-des"><?php the_sub_field('group_short_description'); ?></div>
                                                
                                        </div>
                                        
                         
                            <?php $groupname = get_sub_field('group_call_term'); ?>   
                             
                                            <?php query_posts( array('post_type' => 'tips' , 'posts_per_page' => 2 , 'tip_group' => $groupname ) ); ?>
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                 <div class="large-9 medium-9 small-12 columns float-right">
                                                     <div class="article-card-tip3" style="background-color: #fff;">
                                                                <div class="cardcontent-tip articlecards-tips">
                                                                    <div class="main-content">
                                                                        <?php the_excerpt(); ?>
                                                                        
                                                                        <div class="purplehash3">
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
                                                    </div>
                                                <?php endwhile; wp_reset_query(); ?> 
                     
                     
                                    <?php query_posts( array('post_type' => 'post' , 'posts_per_page' => 1, 'category_name' => $groupname) ); ?>
                                    <?php while ( have_posts() ) : the_post(); ?> 
                                              <div class="large-9 medium-9 small-12 columns float-right">
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
                                             <?php endwhile; wp_reset_query(); ?>
                     
                     
                                <?php query_posts( array('post_type' => 'tips' , 'posts_per_page' => 1 , 'offset' => 2 , 'tip_group' => $groupname ) ); ?>
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                <div class="large-9 medium-9 small-12 columns float-right mbottom5">
                                                     <div class="article-card-tip3" style="background-color: #fff;">
                                                                <div class="cardcontent-tip3 articlecards-tips">
                                                                        <div class="main-content">
                                                                        <?php the_excerpt(); ?>
                                                                       
                                                                        <div class="purplehash3">
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
                                                         <a href="#" class="tips-articles3"><button>View All Family &amp; Articles</button></a>
                                                         </div>
                                                      
                                                      </div>
                                                <?php endwhile; wp_reset_query(); ?> 
                     
                     
        
       </div>
                               
                                               
                                            
                                           
                                        
                            
             
       
    </div>
</div>
    
    
     <?php endwhile; ?>
  <?php endif; ?>

</section>    
    
    
    
    
    
    
    

</div>   

	
<?php get_footer('sub'); ?>