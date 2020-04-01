<?php
// figure out what posts we are going to pull
$post_category = get_sub_field('post_category');
$post_tags = get_sub_field('post_tags');
$post_num = get_sub_field('how_many_posts_to_display');
$post_order = get_sub_field('post_sorting');
// determine what we are going to show
// hide date?
$hide_date = get_sub_field('hide_date');
// hide author?
$hide_author = get_sub_field('hide_author');
// show author link?
$author_link = get_sub_field('link_author');

// if pulling only from certain categories
if($post_category AND !$post_tags){
	$post_args = array(
		'post_type' => 'post',
		'category__in' => $post_category,
		'posts_per_page' => $post_num,
		'order' => 'DESC',
		'orderby' => $post_order,
        'post_status' => 'publish'
	);
	// if pulling only from certain tags
} elseif(!$post_category AND $post_tags) {
	$post_args = array(
		'post_type' => 'post',
		'tag__in' => $post_tags,
		'posts_per_page' => $post_num,
		'order' => 'DESC',
		'orderby' => $post_order,
		'post_status' => 'publish'
	);
	// if pulling form certain categories AND tags
} elseif($post_category AND $post_tags) {
	$post_args = array(
		'post_type' => 'post',
		'category__in' => $post_category,
		'tag__in' => $post_tags,
		'posts_per_page' => $post_num,
		'order' => 'DESC',
		'orderby' => $post_order,
		'post_status' => 'publish'
	);
	// if no categories or tags where specified just pull all
} else {
	$post_args = array(
		'post_type' => 'post',
		'posts_per_page' => $post_num,
		'order' => 'DESC',
		'orderby' => $post_order,
		'post_status' => 'publish'
	);
}
$blog_posts = new WP_Query($post_args);
$count = $blog_posts->post_count;
//figure out the grid based on the number of blocks
if($count >= 4){
	$column = 'col-lg-3 col-md-6';
} elseif($count == 3){
	$column = 'col-md-4';
} elseif($count == 2){
	$column = 'col-md-6';
} elseif($count == 1){
	$column = 'col-md-12';;
}
// figure out which thumbnail to use
if($count <= 2){
    $thumb = 'post-thumb-600';
} elseif($count > 2 )
	$thumb = 'post-thumb-300';
?>
<div id="blog-post-boxes" class="container blog-listing">
	<div class="intro-text">
		<?php if(get_sub_field('related_posts_intro_text')){
			the_sub_field('related_posts_intro_text');
		}?>
	</div>
	<div class="row">
		<?php if ( $blog_posts->have_posts() ) : while ( $blog_posts->have_posts() ) : $blog_posts->the_post();
			include( locate_template( 'template-parts/content-post-box.php', false, false ) );
		endwhile;endif; wp_reset_postdata();?>
	</div>
</div>