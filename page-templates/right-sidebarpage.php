<?php
/**
 * Template Name: Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
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
	<!-- breadcrumbs -->
	<?php get_template_part('template-parts/module','breadcrumbs');?>
	<!-- // breadcrumbs -->
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row">
			<div class="col-md-8 content-area" id="primary">
				<main class="site-main" id="main" role="main">
                    <!-- Flexible Content -->
					<?php get_template_part('template-parts/module','flexible-content');?>
                    <!-- //flexible Content -->
				</main><!-- #main -->
			</div><!-- #primary -->
			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #page-wrapper -->
<?php get_footer(); ?>
