<?php
// get the total count of flex content rows on this page
$total_rows = count( get_field('flexible_content') );
$row_counter = 0;
if (have_rows('flexible_content')) {
	while (have_rows('flexible_content')) {
		$row_counter++;
		the_row();
		// get the flex content module layout
		$layout = get_row_layout();
		//get row background color
		$bg_color = get_sub_field('background_color');
		$bg_color = row_background_color($bg_color);
		// add classes if this is the first of last flexible content row
		if($row_counter == 1){
			$count_class = ' first-row';
		} elseif($row_counter == $total_rows) {
			$count_class = ' last-row';
		} else {
			$count_class = '';
		}
		// get custom classes
		$classes = get_sub_field('custom_css_classes');
		if($classes){
			$classes = ' '.$classes;
		}
		// figure out if the decreased bottom spacing option was checked
		$reduce_bottom_pad = get_sub_field('reduced_bottom_spacing');
		if($reduce_bottom_pad){
			$bottom_pad_class = ' reduce-bottom-pad';
		} else {
			$bottom_pad_class = '';
		}
		echo '<span class="anchor" id="row'.$row_counter.'"></span><div class="container-fluid row-pad row-'.$row_counter.$bottom_pad_class.' '.$layout.' '.$bg_color.$count_class.$classes.'">';
		// Load the ACF template
		load_fcf_template();
		echo '</div>';
	}
}
?>
