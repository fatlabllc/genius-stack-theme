<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header">
        <div class="featured-image">
			<?php echo get_the_post_thumbnail( $post->ID, 'post-thumb-900' ); ?>
        </div>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="post-meta">
            <span class="post-date"><i class="fa fa-calendar" aria-hidden="true"></i>
                <?php echo get_the_date( 'F j, Y' );?>
            </span>
            <span class="post-author"><i class="fa fa-user" aria-hidden="true"></i>
                <?php the_author_posts_link(); ?>
            </span>
        </div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
        <div class="category-list">
            <i class="fa fa-archive" aria-hidden="true"></i> Categories: </i><?php the_category( ', ' ); ?>
        </div>
        <?php if(get_the_tags()){?>
        <div class="tag-list">
            <i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags( 'Tags: ', ', ', '' );; ?>
        </div>
        <?php }?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->