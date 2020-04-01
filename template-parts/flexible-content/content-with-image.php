<?php
$title = get_sub_field('title');
$text= get_sub_field('text');
$image = get_sub_field('image');
$image_width = get_sub_field('image_width');
$image_side = get_sub_field('image_side');
$image_shadow = get_sub_field('image_shadow');
$image_corners = get_sub_field('rounded_corners');
if($image_width == 50) {
	$textbox = 6;
	$imagebox = 6;
} elseif ($image_width = 33) {
	$textbox = 7;
	$imagebox = 5;
}
?>

<div class="container">
	<div class="row">
		<div class="container">
			<?php if($title) {?>
				<h2><?php echo $title;?></h2>
			<?php }?>
		</div>
	</div>
    <div class="row">
        <?php if($image_side == 'Left'){
            include( locate_template( 'template-parts/flexible-content/inc/image-column.php', false, false ) );
        }?>
        <div class="col-md-<?php echo $textbox;?> text-container">
            <div class="content">
                <div class="content-cell">
                    <?php echo $text;?>
                </div>
            </div>
        </div>
        <?php if($image_side == 'Right'){
            include( locate_template( 'template-parts/flexible-content/inc/image-column.php', false, false ) );
        }?>
    </div>
</div>
