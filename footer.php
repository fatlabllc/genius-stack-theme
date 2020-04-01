<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>
<div class="wrapper" id="wrapper-footer">
	<div class="<?php echo esc_attr( $container ); ?>">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-logo">
					<a href="/"><img src="<?php the_field('flws_logo','option');?>" class="header-logo" alt="<?php echo get_bloginfo('name');?>"></a>
				</div>
				<?php the_field('flws_footer_informational_text','option');?>
			</div>
			<div class="col-md-2 footer-menu-col">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-menu-1',
					'container_class' => 'footer-menu' ) );
				?>
			</div>
			<div class="col-md-2 footer-menu-col">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'footer-menu-2',
					'container_class' => 'footer-menu' ) );
				?>
			</div>
			<div class="col-md-4 address-col">
                <?php if(get_field('flws_footer_address','option')) {?>
				    <?php the_field('flws_footer_address','option');?>
                <?php }?>
				<div class="contact-links">
                    <ul>
	                    <?php if(get_field('flws_footer_phone','option')) {
	                        // clean up phone number
                            $phone_clean = preg_replace("/[^A-Za-z0-9]/", '', get_field('flws_footer_phone','option'));
	                        ?>
                            <li><i class="fa fa-mobile" aria-hidden="true"></i> <a href="tel:<?php echo $phone_clean;?>"><?php the_field('flws_footer_phone','option');?></a></li>
	                    <?php }?>
	                    <?php if(get_field('flws_footer_fax','option')) {?>
                            <li><i class="fa fa-fax" aria-hidden="true"></i> <?php the_field('flws_footer_fax','option');?></li>
	                    <?php }?>
	                    <?php if(get_field('flws_footer_email','option')) {?>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i> <?php the_field('flws_footer_email','option');?></li>
	                    <?php }?>
                    </ul>
				</div>
				<?php echo social_media();?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 footer-logos">
				<?php if( have_rows('flws_footer_logos','option') ): ?>
					<ul class="logos">
						<?php while( have_rows('flws_footer_logos','option') ): the_row();
							// vars
							$image = get_sub_field('flws_footer_logo','option');
							?>
							<li class="logo">
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>">
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
        <div class="row">
            <div class="col-md-12 copyright">
                <p>&#169; <?php echo date("Y");?> <?php the_field('flws_copyright_line','option');?></p>
            </div>
        </div>
	</div><!-- container end -->
</div><!-- wrapper end -->
</div><!-- #page we need this extra closing tag here -->
<?php wp_footer(); ?>
<?php  include( locate_template( 'template-parts/module-cookie-consent.php', false, false ) ); ?>
<!-- theme added footer scripts -->
<?php the_field('flws_footer_scripts','option');?>
</body>
</html>
