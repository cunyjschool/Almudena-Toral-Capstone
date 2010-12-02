<?php
/*
Template Name: Category Page
*/
?>

<?php get_header(); ?>
<div class="share-yours">
	<h2><?php the_title(); ?></h2>
	<div class="content">
		<h3>Readers' Stories</h3>
		<?php if( $post_category = get_post_meta($post->ID, 'post_category', true) ) { $post_category; } 
		$args = array('category_name' => $post_category, 'paged' => $paged);
		$category_posts = new WP_Query( $args ); $tb_counter = 1;
		while ($category_posts->have_posts()) : $category_posts->the_post(); ?>
		<p>
			<a href="<?php the_permalink(); ?>" ><?php global $more; $more = 0; the_excerpt(); ?><span class="read_more">Read the whole story</span></a>
		</p>
		<?php $tb_counter++; endwhile; ?>
	</div>
	<div class="share-yours-content">
		<?php wp_reset_query(); the_content(); ?>
	</div>
</div>
<?php get_footer(); ?>