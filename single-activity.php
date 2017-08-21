<?php
/**
 * The single activity post template file.
 *
 * @package dethrives
 * @since 1.0.0
 */

get_header();
?>
<style>
ul.cardlinks-temp2 li a:hover {color:#fff !important;}
ul.cardlinks-temp2 li:hover {font-weight: bold; background-color: #<?php if (the_field('page_color')): the_field('page_color'); else: echo '3d7bb3'; endif; ?>; color:#fff !important; }
ul.cardlinks-temp2 li .nohover a:hover  {color:#000 !important;}
ul.cardlinks-temp2 li.nohover:hover  {background-color: #fff; color:#000 !important;}
ul.cardlinks-temp2 li.current_page_item {font-weight: bold; background-color: #<?php if (the_field('page_color')): the_field('page_color'); else: echo '3d7bb3'; endif; ?>!important; color:#fff !important; }
ul.cardlinks-temp2 li.current_page_item a {color:#fff !important;}
.circle{background: #<?php if (the_field('page_color')): the_field('page_color'); else: echo '3d7bb3'; endif; ?>;}
</style>

<div class="imgcont" style="background-image: url( '<?php bloginfo('template_directory'); ?>/assets/img/shapes.jpg'); background-size:cover; background-repeat:repeat; min-height:150px; height: 100%; width:100%; background-color: #<?php the_field('page_color'); ?>; box-shadow: inset 0 0 0 1000px rgba(0,0,0,.3); position:relative;">
  <div class="row2">
    <div class="large-8 medium-8 small-12 columns mhome">
      <div class="float-left site-logo">
        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/delogo.png" alt="DEthrives logo" /></a>
      </div>
      <div class="menu-position menu-container mlefthome">
        <div class="menu-container-child">
          <nav class="menu-de"> <!--- menu---->
            <div class="tmenu"><?php wp_nav_menu( array( 'menu' => 'top-menu' ) ); ?></d>
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
        <?php dethrives_quicklinks(); ?>
      </div>
    </div>
  </div>
</div>


<div id="activities">
  <div class="row">
    <div class="large-12 medium-12 small-12 columns">
      <div class="large-4 medium-4 small-12 columns">
        <div class="page-brand">
          <div class="outter-circle" style="height:100px;width:100px;margin-right:1rem">
            <div class="circle"></div>
          </div>
          <?php $category = get_the_category(); ?>
          <?php if ( $category[0]->slug != 'lifestyle' ): ?>
            <h2 class="act-title">QT 30</h2>
          <?php else: ?>
            <h2 class="act-title">Healthy Eating & Physical Activity</h2>
          <?php endif; ?>
        </div>
        <!--- Shows parent page link as overview ans siblings withing section--->
        <div class="temp2-menu2">
          <ul class="cardlinks-temp2">
            <li>
              <?php //variables
                if ( $category[0]->slug != 'lifestyle' ): $post_id = 1018; else: $post_id = 1220; endif;
                $post = get_post($post_id);
               ?>
              <?php
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
              <li><a href="<?php the_sub_field('custom_link'); ?>" target="_blank"><?php the_sub_field('custom_link_name'); ?></a></li>
            <?php endwhile; wp_reset_query(); ?>
          </ul>
        </div>
      </div>
      <div class="large-8 medium-8 small-12 columns">
        <?php if (has_post_thumbnail()): ?>
          <div class="feature-container">
            <div class="feature-img" style="background-image:url('<?php the_post_thumbnail_url('large') ?>')"></div>
          </div>
        <?php endif; ?>
        <div class="activity-content">
          <?php if ( have_posts() ) : ?>
            <?php while( have_posts() ) : the_post(); ?>
              <div class="title">
                <h1><?php the_title(); ?></h1>
              </div>
              <div class="act-pc">
                <?php the_content(); ?>
                <?php //variables
                  $count = 0;
                  $bord_color = array('','e6a33b','a60054','3d7bb3')
                  ?>
                <?php if( have_rows('bonus') ): ?>
                	<?php while( have_rows('bonus') ): the_row(); $count++ ?>
                	  <div class="bonus">
                      <h1 style="border-bottom: 5px solid #<?php echo $bord_color[$count] ?>;">Bonus <?php echo $count ?></h1>
                      <?php the_sub_field('bonus_content'); ?>
                		</div>
                	<?php endwhile; ?>
                <?php endif; ?>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>

          <?php
            $color_array = array("","30,144,255","199,21,133","138,43,226","255,165,0","65,105,225");
            $page_id = get_the_ID();
            $category = get_the_category();
            $posts = get_posts( array('post_type' => 'activity','posts_per_page'=>2,'exclude' => $page_id,'tax_query' => array(array('taxonomy' => 'category','terms' => array( $category[0]->term_id ) ) ) ) );
          ?>
          <div class="row small-up-1 medium-up-2">
            <h3 class="other-title">Other Cool Activities</h3>
            <?php foreach ($posts as $post): $count++?>
              <?php //Access all post data
                setup_postdata($post);
              ?>
              <div class="activity-card column">
                <div class="card">
                  <div class="card-header" style="background-image:url('<?php the_post_thumbnail_url('large'); ?>')">
                    <div class="activity-overlay" style="background-color:rgba(<?php echo $color_array[$count]; ?>,.5)"></div>
                    <h3 class="activity-title"><?php echo the_title(); ?></h3>
                  </div>
                  <div class="card-section">
                    <p><?php echo(get_the_excerpt()); ?></p>
                    <a class="activity-link" style="color:rgb(<?php echo $color_array[$count]; ?>)" href="<?php the_permalink(); ?>"> View This Activity</a>
                  </div>
                </div>
              </div>
              <?php if ($count == 5): $count = 0; endif; ?>
            <?php endforeach; ?>
          </div>
          <div class="act-btn">
            <?php $category = get_the_category(); ?>
            <?php if ( $category[0]->slug != 'lifestyle' ): $id = 1018; else: $id = 1220; endif; ?>
            <a href="<?php echo get_permalink( $id ); ?>">View More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php get_footer('sub'); ?>
