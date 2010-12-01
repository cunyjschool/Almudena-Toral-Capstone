<!-- Begin Category Stack Section -->
<div class="double-border"></div>
<div id="category-stack">
<div class="span-15 colborder">
<?php
$cat_1 = get_option('gpp_category_column_1');
$cat_2 = get_option('gpp_category_column_2');
$cat_3 = get_option('gpp_category_column_3');
$cat_4 = get_option('gpp_category_column_4');
$cat_5 = get_option('gpp_category_column_5');

// set default categories
if($cat_1===FALSE || $cat_1=="0") {$cat_1 = "";}
if($cat_2===FALSE || $cat_2=="0") {$cat_2 = "";}
if($cat_3===FALSE || $cat_3=="0") {$cat_3 = "";}
if($cat_4===FALSE || $cat_4=="0") {$cat_4 = "";}
if($cat_5===FALSE || $cat_5=="0") {$cat_5 = "";}

$categories_stack = array();

if($cat_1 != "") {array_push($categories_stack,"$cat_1");}
if($cat_2 != "") {array_push($categories_stack,"$cat_2");}
if($cat_3 != "") {array_push($categories_stack,"$cat_3");}
if($cat_4 != "") {array_push($categories_stack,"$cat_4");}
if($cat_5 != "") {array_push($categories_stack,"$cat_5");}

foreach ($categories_stack as $category) { ?>
<?php query_posts("showposts=1&cat=$category"); ?>
<?php while (have_posts()) : the_post(); ?>
<h3 class="sub"><a href="<?php echo get_category_link($category);?>"><?php single_cat_title(); ?></a></h3>
<div class="span-9 append-1 first">
<?php get_the_image(); ?>
<h6><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp_i18n'),the_title_attribute('echo=0')); ?>"><?php the_title() ?></a></h6><p class="byline"><?php the_time(__('M d, Y', 'gpp_i18n')) ?> | <a href="<?php the_permalink(); ?>"><?php _e('Read','gpp_i18n'); ?></a> | <?php comments_popup_link(__('Discuss','gpp_i18n'), __('1 Comment','gpp_i18n'), __ngettext('% Comment', '% Comments', get_comments_number(), 'gpp_i18n')); ?></p>
<p><?php echo substr(get_the_excerpt(),0,200); ?>&hellip;</p>
<?php endwhile; ?>
</div>

<?php query_posts("showposts=5&offset=1&cat=$category"); ?>
<div class="span-5 more last">
<ul>
<?php while (have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','gpp_i18n'),the_title_attribute('echo=0')); ?>" class="title"><?php the_title(); ?></a></li>
<?php endwhile; ?>
</ul>
</div>
<div class="double-border"></div>
<?php } ?>
</div>
</div>
<?php get_sidebar(); ?>
<hr />