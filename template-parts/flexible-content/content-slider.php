<div id="hero" class="carousel slide<?php if($is_header ){echo ' header';}?>" data-interval="7000" data-ride="carousel">
    <!-- Wrapper for carousel items -->
    <div class="carousel-inner">
		<?php
        $default_header = get_field('use_default_header');
        //if this is the 404 page, get the theme set universal banner
        if(is_404() || is_single() || is_archive() || is_author() || is_home()){
	        $default_header = TRUE;
        }
        if(($is_header and !$default_header) || !$is_header) {
            if ( have_rows( 'hero_images' ) ): $count = 0;
                while ( have_rows( 'hero_images' ) ): the_row();
                    $count ++;
                    $image = get_sub_field( 'hero_image' );
                    $text  = get_sub_field( 'hero_text_overlay' );
                    include( locate_template( 'template-parts/flexible-content/inc/carousel-slider.php', false, false ) );
                endwhile;
            endif;
        } elseif($is_header AND $default_header){
            // set count to 1 so that default banner is made to be active (like there is only one slide)
	        $count = 1;
            // get the default banner
            $image = get_field('flws_default_pages_banner','option');
            $text = '';
	        include( locate_template( 'template-parts/flexible-content/inc/carousel-slider.php', false, false ) );
        }
		?>
    </div>
	<?php if($count > 1){?>
        <!-- Carousel controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span><span class="sr-only">pevious</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span><span class="sr-only">next</span>
        </a>
	<?php }?>
</div>