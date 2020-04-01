<?php
$testimonials = get_sub_field('testimonials_to_display');
?>
<div class="container">
	<div id="testimonials" class="carousel slide" data-interval="5000" data-ride="carousel">
		<!-- Wrapper for carousel items -->
		<div class="carousel-inner">

			<?php if( $testimonials): ?>
					<?php $count = 0; foreach( $testimonials as $t ):
					$quote = get_field('testimonial_quote', $t);
					$name = get_field('testimonial_name', $t);
					$title = get_field('testimonial_title', $t);
					$count++;
					?>
					<div class="carousel-item <?php if($count == 1) {echo 'active';}?>">
						<div class="quote">
							<h4><?php echo $quote;?></h4>
						</div>
						<div class="name">
							<?php echo $name;?>
						</div>
						<div class="title">
							<?php echo $title;?>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<!-- Carousel controls -->
		<ol class="carousel-indicators">
			<?php if( $testimonials): ?>
				<?php $count = 0; foreach( $testimonials as $t ): $count++;?>
					<li data-target="#testimonials" data-slide-to="<?php echo $count;?>" class="<?php if($count == 1) {echo 'active';}?>"><i class="fa fa-circle" aria-hidden="true"></i>
					</li>
				<?php endforeach; ?>
			<?php endif; ?>
		</ol>
	</div>
</div>
