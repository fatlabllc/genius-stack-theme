<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
    <div class="wrapper rightsidebar" id="page-wrapper">
        <!-- Page Header -->
		<?php
		$is_header = TRUE;
		include( locate_template( 'template-parts/flexible-content/content-slider.php', false, false ) );
		$is_header = FALSE;
		?>
        <!-- // Page Header -->
        <div class="<?php echo esc_attr( $container ); ?>" id="content">
            <div id="single-content" class="row">
                <div class="col-md-8 content-area" id="primary">
                    <main class="site-main" id="main" role="main">
	                    <?php while ( have_posts() ) : the_post(); ?>
		                    <?php get_template_part( 'loop-templates/content', 'single' ); ?>
		                    <?php understrap_post_nav(); ?>
		                    <?php
                            // comments are commented out for the itme being - really hope no one actually wants comments!
		                    // If comments are open or we have at least one comment, load up the comment template.
		                    //if ( comments_open() || get_comments_number() ) :
			                    //comments_template();
		                    //endif;
		                    ?>
	                    <?php endwhile; // end of the loop. ?>
                    </main><!-- #main -->
                </div><!-- #primary -->
				<?php get_template_part( 'sidebar-templates/sidebar', 'post' ); ?>
            </div><!-- .row -->
        </div><!-- #content -->
    </div><!-- #page-wrapper -->
<?php get_footer(); ?>