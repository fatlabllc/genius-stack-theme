<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header">
		<?php
		the_title(
			sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>'
		);
		?>
        <div class="post-meta">
            <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i>
                <?php echo get_the_date( 'F j, Y' );?>
            </span>
            <span class="post-author"><i class="fa fa-user" aria-hidden="true"></i>
                <?php the_author_posts_link(); ?>
            </span>
        </div>
	</header><!-- .entry-header -->
    <div class="featured-image">
	    <?php echo get_the_post_thumbnail( $post->ID, 'post-thumb-900' ); ?>
    </div>
	<div class="entry-content">
		<?php
		echo '<p>';
		$stripped_content = wp_strip_all_tags( get_the_content() );
		$stripped_content = strip_shortcodes( $stripped_content );
		echo wp_trim_words( $stripped_content, 40, '...' );
		echo '</p>';
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->