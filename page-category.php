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
		<h3>Read More</h3>
		<?php if( $post_category = get_post_meta($post->ID, 'post_category', true) ) { $post_category; } 
		$temp = $wp_query;
		$wp_query = NULL;
		$wp_query = new WP_Query();
		$wp_query->query('category_name='.$post_category.'&paged='.$paged); $tb_counter = 1;
		while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<p><a href="<?php the_permalink(); ?>" ><?php global $more; $more = 0; the_excerpt(); ?></a></p>
		<?php $tb_counter++; endwhile; $wp_query = NULL; $wp_query = $temp;?>
	</div>
	<div class="share-yours-content">
		<?php wp_reset_query(); the_content(); ?>
	</div>
</div>
<?php if (get_option('gpp_sidebar') =='true' || get_option('gpp_sidebar') === FALSE) { get_sidebar(); } ?>
<?php get_footer(); ?>