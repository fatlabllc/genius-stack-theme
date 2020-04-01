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
<div class="wrapper 404" id="full-width-page-wrapper">
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
        <div class="container">
            <div class="row">
                <div class="container notfound">
                    <h1>Page Not Found</h1>
                    <?php
                    $notfound_text = get_field('flws_404_text','option');
                    if($notfound_text){
                        echo $notfound_text;
                    } else {
                        echo '<p>Sorry this page was not found in our website.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- //flexible Content -->
    </main>
</div><!-- #full-width-page-wrapper -->
<?php get_footer(); ?>
