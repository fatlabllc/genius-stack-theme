<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="wrapper rightsidebar blog-or-archive" id="page-wrapper">
    <!-- Page Header -->
	<?php
	$is_header = TRUE;
	include( locate_template( 'template-parts/flexible-content/content-slider.php', false, false ) );
	$is_header = FALSE;
	?>
    <!-- // Page Header -->
    <div class="<?php echo esc_attr( $container ); ?>" id="content">
        <div id="blog-or-archive" class="row">
            <div class="col-md-8 content-area" id="primary">
                <main class="site-main entries" id="main">
					<?php if ( have_posts() ) : ?>
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'loop-templates/content', get_post_format() ); ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
					<?php endif; ?>
                </main><!-- #main -->
                <!-- The pagination component -->
				<?php understrap_pagination(); ?>
            </div><!-- #primary -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'post' ); ?>
        </div><!-- .row -->
    </div><!-- #content -->
</div><!-- #page-wrapper -->
<?php get_footer(); ?>