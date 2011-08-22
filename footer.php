		</div> <!-- end leftcol -->
		<?php get_sidebar(); ?>
		
		</div> <!-- /container -->
		
			<div id="social">
				<ul class="piped">
					<li><a href="#"><img src="http://rd.uniba.jp/blog/wp-content/themes/iblog2/img/logo_social_vimeo.png"></a></li>
					<li><a href="#"><img src="http://rd.uniba.jp/blog/wp-content/themes/iblog2/img/logo_social_twitter.png"></a></li>
					<li><a href="#"><img src="http://rd.uniba.jp/blog/wp-content/themes/iblog2/img/logo_social_facebook.png"></a></li>
					<li><a href="#"><img src="http://rd.uniba.jp/blog/wp-content/themes/iblog2/img/logo_social_unibajp.png"></a></li>
				</ul>
			</div>
			
	</div> <!-- /wrapper -->
    <hr class="hidden" />
  </div><!--/page -->
<div style="display:none;">
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/navgrad-active.png" alt="preload" />
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/navgrad-down.png" alt="preload" />
	<img src="<?php bloginfo('stylesheet_directory'); ?>/images/navgrad-hover.png" alt="preload" />
</div>

<!-- Analytics Go Here -->
<?php if(get_option('pp_analytics')):?><?php echo get_option('pp_analytics');?><?php endif;?>
<!-- End Analytics -->
<?php wp_footer(); ?>
</body>
</html>