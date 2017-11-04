<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Together
 */

get_header(); ?>

<div class="container">
	<div class="dt-error-page">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'together' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'together' ); ?></p>

								<?php
								get_search_form();

								the_widget( 'WP_Widget_Recent_Posts' );
								?>

							</div><!-- .page-content -->
						</section><!-- .error-404 -->

					</main><!-- #main -->
				</div><!-- #primary -->
			</div><!-- .col-lg-12 -->
		</div><!-- .row -->
	</div><!-- .dt-error-page -->
</div><!-- .container -->

<?php
get_footer();
