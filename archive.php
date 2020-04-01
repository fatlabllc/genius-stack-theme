<?php
/**
 * The template for displaying archive pages.
 *
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
                            <header class="page-header">
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
                            </header><!-- .page-header -->
							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'loop-templates/content', get_post_format() );?>
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