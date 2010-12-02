<?php
/*
Template Name: Slideshow Page
*/
?>

<?php get_header(); ?>
<!-- <div class="span-<?php if (get_option('gpp_sidebar') == 'true' || get_option('gpp_sidebar') === FALSE) { echo "15 colborder home"; } else { echo "24 last"; } ?>"> -->
<div class="slideshow">
	<h2><?php the_title(); ?></h2>
	<div class="content">
		<iframe src="<?php if( $slideshow_url = get_post_meta($post->ID, 'slideshow_url', true) ) { echo $slideshow_url; } ?>" width="950" height="600" style="float:left;" scrolling="no"></iframe>
	</div>
<?php get_footer(); ?>