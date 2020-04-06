<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package YourSpace
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <nav class="footer-navigation">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id'        => 'footer-menu',
			) );
			?>
		</nav>
		<div class="site-info">
            <span class="site-copyright">
                <?php
                /* translators: 1: Year, 2: Site Name */
                printf( esc_html__( 'Copyright &copy; %1$s %2$s.', 'yourspace' ), date('Y'), get_bloginfo('name') );
                ?>
            </span>
            <span class="theme-credits">
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf( esc_html__( '%1$s by %2$s.', 'yourspace' ), 'YourSpace', '<a href="https://overlockdesign.co">Overlock Design Company, LLC</a>' );
                ?>
            </span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<nav id="mobile-navigation" class="mobile-navigation">
    <button class="menu-close"><span class="screen-reader-text"><?php esc_html_e( 'Close Mobile Menu', 'yourspace' ); ?></span><i class="fas fa-times" aria-hidden="true"></i></button>
    <?php
    wp_nav_menu( array(
        'theme_location' => 'mobile-menu',
        'menu_id'        => 'mobile-menu',
    ) );
    ?>
</nav>

<?php wp_footer(); ?>

</body>
</html>
