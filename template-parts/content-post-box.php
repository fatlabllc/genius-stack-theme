<div class="<?php echo $column;?> post-box">
	<div class="post-contents">
		<div class="featured-image">
			<?php the_post_thumbnail($thumb);?>
		</div>
		<div class="post_intro">
			<div class="post-meta">
				<?php if(!$hide_date){?>
					<span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i>
                        <?php echo get_the_date( 'F j, Y' );?>
                    </span>
				<?php }?>
				<?php if(!$hide_author){?>
					<span class="post-author"><i class="fa fa-user" aria-hidden="true"></i>
                        <?php if($author_link){the_author_posts_link(); } else {the_author();} ?>
                    </span>
				<?php }?>
			</div>
			<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
			<?php
			echo '<p>';
			$stripped_content = wp_strip_all_tags( get_the_content() );
			$stripped_content = strip_shortcodes($stripped_content);
			echo wp_trim_words( $stripped_content, 20, '...' );
			echo '</p>';
			?>
		</div>
	</div>
</div>