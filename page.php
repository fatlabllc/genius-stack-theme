<?php
/**
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>
<div class="wrapper" id="full-width-page-wrapper">
    <!-- Page Header -->
	<?php
    $is_header = TRUE;
    include( locate_template( 'template-parts/flexible-content/content-slider.php', false, false ) );
	$is_header = FALSE;
    ?>
    <!-- // Page Header -->
    <main class="site-main" id="main" role="main">
	   <?php  include( locate_template( 'inc/breadcrumbs.php', false, false ) ); ?>
	    <!-- breadcrumbs -->
	    <?php get_template_part('template-parts/module','breadcrumbs');?>
	    <!-- // breadcrumbs -->
		<!-- Flexible Content -->
		<?php include( locate_template( 'template-parts/module-flexible-content.php', false, false ) );?>
		<!-- //flexible Content -->
    </main>
</div><!-- #full-width-page-wrapper -->
<?php get_footer(); ?>
