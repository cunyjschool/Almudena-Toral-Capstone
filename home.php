<?php get_header(); ?>

<!-- Show the welcome box, slideshow, slider and magazine front only on first page.  Makes for better pagination. -->
<?php if ( $paged < 1 ) { ?>

<?php if ( get_option('gpp_welcome') == 'true' ) { include (TEMPLATEPATH . '/apps/welcome.php'); } ?>

<?php if ( get_option('gpp_slider') == 'true' || get_option('gpp_slider') === FALSE ) { include (TEMPLATEPATH . '/apps/slider.php'); } ?>

<?php if ( get_option('gpp_slideshow') == 'true' || get_option('gpp_slideshow') === FALSE ) { include (TEMPLATEPATH . '/apps/slideshow.php'); } ?>

<?php if ( get_option('gpp_video') == 'true' ) { include (TEMPLATEPATH . '/apps/video-home.php'); } ?>

<?php if ( get_option('gpp_slider_posts') == 'true' ) { include (TEMPLATEPATH . '/apps/slider-posts.php'); } ?>

<?php if ( get_option('gpp_featured') == 'true' ) { include (TEMPLATEPATH . '/apps/featured.php'); } ?>

<!-- End Better Pagination -->
<?php } ?>

<?php if ( get_option('gpp_blog') == 'true' ) { include (TEMPLATEPATH . '/apps/blog.php'); } ?>

<?php if ( get_option('gpp_category_columns') == 'true' || get_option('gpp_category_columns') === FALSE ) { include ('category-stack.php'); } ?>

<!-- Begin Footer -->
<?php get_footer(); ?>