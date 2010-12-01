<?php get_header(); ?>

<div class="span-<?php if (get_option('gpp_sidebar') == 'true' || get_option('gpp_sidebar') === FALSE) { echo "15 colborder home"; } else { echo "24 last"; } ?>">

<div <?php if(function_exists('post_class')) : ?><?php post_class(); ?><?php else : ?>class="post post-<?php the_ID(); ?>"<?php endif; ?>>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<h2><?php the_title(); ?></h2>
	<?php if ( !post_password_required() ) { ?>
		<?php include (TEMPLATEPATH . '/apps/multimedia.php'); ?>
		<?php include (TEMPLATEPATH . '/apps/video.php'); ?>
	<?php } ?>
	<?php the_content(); ?>
	<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','gpp_i18n').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	<div class="clear"></div>

	<p class="postmetadata alt">
		<small>
			<?php printf(__('This entry was posted on %1$s at %2$s.','gpp_i18n'),get_the_time(__('l, F jS, Y','gpp_i18n')),get_the_time());?>
			<?php _e('It is filed under','gpp_i18n'); ?> <?php the_category(', '); the_tags(__(' and tagged with ','gpp_i18n')); ?>.
			<?php printf(__('You can follow any responses to this entry through the <a href="%1$s" title="%2$s feed">%2$s</a> feed.','gpp_i18n'),get_post_comments_feed_link(),__('RSS 2.0','gpp_i18n')); ?> 
			<?php edit_post_link(__('Edit this entry','gpp_i18n'),'','.'); ?>
		</small>
	</p>

	<div class="navi prev left"><?php next_post_link('%link', '&larr;', TRUE); ?></div>
	<div class="navi next right"><?php previous_post_link('%link', '&rarr;', TRUE); ?></div>
	<div class="clear"></div>
	
<?php endwhile; else : ?>
	<h2 class="center"><?php _e('Not Found','gpp_i18n'); ?></h2>
	<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.','gpp_i18n'); ?></p>
	<?php get_search_form(); ?>
<?php endif; ?>
</div>

	<?php comments_template('', true); ?>
	<?php include (TEMPLATEPATH . '/apps/ad-main.php'); ?>
</div>

<?php if (get_option('gpp_sidebar') =='true' || get_option('gpp_sidebar') === FALSE) { get_sidebar(); } ?>

<!-- Begin Footer -->
<?php get_footer(); ?>