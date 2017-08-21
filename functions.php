<?php
/**
 * Functions and definitions.
 *
 * @package dethrives
 * @since 1.0.0
 */

/**
 * The theme only works in WordPress 4.1 or later.
 *
 * @since 1.0.0
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) {
	require get_template_directory() . '/inc/class-back-compat.php';
}


if ( ! function_exists( 'dethrives_setup' ) ) :
/**
 * Setup theme features.
 *
 * @since 1.0.0
 */
function dethrives_setup() {
	// Set the $content_width
	$GLOBALS['content_width'] = apply_filters( 'dethrives_content_width', 900 );

	// Interationalization for theme.
	load_theme_textdomain( 'dethrives', get_template_directory() . '/languages' );

	// Automatic Feed Links for post and comment in the head.
	add_theme_support( 'automatic-feed-links' );

	// Manage the document title tag
	add_theme_support( 'title-tag' );

	// Support for the Featured Image
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1080, 608, true );

	// Allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption.
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enables Post Formats support for a Theme.
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'gallery',
		'video',
		'audio',
		'quote',
		'link',
		'status',
		'chat'
	) );

	// Custom header
	add_theme_support( 'custom-header', array(
		'width'									=> 992,
		'height'								=> 1300
	) );

	// custom background
	add_theme_support( 'custom-background', array(
		'default-color'			=> '#f1f1f1'
	) );

	// Register primary menu.
	register_nav_menu( 'primary', __( 'Primary Menu', 'dethrives' ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', dethrives_fonts_url() ) );
}
endif;		// end dethrives_setup().

add_action( 'after_setup_theme', 'dethrives_setup' );


if ( ! function_exists( 'dethrives_fonts_url' ) ) :
/**
 * Register Google fonts for the theme.
 *
 * @since 1.0.1
 *
 * @return string Google fonts URL for the theme.
 */
function dethrives_fonts_url() {
	$fonts_url = '';
	$fonts     = array();

	/* translators: If there are characters in your language that are not supported by Alegreya Sans font, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Alegreya Sans font: on or off', 'dethrives' ) ) {
		$fonts[] = 'Alegreya Sans:400,400italic,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since 1.0.1
 */
function dethrives_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'dethrives_javascript_detection', 0 );


/**
 * Register widgets area.
 *
 * @since 1.0.0
 */
function dethrives_register_sidebars() {
	// Primary widget.
	register_sidebar( array(
		'name'				=> __( 'Primary Sidebar', 'dethrives' ),
		'id'				=> 'primary-sidebar',
		'description'		=> __( 'Displaying under the nav menu.', 'dethrives' ),
		'class'				=> '',
		'before_widget'		=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'		=> '</section>',
		'before_title'  	=> '<h3 class="widget-title text-divider">',
		'after_title'		=> '</h3>'
	) );

	// Secondary widget.
	register_sidebar( array(
		'name'				=> __( 'Secondary Sidebar', 'dethrives' ),
		'id'				=> 'secondary-sidebar',
		'description'		=> __( 'Displaying when click the toggle icon.', 'dethrives' ),
		'class'				=> '',
		'before_widget'		=> '<section id="%1$s" class="widget %2$s">',
		'after_widget'		=> '</section>',
		'before_title'  	=> '<h3 class="widget-title text-divider">',
		'after_title'		=> '</h3>'
	) );
}

add_action( 'widgets_init', 'dethrives_register_sidebars' );


/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function dethrives_enqueue_scripts() {
	// Google fonts
	wp_enqueue_style( 'aseblo-Alegreya-Sans', dethrives_fonts_url() );

	// Font awesome
	wp_enqueue_style( 'dethrives-fontawesome', get_template_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css' );

	// Include style.css file.
	wp_enqueue_style( 'dethrives-style', get_stylesheet_uri() );

	// Theme javascript functions file.
	wp_enqueue_script( 'dethrives-functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ), '', true );
	wp_localize_script( 'dethrives-functions', 'dethrives', array(
		'videoResponsive' 			=> apply_filters( 'dethrives_video_responsive', '16:9' ),
		'expandMenu' 						=> __( 'expand child menu', 'dethrives' ),
		'collapseMenu' 					=> __( 'collapse child menu', 'dethrives' )
	) );

	// Comment reply.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'dethrives_enqueue_scripts' );





/**
 * Add post classes.
 *
 * @since 1.0.0
 *
 * @return
 */
function dethrives_post_class( $class ) {
	if ( '' === get_the_title() ) {
		$class[] = 'no-post-title';
	}

	return $class;
}

add_filter( 'post_class', 'dethrives_post_class' );


if ( ! function_exists( 'dethrives_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 *
 * @since 1.0.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function dethrives_excerpt_more( $more ) {
	$link = sprintf( ' ... <p><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		sprintf( __( 'Learn More', 'dethrives' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
	);
	return $link;
}
add_filter( 'excerpt_more', 'dethrives_excerpt_more' );
endif;


/**
 * Custom template tags.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom Style.
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/class-custom-style.php';


/**
 * Customizer
 *
 * @since 1.0.0
 */
require get_template_directory() . '/inc/class-customizer.php';

class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='mp-level'><a class='mp-back' href='#'>back</a><ul>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
}




/* show parent and child links in menu on level 3 temp */

if(!function_exists('get_post_top_ancestor_id')){
/**
 * Gets the id of the topmost ancestor of the current page. Returns the current
 * page's id if there is no parent.
 *
 * @uses object $post
 * @return int
 */
function get_post_top_ancestor_id(){
    global $post;

    if($post->post_parent){
        $ancestors = array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }

    return $post->ID;
}}

function is_tree( $pid ) {      // $pid = The ID of the page we're looking for pages underneath
    global $post;               // load details about this page

    if ( is_page($pid) )
        return true;            // we're at the page or at a sub page

    $anc = get_post_ancestors( $post->ID );
    foreach ( $anc as $ancestor ) {
        if( is_page() && $ancestor == $pid ) {
            return true;
        }
    }

    return false;  // we arn't at the page, and the page is not an ancestor
}

add_post_type_support( 'page', 'excerpt' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
