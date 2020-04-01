<?php
// if this is the default header let's use the page name for the alt text instead of the actual image alt (avoid duplicate alts)
if($default_header){
    $alt_text = get_the_title();
} else {
	$alt_text = $image['alt'];
}
?>
<div class="carousel-item <?php if($count == 1) {echo 'active';}?>">
	<img src="<?php echo $image['url']; ?>" alt="<?php echo $alt_text; ?>" class="img-fluid">
	<div class="carousel-caption d-md-block align-middle">
		<?php if($text){?>
			<p class="">
			<?php echo $text;?>
			<?php
			if(get_sub_field('show_cta_button')){
				//$cta_text = get_sub_field('hero_cta_button_text');
				$button = get_sub_field('hero_cta_button_link');
				$button_url = $button['url'];
				$button_title = $button['title'];
				$button_target = $button['target'] ? $link['target'] : '_self';
				?>
				<div class="cta">
					<a class="red-button button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
				</div>
			<?php }?>
			</p>
		<?php }?>
	</div>
	<div id="mobile-hero-text">
		<div class="container">
			<p><?php echo $text;?></p>
		</div>
	</div>
</div>