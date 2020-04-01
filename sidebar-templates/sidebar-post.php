<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 */
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
}
// when both sidebars turned on reduce col size to 3 from 4.
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
?>
<?php if ( 'both' === $sidebar_pos ) : ?>
<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">
	<?php else : ?>
	<div class="col-md-4 widget-area" id="right-sidebar" role="complementary">
		<?php endif; ?>
        <aside id="latest-posts-widget" class="widget widget_archive blog-archive">
            <h4 class="widget-title">The Latest <a href="/feed/" target="_blank" class="rss-link"><i class="fa fa-rss" aria-hidden="true"></i>
                </a></h4>
            <ul class="fa-ul">
				<?php
				$blogs = get_blogs(4);
				if ($blogs->have_posts()) :
					while ( $blogs->have_posts() ) : $blogs->the_post(); $count++;
						?>
                        <li><span class="fa-li"><i class="fa fa-chevron-right"></i></span><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
					<?php endwhile; endif; wp_reset_postdata();?>
            </ul>
        </aside>
        <aside class="social-media-icons-side">
	        <?php echo social_media();?>
        </aside>
		<?php //dynamic_sidebar( 'right-sidebar' ); ?>
	</div><!-- #right-sidebar -->