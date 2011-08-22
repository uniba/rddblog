<?php get_header(); ?>

      <div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="entry-hr <?php if(isLast()) echo 'entry-last'; ?>">
        		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
        
					<div class="post-side">
						<div class="post-info">
							<p class="year"><?php the_time('Y') ?></p>
							<p class="month-day"><?php the_time('m/d'); ?></p>
							<?php echo get_avatar($post->post_author, $size = '50'); ?>
						</div>
					<div class="post-side-tag">
						<?php the_category() ?>
					</div>
				</div>
 
  		    <div class="post-main">
         	    <h2  class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to',TDOMAIN);?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<?php if(function_exists('the_post_thumbnail') && has_post_thumbnail()): ?>
            	<div class="postthumb">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link To', TDOMAIN);?> <?php the_title_attribute();?>">
						<?php the_post_thumbnail('thumbnail');?>
					</a>
		         </div>
				<?php endif; ?>
            	<?php the_content(__('Continue reading &raquo;',TDOMAIN)); ?>
				<?php edit_post_link(__('Edit', TDOMAIN), '', ''); ?>
				<?php wp_link_pages('before=<p>&after=</p>&next_or_number=number&pagelink=page %'); ?>
				
				<div class="sns">
					<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, efacebookwindowf, ewidth=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1Œ); return false;"><img src="http://rd.uniba.jp/blog/wp-content/themes/iblog2/img/f_logo_s.png" width="17" height="17" /></a>
					<a href="http://twitter.com/share?count=horizontal&amp;original_referer=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;url=<?php the_permalink(); ?>&amp;via=UnibaRD" onclick="window.open(this.href, etwitter_sharef, ewidth=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1Œ); return false;" target="_blank"><img src="http://rd.uniba.jp/blog/wp-content/themes/iblog2/img/t_logo_s.png" width="17" height="17" /></a>
					</div><!--sns -->
					
   			</div><!--entry -->
		</div><!--/post -->
 			<!-- <div class="tags"><?php the_tags(__('Tagged with: ', TDOMAIN),' &bull; ','<br />'); ?></div> -->
 	</div>
	
		<?php endwhile; ?>
		
        <div class="page-nav fix">
        	<span class="previous-entries"><?php next_posts_link(__('Old', TDOMAIN)); ?></span>
        	<span class="next-entries"><?php previous_posts_link(__('New', TDOMAIN)); ?></span>
        </div><!-- page-nav end -->
        
	<?php else : ?>
		<div class="post">
			<div class="billboard">
				<h2><?php _e('Not Found', TDOMAIN);?></h2>
				<p><?php _e('Sorry, but you are looking for something that isn\'t here.', TDOMAIN);?></p>
			</div>
		</div>
	<?php endif; ?>
	</div>
<?php get_footer(); ?>