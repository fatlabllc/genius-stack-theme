<?php
// create unique identifier incase there are more than one accordions on page
$accordion_id = uniqid();
?>
<div class="container">
	<div class="row">
		<div id="accordion_<?php echo $accordion_id;?>" class="col-md-12 accordion-block">
			<?php if (get_sub_field("accordion_title")): ?>
				<h2>
					<?php the_sub_field("accordion_title"); ?>
				</h2>
			<?php endif; ?>
			<?php if (get_sub_field("accordion_description")): ?>
				<?php the_sub_field("accordion_description"); ?>
			<?php endif; ?>

			<?php $counter = 0;  while(have_rows('accordion')): the_row(); $counter++?>
				<div class="card">
					<div class="card-header" id="heading<?php echo $counter;?>">
						<h3>
							<button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $counter;?>"><?php the_sub_field('accordion_item_label'); ?></button>
						</h3>
					</div>
					<div id="collapse<?php echo $counter;?>" class="collapse" aria-labelledby="heading<?php echo $counter;?>" data-parent="#accordion_<?php echo $accordion_id;?>">
						<div class="card-body">
							<?php the_sub_field('accordion_item_content'); ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>