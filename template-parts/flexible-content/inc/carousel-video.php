<?php
	$video = get_sub_field('hero_video');
?>
<div class="carousel-item <?php if($count == 1) {echo 'active';} echo ' overlay-'.$overlay;?> ">
    <video autoplay="autoplay" muted title="" loop="loop" onended="var v=this;setTimeout(function(){v.play()},300)" poster="" id="myvid">
        <source src="<?php echo $video;?>" type="video/mp4">
    </video>
    <div class="carousel-caption d-md-block align-middle">
		<?php if($show_text){echo $text;}?>
    </div>
    <div id="mobile-hero-text">
        <div class="container slide-text">
			<?php echo $text;?>
        </div>
    </div>
</div>
