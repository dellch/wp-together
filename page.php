<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Together
 */

get_header(); ?>


	<div class="container">
		<div class="row">
			<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 col-xs-12">
				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'page' );
							if ( have_rows('event_day') ):
								while ( have_rows('event_day') ): the_row(); ?>
								<div class="day-container">
									<h1><?php  the_sub_field('day_name'); ?> <?php the_sub_field('day_date'); ?></h1>								
								<?php if ( have_rows('event') ):
									while ( have_rows('event') ): the_row(); ?>
									<div class="event-container">
									<div class="address">
													<a class="addr" href="<?php the_sub_field('event_address_link'); ?>"><?php the_sub_field( 'event_address' ); ?></a>
													<a class="tel" href="tel:<?php the_sub_field('event_phone_number'); ?>"><?php the_sub_field( 'event_phone_number' ); ?></a>
												<?php if (get_sub_field('event_directions_url') != ""): ?>
													<a class="directions" href="<?php the_sub_field('event_directions_url'); ?>">Directions</a>
												<?php endif; ?>
									</div>
									<h2>
										<?php the_sub_field( 'event_time' ); ?> - <?php the_sub_field( 'event_title' ); ?>
									</h2>
									<h3><a href="<?php the_sub_field( 'event_location_url' );  ?>"><?php the_sub_field( 'event_location_name' );  ?></a></h3>
									<div class="event-photo">
									<?php 

											$image = get_sub_field('event_photo');

											if( !empty($image) ): ?>

												<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	
											<?php echo wp_get_attachment_image( $image, 'medium');  endif; ?>
									</div>
									
									
									<div class="event-description"><?php the_sub_field( 'event_description' ); ?></div>
									<div class="clearfix"></div>
									</div>
								<?php endwhile; endif; ?> </div> <?php
								endwhile; 
							endif; 
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>

			<div class="col-lg-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
<style type="text/css">
.acf-map {
	width: 25%;
	height: 200px;
	border: #ccc solid 1px;
	margin: 20px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClvQp5q-V7v6IWaGk6w7OxLT8toGSJlcc"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
</script>
<?php
get_footer();
