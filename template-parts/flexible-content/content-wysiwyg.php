<?php
//get the repeater
$blocks = get_sub_field('content_blocks');
// count the repeater
$count = count(get_sub_field('content_blocks'));
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
?>
<div class="container ">
    <?php if(get_sub_field('top_content')){?>
        <div class="row">
            <div class="col-md-12">
               <?php the_sub_field('top_content');?>
            </div>
        </div>
    <?php }?>
    <div class="row">
        <?php if( have_rows('content_blocks') ): $count = 0;?>
            <?php while( have_rows('content_blocks') ): the_row(); $count++;
                $box_content= get_sub_field('box_content');
                ?>
                <div class="<?php echo $column;?>">
                    <div class="wysiwyg-content">
                        <?php echo $box_content;?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>