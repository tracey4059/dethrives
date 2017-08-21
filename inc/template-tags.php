<?php
/**
 * Custom template tags.
 *
 * @package dethrives
 * @since 1.0.0
 */

/**
 * Display the site title and the description.
 *
 * @since 1.0.0
 *
 * @return void.
 */
function dethrives_site_branding() {
	$site_title = get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description' );
	if ( empty( $site_title ) && empty( $site_description ) ) {
		return;
	}
	
	print( '<div class="site-branding">' );
	
	if ( $site_title ) {
		$site_link = sprintf( '<a href="%1$s" rel="home">%2$s</a>',
			esc_url( home_url( '/' ) ),
			$site_title
		);
		
		if ( is_front_page() ) {
			printf( '<h1 class="site-title">%s</h1>', $site_link );
		}
		
		else {
			printf( '<h2 class="site-title">%s</h2>', $site_link );
		}
	}
	
	if ( $site_description ) {
		printf( '<h3 class="site-description">%s</h3>', $site_description );
	}
	
	print( '</div>' );
} 
 
 
/**
 * Site quick links at the header.
 *
 * @since 1.0.0
 *
 * @return void.
 */
function dethrives_quicklinks() {
	$show_home_link = ! ( is_front_page() && ! is_paged() );
	$show_primary_sidebar_link = has_nav_menu( 'primary' ) || is_active_sidebar( 'primary-sidebar' );
	$show_secondary_sidebar_link  = is_active_sidebar( 'secondary-sidebar' );
	$show_seach_link = true;
	$show_quick_links = $show_home_link || $show_primary_sidebar_link || $show_secondary_sidebar_link || $show_seach_link;
	if ( $show_quick_links ) :
?>
		<nav class="site-quicklinks">
			<ul class="clearfix">
				<?php if ( $show_home_link ) : ?>
					<li class="sq-home">
            <a href="<?php echo home_url( '/' ); ?>" rel="home">
            	<span class="screen-reader-text"><?php _ex( 'Home', 'Used before the home icon.', 'dethrives' ); ?> </span>
              <span class="fa fa-home fa-2x"></span>
            </a>
           </li>
				<?php endif; ?>
				
				<?php if ( $show_primary_sidebar_link ) : ?>
					<!--<li class="sq-primary-sidebar">
          	<button type="button" class="button-toggle">
            	<span class="screen-reader-text"><?php _e( 'Expand the primary sidebar', 'dethrives' ); ?> </span>
              <span class="fa fa-bars fa-2x q-bars"></span>
            </button>
          </li>-->
				<?php endif; ?>
				
				<?php if ( $show_secondary_sidebar_link ) : ?>
					<!--<li class="sq-secondary-sidebar">
          	<button type="button" class="button-toggle">
            	<span class="screen-reader-text"><?php _e( 'Expand the secondary sidebar', 'dethrives' ); ?> </span>
              <span class="fa fa-ellipsis-h fa-2x q-ellipsis"></span>
            </button>
          </li>-->
				<?php endif; ?>
				
				<?php if ( $show_seach_link ) : ?>
					<li class="sq-search">
          	<button type="button" class="button-toggle">
            	<span class="screen-reader-text"><?php _e( 'Poppup the search form', 'dethrives' ); ?> </span>
              <span class="fa fa-search fa-2x q-search"></span>
            </button>
          </li>
				<?php endif; ?>
			</ul>
		</nav>
<?php
	endif;
}


/**
 * Display the entry header.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dethrives_entry_header() { 
	// Header meta
	dethrives_entry_header_meta();
	
	// post featured image
	if ( ! is_attachment() ) {
		dethrives_post_thumbnail();
	}
	
	// Post title
	dethrives_entry_title();
	
	// Time meta
	if ( ! is_page() ) {
		printf( '<time class="entry-date text-divider" datetime="%1$s"><span class="screen-reader-text">%2$s </span><a class="entry-date-link" href="%3$s">%4$s</a></time>',
			esc_attr( get_the_date( 'c' ) ),
			_x( 'Posted on', 'Used before publish date.', 'dethrives' ),
			esc_url( get_permalink() ),
			get_the_time( get_option( 'date_format' ) )
		);
	}
}


/**
 * Display the entry header meta.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dethrives_entry_header_meta() {
	$is_sticky = ( is_sticky() && is_home() && ! is_paged() );
	$format = get_post_format();
	$is_format = current_theme_supports( 'post-formats', $format );
	if ( $is_sticky || $is_format ) :
?>
		<div class="entry-header-meta">
			<?php if ( $is_sticky ) : ?>
				<span class="sticky-post"><?php _e( 'FEATURED', 'dethrives' ); ?></span>
			<?php endif; ?>
			
			<?php if ( $is_format ) : ?>
				<a href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" class="entry-format">
					<?php 
						printf( '<span class="screen-reader-text">%1$s: %2$s</span><span class="fa fa-%3$s"></span>', 
							_x( 'Format', 'Used before post format.', 'dethrives' ),
							get_post_format_string( $format ),
							esc_attr( dethrives_get_format_icon( $format ) ) 
						); 
					?>
				</a>
			<?php endif; ?>
		</div>
<?php
	endif;	
}
 

/**
 * Get the post format icon.
 *
 * @since 1.0.0
 *
 * @param string $format. The post format name.
 * @return string.
 */
function dethrives_get_format_icon( $format ) {
	if ( empty( $format ) ) {
		return;
	}
	
	switch ( $format ) {
		case 'aside' : {
			$type = 'file-text-o';
			break;
		}
		
		case 'image' : {
			$type = 'camera';
			break;
		}
		
		case 'gallery' : {
			$type = 'th-large';
			break;
		}
		
		case 'video' : {
			$type = 'video-camera';
			break;
		}
		
		case 'audio' : {
			$type = 'music';
			break;
		}
		
		case 'quote' : {
			$type = 'quote-right';
			break;
		}
		
		case 'link' : {
			$type = 'link';
			break;
		}
		
		case 'status' : {
			$type = 'commenting';
			break;
		}
		
		case 'chat' : {
			$type = 'wechat';
			break;
		}																
		
		default: $type = '';
	}
	
	return $type;
}


/**
 * Display the post thumbnail.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dethrives_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}	
?>
	<figure class="post-thumbnail">
		<?php if ( ! is_singular() ) : ?>
    	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
    <?php 
			else:
				the_post_thumbnail();
			endif; 
		?>
	</figure>
<?php
}


/**
 * Display the post title.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dethrives_entry_title() {
	if ( is_single() || is_page() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	}
	
	else {
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	}
}


if ( ! function_exists( 'dethrives_entry_meta' ) ) :
/**
 * Prints meta at the entry footer with categories, tags, author, etc.
 *
 * @since 1.0.0
 */
function dethrives_entry_footer() {
?>
	<ol>
		<?php if ( is_multi_author() ) : ?>
            <li class="byline">
                <span class="fa fa-user"></span>
                <span class="screen-reader-text"><?php _ex( 'Author', 'Used before post author name.', 'dethrives' ); ?> </span>
                <?php the_author_posts_link(); ?>
            </li>
		<?php endif; ?>
		
		<?php 
			$categories_list = get_the_category_list( ', ' );
			if ( $categories_list && dethrives_categorized_blog() ) :
		?>
				<li class="cat-links">
					<span class="fa fa-folder-open"></span>
          <span class="screen-reader-text"><?php _ex( 'Categories', 'Used before category names.', 'dethrives' ); ?> </span>
					<?php echo $categories_list; ?>
				</li>
		<?php endif; ?>
		
		<?php 
			$tags_list = get_the_tag_list( '<span class="fa fa-tags"></span>', ', ' );
			if ( $tags_list ) :
		?>
				<li class="tag-links">
					<span class="screen-reader-text"><?php _ex( 'Tags', 'Used before tag names.', 'dethrives' ); ?> </span>
					<?php echo $tags_list; ?>
				</li>
		<?php endif; ?>
        
		<?php 
			if ( is_attachment() && wp_attachment_is_image() ) :
				// Retrieve attachment metadata.
				$metadata = wp_get_attachment_metadata();
				$parent_post_id = wp_get_post_parent_id( get_the_ID() );			
     ?>
        <?php 
			  	if ( $parent_post_id ) :
			  ?>
           	<li class="parent-post">
                <a href="<?php echo esc_url( get_permalink( $parent_post_id ) ); ?>" title="<?php echo esc_attr( get_the_title( $parent_post_id ) ); ?>">
                  <span class="fa fa-level-up"></span>
                    <span><?php _e( 'Published in', 'dethrives' ); ?> </span>
                    <span class="screen-reader-text"><?php echo get_the_title( $parent_post_id ); ?></span>
                </a>
           </li>
         <?php endif; ?>
                
           <li class="image-data">
              <span class="fa fa-search-plus"></span>
              <span class="screen-reader-text"><?php _ex( 'Full size', 'Used before full size attachment link.', 'dethrives' ); ?> </span>
							<?php 
                printf( '<a href="%1$s">%2$s &times; %3$s</a>', 
									esc_url( wp_get_attachment_url() ),
									$metadata['width'], 
									$metadata['height'] 
								); 
              ?>
            </li>
     <?php endif; ?>            
		
    <?php if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
      <li class="comments-link">
        <span class="fa fa-comment"></span>
        <?php 
          comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'dethrives' ), get_the_title() ) ); 
        ?>
      </li>
    <?php endif; ?>
		
		<?php if ( get_edit_post_link() ) : ?>
                  <li class="edit-link">
                      <span class="fa fa-pencil-square-o"></span>
                      <?php edit_post_link(); ?>
                  </li>
		<?php endif; ?>			
	</ol>
<?php
}
endif;


/**
 * Determine whether blog/site has more than one category.
 *
 * @since 1.0.0
 *
 * @return bool True of there is more than one category, false otherwise.
 */
function dethrives_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'dethrives_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'dethrives_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so dethrives_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so dethrives_categorized_blog should return false.
		return false;
	}
}


/**
 * Flush out the transients used in {@see dethrives_categorized_blog()}.
 *
 * @since 1.0.0
 */
function dethrives_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'dethrives_categories' );
}
add_action( 'edit_category', 'dethrives_category_transient_flusher' );
add_action( 'save_post',     'dethrives_category_transient_flusher' );


/**
 * Display the posts pagination.
 *
 * @since 1.0.0
 */
function dethrives_posts_pagination() {
	the_posts_pagination( array(
		'mid_size'					=> 2,
		'prev_text'          		=> __( '&laquo; Prev', 'dethrives' ),
		'next_text'          		=> __( 'Next &raquo;', 'dethrives' ),
		'before_page_number' 		=> '<span class="screen-reader-text">' . __( 'Page', 'dethrives' ) . ' </span>',
	) );
}


/**
 * Display the title and description at the archive pages.
 *
 * @since 1.0.0
 */
function dethrives_archive_header() {	
	if ( is_category() ) {
		$icon = 'folder-open-o';
	} elseif ( is_tag() ) {
		$icon = 'tag';
	} elseif ( is_author() ) {
		$icon = 'user';
	} elseif ( $format = get_post_format() ) {
		if ( current_theme_supports( 'post-formats', $format ) ) {
			$icon = dethrives_get_format_icon( $format );
		}
	} elseif ( is_date() ) {
		$icon = 'calendar';
	} elseif ( is_search() ) {
		$icon = 'search';
	}
	
	$icon = isset( $icon ) && $icon ? $icon : 'list-ul';
?>
	<header class="page-header">
		<?php printf( '<span class="archive-icon fa fa-%s"></span>', $icon ); ?>
		<div class="archive-summary">
			<?php
				if ( is_search() ) {
					printf( '<h1 class="page-title">%s</h1>', __( 'Search Results for: ', 'dethrives' ) . get_search_query() );
				} else {
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				}
			?>
		</div>
	</header><!-- .page-header -->
<?php	
}


/**
 * Display the post pagination.
 *
 * @since 1.0.0
 */
function dethrives_post_navigation() {
	if ( is_attachment() ) {
		return;
	}
	
	the_post_navigation( array(
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'PREVIOUS', 'dethrives' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Previous post:', 'dethrives' ) . '</span> ' .
										'<span class="post-title">%title</span>',						
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'NEXT', 'dethrives' ) . '</span> ' .
										'<span class="screen-reader-text">' . __( 'Next post:', 'dethrives' ) . '</span> ' .
										'<span class="post-title">%title</span>'
	) );
}


/**
 * Display the pagination in the single page.
 *
 * @since 1.0.0
 */
function dethrives_link_pages() {
	wp_link_pages( array(
		'before'      => '<div class="page-links pagination"><span class="page-links-title">' . __( 'Pages:', 'dethrives' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'dethrives' ) . ' </span>%',					
	) );
}


/**
 * Display the comments pagination.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dethrives_comments_paging() {
?>
	<nav class="comments-navigation navigation pagination" role="navigation" aria-label="<?php esc_attr_e( 'Comment navigation', 'dethrives' ); ?>">
		<h3 class="screen-reader-text"><?php _e( 'Comment navigation', 'dethrives' ); ?></h3>
		<?php	
			paginate_comments_links();
		?>
	</nav>
<?php
}