<?php
/**
 * The template part for displaying the header.
 *
 * @package dethrives
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="https://fonts.googleapis.com/css?family=BioRhyme" rel="stylesheet">
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/css/icons.css" />
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/css/component.css" />
		<link href="https://fonts.googleapis.com/css?family=Changa+One" rel="stylesheet">
		<script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/modernizr.custom.js"></script>
        <script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/classie.js"></script>
		<!--<script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/mlpushmenu.js"></script>
		<script>
			new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
				type : 'cover'
			} );
		</script>-->
    <link href="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/css/foundation.css"  rel="stylesheet">
    <link href="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/css/gallery-owl-carousel.css"  rel="stylesheet">
    <link href="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/css/admin-gallery-owl-carousel.css"  rel="stylesheet">
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/gallery-owl-carousel.js"></script>
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/admin-gallery-owl-carousel.js"></script>
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/jquery-1.9.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/foundation.min.js"></script>
		<script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/masonry.pkgd.min.js"></script>
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/owl.carousel.min.js"></script>
    <script src="<?php bloginfo('url'); ?>/wp-content/themes/dethrives/assets/js/main.js"></script>

   <!-- Limit excert function below-->
    <?php
function string_limit_words($string, $word_limit)
{$words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);}?>
  <?php function custom_echo($x, $length)
{
  if(strlen($x)<=$length)
  {
    echo $x;
  }
  else
  {
    $y=substr($x,0,$length) . '...';
    echo $y;
  }
} ?>


	<?php wp_head(); ?>
</head>

<?php if( is_front_page() ) { ?>
  <div class="shout-out">
        <div class="row">
            <a href="<?php the_field('banner_url')?>" target="_blank"><h4><?php the_field('banner_text'); ?></h4></a>
        </div>
    </div>

<div class="row2 page-head-bg-home">
    <div class="large-8 medium-8 small-12 columns mhome">
            <div class="float-left site-logo">
                <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/assets/img/delogo.png" alt="DEthrives logo" /></a>
            </div>
            <div class="menu-position menu-container mlefthome">
                <div class="menu-container-child">
                  <nav class="menu-de"> <!--- menu---->
                    <div class="tmenu menuhome"><?php wp_nav_menu( array( 'menu' => 'top-menu' ) ); ?></div>
                    <div class="pmenu menuhome"><?php wp_nav_menu( array( 'menu' => 'primary-menu' ) ); ?></div>
                  </nav>
                </div>
            </div>
    </div>
    <div class="large-4 medium-4 small-12 columns">
        <div class="large-3 medium-3 small-12">
            <nav class="menu-de-social menuhome"><?php wp_nav_menu( array( 'menu' => 'social-menu' ) ); ?></nav>
        </div>
        <div class="large-1 medium-1 small-0 float-right de-search">
            <?php
                dethrives_quicklinks();
            ?>
        </div>
    </div>
</div>

<?php } ?>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
