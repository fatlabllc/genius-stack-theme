<?php
function brand_colors(){
	$color1 = get_field('flws_primary_brand_color','option');
	$color2 = get_field('flws_secondary_brand_color','option');
	$color3 = get_field('flws_third_brand_color','option');
	//convert colors to rgba so we can add opacity for backgrounds
	$color1_alpha = hex2rgba($color1, 0.1);
	$color2_alpha = hex2rgba($color2, 0.1);
	$color3_alpha = hex2rgba($color3, 0.1);
	$color_pallet = array($color1,$color2,$color3,$color1_alpha,$color2_alpha,$color3_alpha);
	return $color_pallet;
}

// get the felxible area background color
function row_background_color($color_choice){
	if($color_choice == 'White'){
		$color_class = 'bgcolor1';
	} elseif($color_choice == 'Light Gray'){
		$color_class = 'bgcolor2';
	} elseif($color_choice == 'Brand Color 1'){
		$color_class = 'bgcolor3';
	} elseif($color_choice == 'Brand Color 2'){
		$color_class = 'bgcolor4';
	} elseif($color_choice == 'Brand Color 3'){
		$color_class = 'bgcolor5';
	}
	return $color_class;
}


/* Convert hexdec color string to rgb(a) string */
function hex2rgba($color, $opacity = false) {
	$default = 'rgb(0,0,0)';
	//Return default if no color provided
	if(empty($color))
		return $default;
	//Sanitize $color if "#" is provided
	if ($color[0] == '#' ) {
		$color = substr( $color, 1 );
	}
	//Check if color has 6 or 3 characters and get values
	if (strlen($color) == 6) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $color ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}
	//Convert hexadec to rgb
	$rgb =  array_map('hexdec', $hex);
	//Check if opacity is set(rgba or rgb)
	if($opacity){
		if(abs($opacity) > 1)
			$opacity = 1.0;
		$output = 'rgba('.implode(",",$rgb).','.$opacity.')';
	} else {
		$output = 'rgb('.implode(",",$rgb).')';
	}
	//Return rgb(a) color string
	return $output;
}


function my_mce4_options($init) {
	$color1 = get_field('flws_primary_brand_color','option');
	$color1 = substr( $color1, 1 );
	$color2 = get_field('flws_secondary_brand_color','option');
	$color2 = substr( $color2, 1 );
	$color3 = get_field('flws_third_brand_color','option');
	$color3 = substr( $color3, 1 );

	$custom_colours = '
        "'.$color1.'", "Brand Color 1",
        "'.$color2.'", "Brand Color 2",
        "'.$color3.'", "Brand Color 3",
        "fff", "Brand Color 4"
    ';
	// build colour grid default+custom colors
	$init['textcolor_map'] = '['.$custom_colours.']';
	// change the number of rows in the grid if the number of colors changes
	// 8 swatches per row
	$init['textcolor_rows'] = 1;
	return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');