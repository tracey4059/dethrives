<?php
/**
 * The template part for displaying posts.
 *
 * @package dethrives
 * @since 1.0.0
 */
 ?>
<style>

#simple-page .pagetitle {color: #<?php the_field('page_color'); ?> !important;}
#simple-page button {background-color: #<?php the_field('page_color'); ?> !important;}
#simple-page a {color: #<?php the_field('page_color'); ?>;}
</style>

<div id="simple-page">
 
<section>             
    <div class="page-cont">
     <article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>
       
        <div class="entry-content clearfix">
            <div class="large-12 medium-12 small-12">
                <div class="row default-cont pc">
                    <?php 
                        the_content();
                        dethrives_link_pages();
                    ?>
                </div>
            </div>
            
        </div><!-- .entry-content -->

        
    </article><!-- #post-## -->
</div>
   
</section>
     <div class="clear"></div>
</div>