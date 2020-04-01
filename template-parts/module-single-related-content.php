<?php
	$current_id = get_the_ID();
	// first we must figure out what kind of post this is
	$post_type = get_post_type();
	if($post_type == 'post'){
		// figure out what category of post this is
		$taxs = get_the_terms($current_id,'category');
		foreach ( $taxs as $tax ) {
			$termID[] = $tax->term_id;
		}
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => 4,
			'orderby'        => 'date',
			'order' => 'DESC',
			'cat' => $termID,
			'post__not_in' => array($current_id),
		);
	} elseif($post_type == 'resource'){
		// if it's a resource we need to figure out the taxonomy
		$taxs = get_the_terms($current_id,'resource_taxonomy');
		foreach ( $taxs as $tax ) {
			$termID[] = $tax->term_id;
		}
		$args = array(
			'post_type' => 'resource',
			'posts_per_page' => 4,
			'orderby'        => 'date',
			'order' => 'DESC',
			'tax_query' => array(
				array (
					'taxonomy' => 'resource_taxonomy',
					'field' => 'term_id',
					'terms' => $termID,
				)
			),
			'post__not_in' => array($current_id),
		);
	}
	$query = new WP_Query($args);
	$post_count = $query->found_posts;
?>
<?php if($post_count > 0){?>
	<div class="container related-content">
		<div class="row">
			<div class="col-md-12">
				<h3>Related Posts</h3>
			</div>
		</div>
		<div class="row">
			<?php
			if($query->have_posts()) : while($query->have_posts()) : $query->the_post();
			// get the featured image
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'resources-square');
			$thumb_id = get_post_thumbnail_id();
			$alt = get_post_meta($thumb_id, '_wp_attachment_image_alt', true);
			?>
			<div class="col-md-3 resource-col">
				<a href="<?php the_permalink();?>">
					<div class="related-thumb">
						<img src="<?php echo $image[0];?>" alt="<?php echo $alt;?>">
					</div>
					<h4><?php the_title();?></h4>
					<p class="related-date"><?php echo get_the_date('F j, Y');?></p>
				</a>
			</div>
			<?php endwhile;endif; wp_reset_query(); ?>
		</div>
	</div>
<?php }?>
