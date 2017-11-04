<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Together
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( is_front_page() ) : ?>
<header class="dt-site-header" role="banner">
	<div class="">
		<div class="row">
			<div class="col-lg-12">
				<div class="dt-logo">

					<?php
					if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) :
						the_custom_logo();
					else : ?>
						<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() && $description != '' ) : ?>
						<span><i class="fa fa-heart"></i> </span>
						<p class="site-description"><?php echo $description; ?></p>
						<div class="dt-wedding-date"><?php $dt_countdown_date = esc_attr( get_theme_mod( 'dt_countdown_setting' ) ); echo date( 'l, F d, Y', strtotime( $dt_countdown_date )); ?></div>
					<?php endif; ?>

				</div><!-- .dt-logo -->
			</div><!-- .col-lg-12 -->
		</div><!-- .row -->
	</div><!-- .container -->

	<div class="dt-wedding-countdown" id="dt_wedding_day"></div><!-- .dt-wedding-countdown -->
</header><!-- .dt-site-header -->
<?php endif; ?>

<nav class="dt-main-menu<?php //if ( is_front_page() ) : ?> dt-menu-fixed<?php if ( ! is_front_page() ) : ?> dt-sticky<?php endif; ?>">
	<div class="">
		<div class="row">
			<div class="col-lg-3 col-md-3">
				<div class="dt-nav-logo">
					<?php
					if ( function_exists( 'get_custom_logo' ) && has_custom_logo() ) :
						the_custom_logo();
					else : ?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
				<?php endif; ?>
				</div><!-- .dt-nav-logo -->
				<div class='dt-menu-btn'><span></span><span></span><span></span></div>
			</div><!-- .col-lg-3 -->
			<div class="col-lg-9 col-md-9">
				<!--div class="dt-menu-btn">
					<span></span>
					<span></span>
					<span></span>
				</div-->
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu') ); ?>
			</div><!-- .col-lg-12 -->
		</div><!-- .row -->
	</div><!-- .container -->
</nav><!-- .dt-main-menu -->

<?php if ( ! is_front_page() ) : ?><div class="dt-menu-sep"></div><?php endif; ?>

<?php if( ! is_front_page() ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="dt-breadcrumbs">
					<?php together_breadcrumb(); ?>
				</div><!-- .dt-breadcrumbs-->
			</div><!-- .col-lg-12 -->
		</div><!-- .row-->
	</div><!-- .container-->
<?php endif; ?>
