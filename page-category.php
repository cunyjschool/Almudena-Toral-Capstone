<?php
/*
Template Name: Category Page
*/
?>

<?php get_header(); ?>
<!-- <div class="span-<?php if (get_option('gpp_sidebar') == 'true' || get_option('gpp_sidebar') === FALSE) { echo "15 colborder home"; } else { echo "24 last"; } ?>"> -->
<div class="share-yours">
	<h2><?php the_title(); ?></h2>
	<div class="content">
		<?php if( $post_category = get_post_meta($post->ID, 'post_category', true) ) { $post_category; } 
		$temp = $wp_query;
		$wp_query = NULL;
		$wp_query = new WP_Query();
		$wp_query->query('category_name='.$post_category.'&paged='.$paged); $tb_counter = 1;
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<div <?php if(function_exists('post_class')) : ?><?php post_class(); ?><?php else : ?>class="post post-<?php the_ID(); ?>"<?php endif; ?>>
			<h3><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp_i18n'),the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h3>
			<div class="entry">
				<?php if ( !post_password_required() ) { ?>
					<?php include (TEMPLATEPATH . '/apps/multimedia.php'); ?>
					<?php include (TEMPLATEPATH . '/apps/video.php'); ?>
				<?php } ?>
				<?php global $more; $more = 0; the_content(); ?>
				<?php if ($tb_counter == 1) { ?>
				<?php include (TEMPLATEPATH . '/apps/ad-main.php'); ?>
				<?php  } ?>
			</div><div class="clear"></div>
		</div><div class="clear"></div>
		<p class="postmetadata"><?php the_time(__('M d, Y', 'gpp_i18n')); ?> | <?php _e('Categories:','gpp_i18n'); if (the_category(', '))  the_category(); ?> <?php if (get_the_tags()) the_tags(__('| Tags: ','gpp_i18n')); ?> | <?php comments_popup_link(__('Leave A Comment &#187;', 'gpp_i18n'), __('1 Comment &#187;', 'gpp_i18n'),__ngettext('% Comment &#187;', '% Comments &#187;',get_comments_number (),'gpp_i18n')); ?> <?php edit_post_link(__('Edit','gpp_i18n'), '| ', ''); ?></p>
		<?php $tb_counter++; endwhile; ?>
		<div class="nav-interior">
			<div class="prev"><?php next_posts_link(__('&laquo; Older Entries','gpp_i18n')); ?></div>
			<div class="next"><?php previous_posts_link(__('Newer Entries &raquo;','gpp_i18n')); ?></div>
		</div><div class="clear"></div>
		<?php $wp_query = NULL; $wp_query = $temp;?>
	</div>
	<div class="share-yours-content">
		<?php wp_reset_query(); the_content(); ?>
	</div>
</div>
<?php if (get_option('gpp_sidebar') =='true' || get_option('gpp_sidebar') === FALSE) { get_sidebar(); } ?>
<?php get_footer(); ?>