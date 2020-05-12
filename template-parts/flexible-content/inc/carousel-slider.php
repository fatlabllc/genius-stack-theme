<?php
// if this is the default header let's use the page name for the alt text instead of the actual image alt (avoid duplicate alts)
if($default_header){
    $alt_text = get_the_title();
} else {
	$alt_text = $image['alt'];
}
?>
<div class="carousel-item <?php if($count == 1) {echo 'active';}?>">
	<img src="<?php echo $image['url']; ?>" alt="<?php echo $alt_text; ?>" class="img-fluid" data-no-lazy="1">
	<div class="carousel-caption d-md-block align-middle">
		<?php if($show_text){
		    // check if there is a CTA
            $cta = get_sub_field('show_cta_button');
		    if($cta) {
			    $button        = get_sub_field( 'hero_cta_button_link' );
			    $button_url    = $button['url'];
			    $button_title  = $button['title'];
			    $button_target = $button['target'] ? $link['target'] : '_self';
		    }
		    ?>
            <div class="row">
                <?php if($text_position == 'center'){?>
                    <div class="col-md-12">
	                    <?php echo $text;
	                    if($cta)
	                        { include( locate_template( 'template-parts/flexible-content/inc/cta-button.php', false, false ) );
	                    }?>
                    </div>
                <?php } elseif ($text_position == 'left') {?>
                    <div class="col-md-6">
	                    <?php echo $text;
	                    if($cta)
	                    { include( locate_template( 'template-parts/flexible-content/inc/cta-button.php', false, false ) );
	                    }?>
                    </div>
                    <div class="col-md-6">
                    </div>
                <?php } elseif ($text_position == 'right') {?>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
	                    <?php echo $text;
	                    if($cta)
	                    { include( locate_template( 'template-parts/flexible-content/inc/cta-button.php', false, false ) );
	                    }?>
                    </div>
                <?php }?>
            </div>
		<?php }?>
	</div>
	<div id="mobile-hero-text">
		<div class="container">
			<?php echo $text;?>
		</div>
	</div>
</div>