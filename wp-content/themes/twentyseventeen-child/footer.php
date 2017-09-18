<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="wrap">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );

				if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentyseventeen' ); ?>">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'social',
								'menu_class'     => 'social-links-menu',
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>' . twentyseventeen_get_svg( array( 'icon' => 'chain' ) ),
							) );
						?>
					</nav><!-- .social-navigation -->
				<?php endif;

				get_template_part( 'template-parts/footer/site', 'info' );
				?>
				<!--Contacts footer-->
				<div class="contacts">
                	<span class="call-us">Call Us: 0987654321</span>
                	<span class="email">Email: <a href="mailto:testdomain@mail.ru">testdomain@mail.ru</a></span>
                	<a href="#popup2" id="contact" class="contact-us button">Contact Us</a>
                </div>
                <div class="contacts-mobile">
                	<span class="call-us"><a href="tel:0987654321">Call Us</a></span>
                	<span class="email"><a href="mailto:testdomain@mail.ru">Email Us</a></span>
                	<a href="#popup2" class="contact-us button">Contact Us</a>
                </div>
                <!-- Modal window -->
                <div id="popup2" class="overlay">
                	<div class="popup">
                		<h2>Here i am</h2>
                		<a class="close" href="#">&times;</a>
                		<div class="content">
                			Thank to pop me out of that button, but now i'm done so you can close this window.
                		</div>
                	</div>
                </div>
			</div><!-- .wrap -->
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
