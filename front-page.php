<?php
/**
 * The front-page template file.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Together
 */

get_header();

if( get_theme_mod( 'about_couple' ) != '' ) : ?>
	<div class="dt-about-couple">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">
					<h2><?php _e( 'About the Couple', 'together' )?></h2>
				</div><!-- .col-lg-12 -->

				<div class="col-lg-6">
					<div class="dt-couple-cont">

						<?php

						$args = array(
							'posts_per_page' => 1,
							'p' => get_theme_mod( 'about_groom' ), // id of a page, post, or custom type
							'post_type' => 'page',
						);

						$query = new WP_Query( $args );

						if ( $query->have_posts() ) :

							while ( $query->have_posts() ) : $query->the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
									<figure>
										<?php
										$dt_about_page_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'together-couple-img' );
										$dt_about_page_thumbnail_url = $dt_about_page_thumbnail_src[0];
										?>

										<a href="<?php the_permalink(); ?>"><img class="transition35" src="<?php echo esc_url( $dt_about_page_thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></a>
									</figure>

									<header class="entry-header">
										<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
									</header><!-- .entry-header -->

									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div><!-- .entry-content -->
								</article>

								<?php
							endwhile;

							wp_reset_postdata();

						endif;
						?>
					</div><!-- .dt-couple-wrap -->
				</div><!-- .col-lg-6 -->

				<div class="col-lg-6">
					<div class="dt-couple-cont">

						<?php
						$args = array(
							'posts_per_page' => 1,
							'p' => get_theme_mod( 'about_bride' ), // id of a page, post, or custom type
							'post_type' => 'page'
						);

						$query = new WP_Query( $args );

						if ( $query->have_posts() ) :

							while ( $query->have_posts() ) : $query->the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
									<figure>
										<?php
										$dt_about_page_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'together-couple-img' );
										$dt_about_page_thumbnail_url = $dt_about_page_thumbnail_src[0];
										?>

										<a href="<?php the_permalink(); ?>"><img class="transition35" src="<?php echo esc_url( $dt_about_page_thumbnail_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></a>
									</figure>

									<header class="entry-header">
										<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
									</header><!-- .entry-header -->

									<div class="entry-summary">
										<?php the_excerpt(); ?>
									</div><!-- .entry-content -->
								</article>

								<?php
							endwhile;

							wp_reset_postdata();

						endif;
						?>
					</div><!-- .dt-couple-wrap -->
				</div><!-- .col-lg-6 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .dt-about-couple -->
<?php endif; ?>

	<?php if( get_theme_mod( 'dt_ceremony_activate' ) != '' ) : ?>
	<div class="dt-wedding-ceremony">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="dt-ceremony-wrap">
						<?php if( get_theme_mod( 'dt_wedding_ceremony' ) != '' ) { ?>
							<figure>
								<img src="<?php echo esc_url( get_theme_mod( 'dt_wedding_ceremony' ) ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'dt_wedding_ceremony_title' ) ); ?>"/>
								<span></span>
							</figure>
						<?php } ?>

						<h2><?php if( get_theme_mod( 'dt_wedding_ceremony_title' ) ) : echo esc_attr( get_theme_mod( 'dt_wedding_ceremony_title' ) ); endif; ?></h2>
						<ul>
							<?php if( get_theme_mod( 'dt_wedding_ceremony_location' ) ) : ?><li><i class="fa fa-map-marker"></i><span><?php echo esc_attr( get_theme_mod( 'dt_wedding_ceremony_location' ) ); ?></span></li><?php endif; ?>
							<?php if( get_theme_mod( 'dt_wedding_ceremony_date' ) ) : ?><li><i class="fa fa-calendar"></i> <span><?php echo esc_attr( get_theme_mod( 'dt_wedding_ceremony_date' ) ); ?></span></li><?php endif; ?>
							<?php if( get_theme_mod( 'dt_wedding_ceremony_time' ) ) : ?><li><i class="fa fa-clock-o"></i> <span><?php echo esc_attr( get_theme_mod( 'dt_wedding_ceremony_time' ) ); ?></span></li><?php endif; ?>
							<?php if( get_theme_mod( 'dt_wedding_ceremony_phone' ) ) : ?><li><i class="fa fa-phone"></i><span><?php echo esc_attr( get_theme_mod( 'dt_wedding_ceremony_phone' ) ); ?></span></li><?php endif; ?>
						</ul>
					</div><!-- .dt-ceremony-wrap -->
				</div><!-- .col-lg-6 -->

				<div class="col-lg-6">
					<div class="dt-ceremony-wrap">
						<?php if( get_theme_mod( 'dt_wedding_party' ) != '' ) { ?>
							<figure>
								<img src="<?php echo esc_url( get_theme_mod( 'dt_wedding_party' ) ); ?>" alt="<?php echo esc_attr( get_theme_mod( 'dt_wedding_party_title' ) ); ?>"/>
								<span></span>
							</figure>
						<?php } ?>

						<h2><?php if( get_theme_mod( 'dt_wedding_party_title' ) ) : echo esc_attr( get_theme_mod( 'dt_wedding_party_title' ) ); endif; ?></h2>
						<ul>
							<?php if( get_theme_mod( 'dt_wedding_party_location' ) ) : ?><li><i class="fa fa-map-marker"></i><span><?php echo esc_attr( get_theme_mod( 'dt_wedding_party_location' ) ); ?></span></li><?php endif; ?>
							<?php if( get_theme_mod( 'dt_wedding_party_date' ) ) : ?><li><i class="fa fa-calendar"></i> <span><?php echo esc_attr( get_theme_mod( 'dt_wedding_party_date' ) ); ?></span></li><?php endif; ?>
							<?php if( get_theme_mod( 'dt_wedding_party_time' ) ) : ?><li><i class="fa fa-clock-o"></i> <span><?php echo esc_attr( get_theme_mod( 'dt_wedding_party_time' ) ); ?></span></li><?php endif; ?>
							<?php if( get_theme_mod( 'dt_wedding_party_phone' ) ) : ?><li><i class="fa fa-phone"></i><span><?php echo esc_attr( get_theme_mod( 'dt_wedding_party_phone' ) ); ?></span></li><?php endif; ?>
						</ul>
					</div><!-- .dt-ceremony-wrap -->
				</div><!-- .col-lg-6 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .dt-wedding-ceremony -->
<?php endif; ?>

	<?php if( get_theme_mod( 'dt_rsvp_activate' ) != '' ) : ?>
	<div class="dt-rsvp">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="dt-rsvp-form">
						<?php dynamic_sidebar( 'dt-front-rsvp' ); ?>
					</div><!-- .dt-rsvp-form -->
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .dt-rsvp -->
<?php endif; ?>

	<?php if( get_theme_mod( 'dt_recent_post_activate' ) != '' ) : ?>
	<div class="dt-recent-blog-post">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2><?php echo esc_attr( get_theme_mod( 'dt_recent_post_title' ) ); ?></h2>

					<?php
					$cat = get_theme_mod( 'dt_recent_post_cat' );
					$query  = new WP_Query( array(
						'cat'				=> $cat,
						'post_type'         => 'post',
						'posts_per_page'    => '3'
					) );
					?>

					<div class="dt-recent-blog-posts-wrap">
						<?php
						if ( $query->have_posts() ) :

							if ( !empty( $title ) ) : ?> <h2><?php echo esc_html( $title ); ?><span></span></h2> <?php endif; ?>

							<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<div class="col-lg-4 col-md-4 dt-recent-blog-post-holder">
								<figure>
									<?php
									if ( has_post_thumbnail() ) {
										$dt_post_id = get_the_ID();
										$dt_post_thumbnail_id = get_post_thumbnail_id( $dt_post_id );
										$dt_thumbnail = wp_get_attachment_image( $dt_post_thumbnail_id, 'together-blog-img', true );
										?>
										<a href="<?php the_permalink(); ?>"><?php echo $dt_thumbnail; ?></a>
										<?php
									}
									?>

									<span class="transition5"><i class="fa fa-link transition35"></i> </span>
								</figure>

								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
										$title = get_the_title();
										$limit   = '45';
										$pad     = '...';

										if( strlen( $title ) <= $limit ) {
											echo esc_html( $title );
										} else {
											$title = substr( $title, 0, $limit ) . $pad;
											echo esc_html( $title );
										}
										?></a></h3>

								<span class="dt-posted-on"><?php together_posted_on(); ?></span>

								<p><?php echo together_excerpt(24); ?></p>
							</div>
						<?php endwhile; ?>

							<?php wp_reset_postdata(); ?>

						<?php else : ?>
							<!--p><?php _e( 'Sorry, no posts matched.', 'together' ); ?></p-->
						<?php endif; ?>

					</div><!-- .dt-recent-blog-posts-wrap -->
				</div><!-- .col-lg-12 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .dt-recent-blog-post -->
<?php endif; ?>



<?php

if( get_theme_mod( 'about_couple' ) != '1' && get_theme_mod( 'dt_ceremony_activate' ) != '1' && get_theme_mod( 'dt_rsvp_activate' ) != '1' && get_theme_mod( 'dt_recent_post_activate' ) != '1' ) :
?>

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-8">

	<?php
	if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post();

				if ( 'page' == get_option( 'show_on_front' ) ) { ?>

					<div class="dt-content-area">
						<?php

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

						?>
					</div>

				<?php } else { ?>

					<div <?php post_class( 'dt-archive-post' ); ?>>

						<?php if ( has_post_thumbnail() ) : ?>

							<figure>

								<?php

								$image = '';
								$title_attribute = get_the_title( $post->ID );
								$image .= '<a href="'. esc_url( get_permalink() ) . '" title="' . the_title( '', '', false ) .'">';
								$image .= get_the_post_thumbnail( $post->ID, 'together-archive-img', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
								echo $image;

								?>

							</figure>

						<?php endif; ?>

						<article>
							<header class="entry-header">
								<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
							</header><!-- .entry-header -->

							<div class="dt-archive-post-content">

								<?php the_excerpt(); ?>

							</div><!-- .dt-archive-post-content -->

							<div class="entry-footer">
								<a class="transition35" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Read more', 'together' ); ?></a>
							</div><!-- .entry-footer -->
						</article>
					</div><!-- .dt-archive-post -->

				<?php } ?>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

		<div class="clearfix"></div>

		<div class="dt-pagination-nav">
			<?php echo the_posts_pagination(); ?>
		</div><!---- .dt-pagination-nav ---->

	<?php else : ?>

		<!--p><?php _e( 'Sorry, no posts matched your criteria.', 'together' ); ?></p-->

	<?php endif; ?>

		</div>

		<div class="col-lg-4 col-md-4">
			<div class="dt-sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php endif; ?>

<?php
get_footer();
