<?php 
/**
 * The footer template.
 *
 * @package dethrives
 * @since 1.0.0
 */
?>	

<script>$('a.not-active').click(function() { return false; });</script>


	<footer id="colophon" class="colophon clearfix" role="contentinfo">	
		<?php 
			$mod = get_theme_mod( 'dethrives_customizer' );
			$copyright = isset( $mod[ 'copyright' ] ) ? $mod[ 'copyright' ] : '';
			$footer_class = $copyright ? ' has-copyright' : '';
		?>		
    <div class="site-footer clearfix<?php echo esc_attr( $footer_class ); ?>">
        
            <div id="newsletter-signup" class="newsletter">
                <div class="row">
                    <div class="newsform"><?php echo do_shortcode("[formidable id=2 description=true]"); ?></div>
                </div>
            </div>
       
     
      <div class="footerlinks">
		
            <!--<h3>Quick Links</h3>-->
            <div id="footermenu">
                <div class="row">
                    <div class="large-6 medium-6 small-6 columns">
                       <?php wp_nav_menu( array( 'menu' => 'footer-menu' ) ); ?>
                    </div>
                    <div class="large-6 medium-6 small-6 columns">
                       <div class="theme-by">Copyright <?php echo date('Y'); ?> Worldways, Inc.<br>
                        Webmaster: <a href="http://marketingsocialimpact.com/" target="_blank"> Worldways, Inc.</a></div>
                    </div>
                    
                </div>
            </div>
       
      </div>
        
					
     <!-- <div class="theme-by">
          <div class="row">
            <?php _e( 'Copyright', 'dethrives' ); ?> 
          </div>
      </div>-->
		</div>
        
	</footer><!-- #colophon -->

</div><!-- #page -->

<div id="popup-search" class="site-search">
	<button type="button" class="button-toggle close-search-form">
  	<span class="screen-reader-text"><?php _e( 'Close the search form', 'dethrives' ); ?> </span>
    <span class="fa fa-close"></span>
  </button>
	<?php get_search_form(); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>