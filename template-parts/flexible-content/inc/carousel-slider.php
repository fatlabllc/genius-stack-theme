<?php
// if this is the default header let's use the page name for the alt text instead of the actual image alt (avoid duplicate alts)
if($default_header){
    $alt_text = get_the_title();
} else {
	$alt_text = $image['alt'];
}
?>
<div class="carousel-item <?php if($count == 1) {echo 'active';} echo ' overlay-'.$overlay;?> ">
	<img src="<?php echo $image['url']; ?>" alt="<?php echo $alt_text; ?>" class="img-fluid" data-no-lazy="1">
	<div class="carousel-caption d-md-block align-middle">
		<div class="slide-text">
		<?php if($show_text){echo $text;}?>
		</div>
	</div>
	<div id="mobile-hero-text">
		<div class="container slide-text">
			<?php echo $text;?>
		</div>
	</div>
</div>