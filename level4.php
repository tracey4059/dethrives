<?php
/*
Template Name: Level 4 Landing Page
*/
get_header();
?>

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

<div id="communities">
  <div class="row">
    <div class="large-12 medium-12 small-12 columns">
      <div class="large-4 medium-4 small-12 columns">
        <div class="temp4-pc pc">
          <?php if ( have_posts() ) : while( have_posts() ) : the_post(); the_content(); endwhile; endif; ?>
        </div>
        <!--- Shows child page links as separate bubble / shows nothing if no children--->
        <?php
        $mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) ); if ( $mypages[0] ): ?>
        <div class="temp4-menu">
        <ul class="temp4-cardlinks">
        <?php foreach( $mypages as $page ) {
        $content = $page->post_content;
        if ( ! $content ) // Check for empty page
        continue;
        ?>
        <a href="<?php echo get_page_link( $page->ID ); ?>"><li <?php if ($page->ID == 1018): echo "style='display:list-item;'"; endif; ?>><?php echo $page->post_title; ?><?php if($page->ID == 1018): echo "<br/><span class='qt-span'>For ages 0-3 and 4-8</span>"; endif; ?><i class="fa fa-angle-right qt-arrow" aria-hidden="true"></i></li></a>
        <?php
        } ?>
        </ul>
        </div>
        <?php endif; ?>

      </div>

      <div class="large-8 medium-8 small-12 columns">
        <div class="qt-img">
          <img src="<?php the_post_thumbnail_url('large') ?>" alt="">
        </div>
      </div>

    </div>
  </div>
</div>

<?php get_footer('sub'); ?>
