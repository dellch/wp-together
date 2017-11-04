<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Together
 */

?>

<footer class="dt-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="dt-foot-logo">
					<?php
					if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) :
						the_custom_logo();
					else : ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
					<?php endif; ?>
				</div><!-- .dt-foot-logo -->

				<div class="dt-footer-widgets">
					<?php dynamic_sidebar( 'dt-footer-widget' ); ?>
				</div>

				<div class="dt-copyright">
					<?php _e( 'Copyright &copy;', 'together' ); ?> <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
					<!--span class="sep"> | </span-->

					<!--?php printf( esc_html__( 'Powered %1$s by %2$s', 'together' ), '', '<a href="https://wordpress.org/" target="_blank">WordPress</a>' ); ?>
					<span class="sep"> &amp; </span>
					<?php _e( 'Designed by', 'together' ); ?> <a href="<?php echo esc_url( 'http://daisythemes.com/'); ?>" target="_blank" rel="designer"><?php _e( 'Daisy Themes', 'together' )?></a-->
				</div>
			</div>
		</div>
	</div>
</footer>

<a id="back-to-top" class="transition35"><i class="fa fa-angle-up"></i></a><!-- #back-to-top -->

<?php wp_footer(); ?>

</body>
</html>
