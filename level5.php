<?php
/*
Template Name: Level 5
*/
get_header();
?>
<style>
#activities button {background-color: #<?php the_field('page_color'); ?> !important;}
#activities a {color: #<?php the_field('page_color'); ?>;}
ul.cardlinks-temp2 li a:hover {color:#fff !important;}
ul.cardlinks-temp2 li:hover {font-weight: bold; background-color: #<?php the_field('page_color'); ?>; color:#fff !important; }
ul.cardlinks-temp2 li .nohover a:hover  {color:#000 !important;}
ul.cardlinks-temp2 li.nohover:hover  {background-color: #fff; color:#000 !important;}
ul.cardlinks-temp2 li.current_page_item {font-weight: bold; background-color: #<?php the_field('page_color'); ?> !important; color:#fff !important; }
ul.cardlinks-temp2 li.current_page_item a {color:#fff !important;}
.circle{background:#<?php the_field('page_color'); ?>}
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
          <?php if ( is_page(1018) ): ?>
            <h2 class="act-title">QT 30</h2>
          <?php else: ?>
            <h2 class="act-title">Healthy Eating & Physical Activity</h2>
          <?php endif; ?>
        </div>
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
              <li><a href="<?php the_sub_field('custom_link'); ?>" target="_blank"><?php the_sub_field('custom_link_name'); ?></a></li>
            <?php endwhile; wp_reset_query(); ?>
          </ul>
        </div>
      </div>

      <div class="large-8 medium-8 small-12 columns page-content">
        <h4 class="pc-title">Overview</h4>
        <div class="temp5-pc pc">
          <?php if ( have_posts() ) : while( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
        </div>
          <?php //variables
            $color_array = array("","30,144,255","199,21,133","138,43,226","255,165,0","65,105,225");
            $page_id = get_the_ID();
            // sets the category name based on the current page
            if ($page_id == 1220): $cat_name = 'lifestyle'; else: $cat_name = 'activities'; endif;
            $category_parent = get_term_by( 'slug', $cat_name, 'category' );
            $categories = get_categories( array('post_type' => 'activity','child_of' => $category_parent->term_id ) );
            $posts = get_posts( array('post_type' => 'activity','posts_per_page' => 2,'tax_query' => array(array('taxonomy' => 'category','terms' => array( $category_parent->term_id ) ) ) ) );
          ?>
          <?php if ($categories): ?>
            <?php foreach($categories as $category) : ?>
              <div class="accordion">
                <div class="plus-minus"></div>
                <h4 class="sub-title"><?php echo $category->name ?></h4>
              </div>
              <?php
              // The Query
              $args = array('post_type' => 'activity','posts_per_page' => 4, 'tax_query' => array(array('taxonomy' => 'category', 'terms' => $category->term_id)) );
              $the_query = new WP_Query( $args ); ?>
              <div class="panel">
                <!-- <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++?>
                  <div class="activity-card grid-item column">
                    <div class="card">
                      <div class="card-header" style="background-image:url('<?php the_post_thumbnail_url('large'); ?>')">
                        <div class="activity-overlay" style="background-color:rgba(<?php echo $color_array[$count]; ?>,.5)"></div>
                        <h3 class="activity-title"><?php the_title(); ?></h3>
                      </div>
                      <div class="card-section">
                        <p><?php echo(get_the_excerpt()); ?></p>
                        <a class="activity-link" style="color:rgb(<?php echo $color_array[$count]; ?>)" href="<?php the_permalink(); ?>"> View This Activity</a>
                      </div>
                    </div>
                  </div>
                  <?php if ($count == 5): $count = 0; endif; ?>
                <?php endwhile; wp_reset_query(); ?> -->
                <?php echo do_shortcode('[ajax_load_more css_classes="row small-up-1 medium-up-2" post_type="activity" posts_per_page="4" category="'.$category->slug.' " scroll="false" transition_container="false" button_label="Load More" button_loading_label="Loading More..."]'); ?>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="grid row small-up-1 medium-up-2">
              <?php foreach ($posts as $post): $count++?>
                <?php //Access all post data
                  setup_postdata($post);
                ?>
                <div class="grid-item column activity-card">
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
            <div class="row">
                <div class="large-12 medium-12 small-12 columns">
                    <div id="more_posts"><a href="#more_posts" button class="outsite">Load More</a><p class="loading">one moment...</p><br><div class="loader"></div></div>
                    <div class="alert"><p class="outsite">No more post to show.</p></div>
                </div>
            </div>
          <?php endif; ?>
      </div>
    </div>
  </div>
</div>


<?php get_footer('sub'); ?>
