<div class="container">
	<?php if( have_rows('biographies') ): $count = 0;?>
		<?php while( have_rows('biographies') ): the_row(); $count++;
			// get bio data
			$image = get_sub_field('headshot');
			$name = get_sub_field('name');
			$title = get_sub_field('title');
			$bio = get_sub_field('biography');
			//get all the social media links
			$twitter = get_sub_field('twitter_url');
			$facebook = get_sub_field('facebook_url');
			$youtube = get_sub_field('youtube_url');
			$linkedin = get_sub_field('linkin_url');
			$instagram = get_sub_field('instagram_url');
			$blog = get_sub_field('blog_url');
			?>
			<div class="row personnel-bio-row">
				<div class="col-sm-3">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="boxshadow">
					<?php if($twitter||$facebook||$youtube||$linkedin||$instagram||$blog){?>
						<div class="social-media">
							<ul>
								<?php
								if($twitter){
									echo '';
								}
								if($facebook){
									echo '<li><a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
								}
								if($linkedin){
									echo '<li><a href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>';
								}
								if($instagram){
									echo '<li><a href="'.$instagram.'" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>';
								}
								if($youtube){
									echo '<li><a href="'.$youtube.'" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>';
								}
								if($blog){
									echo '<li><a href="'.$instagram.'" target="_blank"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a></li>';
								}
								?>
							</ul>
						</div>
					<?php }?>
				</div>
				<div class="col-sm-8 offset-1">
					<h2><?php echo $name;?></h2>
					<p class="title"><?php echo $title;?></p>
					<?php echo $bio;?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>