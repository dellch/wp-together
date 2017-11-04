<?php
/**
 * Together Theme Customizer.
 *
 * @package Together
 */

function together_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Date Picker
	class together_DateControl extends WP_Customize_Control {
		function render_content() {
			?>
			<label>
				<span><?php echo esc_html($this->label); ?></span>
				<input type="date" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>">
			</label>
			<?php
		}
	}

	// Dropdown Category
	if ( class_exists( 'WP_Customize_Control' ) ) {
		class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
			public $type = 'dropdown-categories';

			public function render_content() {
				$dropdown = wp_dropdown_categories(
						array(
								'name'             => '_customize-dropdown-categories-' . $this->id,
								'echo'             => 0,
								'hide_empty'       => false,
								'show_option_none' => '&mdash; ' . __('Select', 'together') . ' &mdash;',
								'hide_if_empty'    => false,
								'selected'         => $this->value(),
						)
				);

				$dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

				printf(
						'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
						$this->label,
						$dropdown
				);
			}
		}
	}

	// Header Logo
	$wp_customize->add_setting( 'dt_logo', array(
		'default' 			=> '',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(	new WP_Customize_Image_Control(	$wp_customize, 'dt_logo', array(
		'label'			=> __( 'Upload Header Logo', 'together' ),
		'section' 		=> 'title_tagline',
		'setting' 		=> 'dt_logo'
	 )));

	// Primary Color
	$wp_customize->add_setting( 'dt_primary_color', array(
		'default' 			     => '#e55a65',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'together_color_sanitize',
		'sanitize_js_callback'   => 'together_color_escaping_sanitize'
	));

	$wp_customize->add_control( new WP_Customize_Color_Control(	$wp_customize, 'dt_primary_color', array(
		'priority' 				 => 1,
		'label' 		=> __( 'Primary Color', 'together' ),
		'section' 		=> 'colors',
		'settings' 		=> 'dt_primary_color'
	)));

	// Font Color
	$wp_customize->add_setting( 'dt_font_color', array(
		'default' 			     => '#525961',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'together_color_sanitize',
		'sanitize_js_callback'   => 'together_color_escaping_sanitize'
	));

	$wp_customize->add_control(	new WP_Customize_Color_Control( $wp_customize, 'dt_font_color',	array(
		'priority' 		=> 10,
		'label' 		=> __( 'Font Color', 'together' ),
		'section' 		=> 'colors',
		'settings' 		=> 'dt_font_color'
	)));

	// Paragraph Color
	$wp_customize->add_setting( 'dt_paragraph_color', array(
		'default' 			     => '#676e74',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'together_color_sanitize',
		'sanitize_js_callback'   => 'together_color_escaping_sanitize'
	));

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'dt_paragraph_color', array(
		'priority' 		=> 11,
		'label' 		=> __( 'Paragraph Color', 'together' ),
		'section' 		=> 'colors',
		'settings' 		=> 'dt_paragraph_color'
	)));

	// Entry Meta Color
	$wp_customize->add_setting( 'dt_meta_color', array(
		'default' 			     => '#93979c',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'together_color_sanitize',
		'sanitize_js_callback'   => 'together_color_escaping_sanitize'
	));

	$wp_customize->add_control(	new WP_Customize_Color_Control(	$wp_customize, 'dt_meta_color',	array(
		'priority' 		=> 12,
		'label' 		=> __( 'Meta Color', 'together' ),
		'section' 		=> 'colors',
		'settings' 		=> 'dt_meta_color'
	)));

	// Header BG Color
	$wp_customize->add_setting( 'dt_header_bg', array(
		'default' 			     => '#e55a65',
		'capability' 			 => 'edit_theme_options',
		'sanitize_callback'		 => 'together_color_sanitize',
		'sanitize_js_callback'   => 'together_color_escaping_sanitize'
	));

	$wp_customize->add_control( new WP_Customize_Color_Control(	$wp_customize, 'dt_header_bg', array(
		'priority' 		=> 2,
		'label' 		=> __( 'Header Background Color', 'together' ),
		'section' 		=> 'header_image',
		'settings' 		=> 'dt_header_bg'
	)));

	// Wedding Count Down
	$wp_customize->add_section('dt_countdown', array(
			'title' => __( 'Wedding Count Down', 'together' ),
			'priority' => 62
	));

	// Date Picker
	$wp_customize->add_setting( 'dt_countdown_setting', array(
			'sanitize_callback' => 'together_sanitize_text',
			'capability' 		=> 'edit_theme_options'
	));

	$wp_customize->add_control( new together_DateControl( $wp_customize, 'dt_countdown_setting', array(
			'label' => __( 'Wedding Count Down Date Picker', 'together'),
			'section' => 'dt_countdown',
			'settings' => 'dt_countdown_setting',
			'type' => 'text'
	)));

	// Home Page Builder
	$wp_customize->add_panel( 'home_page_builder', array(
		'title' 		=> __( 'Home Page Builder', 'together' ),
		'description' 	=> 'Setup Homepage',
		'priority'		=> 70,
	) );

	// About Couple
	$wp_customize->add_section( 'about_couple_sec', array(
		'title' 		=> __( 'About Couple Section', 'together' ),
		'priority' 		=> 1,
		'panel' 		=> __( 'home_page_builder', 'together' )
	));

	$wp_customize->add_setting( 'about_couple', array(
		'default' 			=> '',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'together_checkbox_sanitize'
	));

	$wp_customize->add_control( 'about_couple', array(
		'type' 				=> 'checkbox',
		'label' 			=> __( 'Check to enable About Couple', 'together' ),
		'settings' 			=> 'about_couple',
		'section' 			=> 'about_couple_sec'
	));

	// Choose Couple Page
	$wp_customize->add_setting( 'about_groom', array(
		'default'           => '',
		'sanitize_callback' => 'together_sanitize_dropdown_pages',
		'capability'     	=> 'edit_theme_options',
	) );

	$wp_customize->add_control( 'about_groom', array(
		'label'    => __( 'Select Page for Groom', 'together' ),
		'section'  => 'about_couple_sec',
		'settings'   		=> 'about_groom',
		'type'     => 'dropdown-pages'
	) );

	$wp_customize->add_setting( 'about_bride', array(
		'default'           => '',
		'sanitize_callback' => 'together_sanitize_dropdown_pages',
		'capability'     	=> 'edit_theme_options',
	) );

	$wp_customize->add_control( 'about_bride', array(
		'label'    => __( 'Select Page for Bride', 'together' ),
		'section'  => 'about_couple_sec',
		'settings'   		=> 'about_bride',
		'type'     => 'dropdown-pages'
	) );

	// Ceremony
	$wp_customize->add_section( 'dt_ceremony', array(
			'title' 		=> __( 'Wedding Ceremony Details', 'together' ),
			'priority' 		=> 1,
			'panel' 		=> 'home_page_builder'
	));

	// Activate Wedding Ceremony
	$wp_customize->add_setting( 'dt_ceremony_activate', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_checkbox_sanitize'
	));

	$wp_customize->add_control( 'dt_ceremony_activate', array(
			'priority' 			=> 1,
			'type' 				=> 'checkbox',
			'label' 			=> __( 'Check to enable Wedding Ceremony Details', 'together' ),
			'settings' 			=> 'dt_ceremony_activate',
			'section' 			=> 'dt_ceremony'
	));

	// Title
	$wp_customize->add_setting( 'dt_wedding_ceremony_title', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_text'
	));

	$wp_customize->add_control( 'dt_wedding_ceremony_title', array(
			'type' 				=> 'text',
			'priority' 			=> 2,
			'label' 			=> __( 'Title for Wedding Ceremony', 'together' ),
			'settings' 			=> 'dt_wedding_ceremony_title',
			'section' 			=> 'dt_ceremony'
	));

	// Image
	$wp_customize->add_setting( 'dt_wedding_ceremony', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dt_wedding_ceremony_img', array(
			'priority' 			=> 3,
			'label'    		=> __( 'Image for Wedding Ceremony', 'together' ),
			'settings' 		=> 'dt_wedding_ceremony',
			'section' 		=> 'dt_ceremony'
	)));

	// Location
	$wp_customize->add_setting( 'dt_wedding_ceremony_location', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_text'
	));

	$wp_customize->add_control( 'dt_wedding_ceremony_location', array(
			'priority' 			=> 4,
			'type' 				=> 'text',
			'label' 			=> __( 'Address for Wedding Ceremony', 'together' ),
			'settings' 			=> 'dt_wedding_ceremony_location',
			'section' 			=> 'dt_ceremony'
	));

	// Date
	// Date Picker
	$wp_customize->add_setting( 'dt_wedding_ceremony_date', array(
			'sanitize_callback' => 'together_sanitize_text',
			'capability' 		=> 'edit_theme_options'
	));

	$wp_customize->add_control( new together_DateControl( $wp_customize, 'dt_wedding_ceremony_date', array(
			'priority' 			=> 5,
			'type' 				=> 'text',
			'label' 			=> __( 'Date for Wedding Ceremony', 'together'),
			'section' 			=> 'dt_ceremony',
			'settings' 			=> 'dt_wedding_ceremony_date'
	)));

	// Time
	$wp_customize->add_setting( 'dt_wedding_ceremony_time', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_text'
	));

	$wp_customize->add_control( 'dt_wedding_ceremony_time', array(
			'priority' 			=> 6,
			'type' 				=> 'text',
			'label' 			=> __( 'Time for Wedding Ceremony', 'together' ),
			'settings' 			=> 'dt_wedding_ceremony_time',
			'section' 			=> 'dt_ceremony'
	));

	// Phone
	$wp_customize->add_setting( 'dt_wedding_ceremony_phone', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_integer'
	));

	$wp_customize->add_control( 'dt_wedding_ceremony_phone', array(
			'priority' 			=> 7,
			'type' 				=> 'number',
			'label' 			=> __( 'Phone for Wedding Ceremony', 'together' ),
			'settings' 			=> 'dt_wedding_ceremony_phone',
			'section' 			=> 'dt_ceremony'
	));

	// Wedding Party
	// Title
	$wp_customize->add_setting( 'dt_wedding_party_title', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_text'
	));

	$wp_customize->add_control( 'dt_wedding_party_title', array(
			'type' 				=> 'text',
			'priority' 			=> 8,
			'label' 			=> __( 'Title for Wedding Party', 'together' ),
			'settings' 			=> 'dt_wedding_party_title',
			'section' 			=> 'dt_ceremony'
	));

	// Image
	$wp_customize->add_setting( 'dt_wedding_party', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'dt_wedding_party_img', array(
			'priority' 			=> 9,
			'label'    		=> __( 'Image for Wedding Party', 'together' ),
			'settings' 		=> 'dt_wedding_party',
			'section' 		=> 'dt_ceremony'
	)));

	// Location
	$wp_customize->add_setting( 'dt_wedding_party_location', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_text'
	));

	$wp_customize->add_control( 'dt_wedding_party_location', array(
			'priority' 			=> 10,
			'type' 				=> 'text',
			'label' 			=> __( 'Address for Wedding Party', 'together' ),
			'settings' 			=> 'dt_wedding_party_location',
			'section' 			=> 'dt_ceremony'
	));

	// Date
	// Date Picker
	$wp_customize->add_setting( 'dt_wedding_party_date', array(
			'sanitize_callback' => 'together_sanitize_text',
			'capability' 		=> 'edit_theme_options'
	));

	$wp_customize->add_control( new together_DateControl( $wp_customize, 'dt_wedding_party_date', array(
			'priority' 			=> 11,
			'type' 				=> 'text',
			'label' 			=> __( 'Date for Wedding Party', 'together'),
			'section' 			=> 'dt_ceremony',
			'settings' 			=> 'dt_wedding_party_date'
	)));

	// Time
	$wp_customize->add_setting( 'dt_wedding_party_time', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_text'
	));

	$wp_customize->add_control( 'dt_wedding_party_time', array(
			'priority' 			=> 12,
			'type' 				=> 'text',
			'label' 			=> __( 'Time for Wedding Party', 'together' ),
			'settings' 			=> 'dt_wedding_party_time',
			'section' 			=> 'dt_ceremony'
	));

	// Phone
	$wp_customize->add_setting( 'dt_wedding_party_phone', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_integer'
	));

	$wp_customize->add_control( 'dt_wedding_party_phone', array(
			'priority' 			=> 13,
			'type' 				=> 'number',
			'label' 			=> __( 'Phone for Wedding Party', 'together' ),
			'settings' 			=> 'dt_wedding_party_phone',
			'section' 			=> 'dt_ceremony'
	));

	// RSVP
	$wp_customize->add_section( 'dt_rsvp', array(
			'title' 		=> __( 'RSVP', 'together' ),
			'priority' 		=> 1,
			'panel' 		=> 'home_page_builder',
	));

	// Activate RSVP
	$wp_customize->add_setting( 'dt_rsvp_activate', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_checkbox_sanitize'
	));

	$wp_customize->add_control( 'dt_rsvp_activate', array(
			'priority' 			=> 1,
			'type' 				=> 'checkbox',
			'label' 			=> __( 'Check to enable RSVP Widget Location', 'together' ),
			'settings' 			=> 'dt_rsvp_activate',
			'section' 			=> 'dt_rsvp'
	));

	// Recent Posts From a Category
	$wp_customize->add_section( 'dt_recent_posts',	array(
			'title' 			=> __( 'Recent Blog Posts', 'together' ),
			'panel' 		=> __( 'home_page_builder', 'together' )
	));

	// Activate
	$wp_customize->add_setting( 'dt_recent_post_activate', array(
		'default' 			=> '',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'together_checkbox_sanitize'
	));

	$wp_customize->add_control( 'dt_recent_post_activate', array(
		'type' 				=> 'checkbox',
		'label' 			=> __( 'Show Recent Blog Post', 'together' ),
		'settings' 			=> 'dt_recent_post_activate',
		'section' 			=> 'dt_recent_posts'
	));

	// Title
	$wp_customize->add_setting( 'dt_recent_post_title', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_text'
	));

	$wp_customize->add_control( 'dt_recent_post_title', array(
			'type' 				=> 'text',
			'label' 			=> __( 'Title for Recent Posts', 'together' ),
			'settings' 			=> 'dt_recent_post_title',
			'section' 			=> 'dt_recent_posts'
	));

	// Choose Category
	$wp_customize->add_setting( 'dt_recent_post_cat', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'absint'
	) );

	$wp_customize->add_control( new WP_Customize_Dropdown_Categories_Control( $wp_customize, 'dt_recent_post_cat', array(
			'label'    		 => __( 'Choose Category', 'together' ),
			'type'    		 => 'dropdown-categories',
			'settings' 		 => 'dt_recent_post_cat',
			'section' 		 => 'dt_recent_posts'
	) ) );

	// Default Font Size
	$wp_customize->add_section( 'dt_font_size_section',	array(
		'priority' 			=> 51,
		'title' 			=> __( 'Default Font Size', 'together' )
	));

	$wp_customize->add_setting(	'dt_font_size',	array(
		'default' 			=> '15',
		'capability' 		=> 'edit_theme_options',
		'sanitize_callback' => 'together_sanitize_integer'
	));

	$wp_customize->add_control(	'dt_font_size',	array(
		'type'			 	=> 'number',
		'label' 			=> __( 'Set Default Font Size', 'together' ),
		'section'			=> 'dt_font_size_section',
		'settings' 			=> 'dt_font_size'
	));

	// Social Icons
	$wp_customize->add_section( 'dt_recent_posts',	array(
			'title' 			=> __( 'Recent Blog Posts', 'together' ),
			'panel'				=> __( 'home_page_builder', 'together' )
	));

	// Activate
	$wp_customize->add_setting( 'dt_recent_post_activate', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_checkbox_sanitize'
	));

	$wp_customize->add_control( 'dt_recent_post_activate', array(
			'type' 				=> 'checkbox',
			'label' 			=> __( 'Show Recent Blog Post', 'together' ),
			'settings' 			=> 'dt_recent_post_activate',
			'section' 			=> 'dt_recent_posts'
	));

	// Title
	$wp_customize->add_setting( 'dt_recent_post_title', array(
			'default' 			=> '',
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'together_sanitize_text'
	));

	$wp_customize->add_control( 'dt_recent_post_title', array(
			'type' 				=> 'text',
			'label' 			=> __( 'Title for Recent Posts', 'together' ),
			'settings' 			=> 'dt_recent_post_title',
			'section' 			=> 'dt_recent_posts'
	));

	//Text box sanitize
	function together_sanitize_text( $input ) {
		return wp_kses_post( $input );
	}

	// Checkbox Sanitize
	function together_checkbox_sanitize( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

	// Color Sanitize
	function together_color_sanitize( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ))
			return '#' . $unhashed;
		return $color;
	}

	// Color Escape Sanitize
	function together_color_escaping_sanitize( $input ) {
		$input = esc_attr( $input );
		return $input;
	}

	// Number Integer
	function together_sanitize_integer( $input ) {
		return absint( $input );
	}

	function together_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );

		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
}
add_action( 'customize_register', 'together_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function together_customize_preview_js() {
	wp_enqueue_script( 'together_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'together_customize_preview_js' );

/**
 * Enqueue Inline styles generated by customizer
 */
function together_customizer_styles() {

	$color 				= esc_attr( get_theme_mod( 'dt_font_color' ) );
	$font_size 			= esc_attr( get_theme_mod( 'dt_font_size' ) );
	$primary			= esc_attr( get_theme_mod( 'dt_primary_color' ) );
	$header_image 		= get_header_image();
	$together_header_bg		= esc_attr( get_theme_mod( 'dt_header_bg' ) );
	$together_paragraph_color = esc_attr( get_theme_mod( 'dt_paragraph_color' ) );
	$together_meta_color      = esc_attr( get_theme_mod( 'dt_meta_color' ) );
	$header_text_color 	= esc_attr( get_theme_mod( 'header_textcolor') );

	$description = get_bloginfo( 'description', 'display' );
	if ( ! empty ( $description ) ) {
		$header = '     .dt-logo h1 a {
            color: #' . $header_text_color . ';
     }' . "\n\n";
	} else {
		$header = '';
	}

	if ( ! empty ( $font_size ) && $font_size != '15' ) {
		$font_size = '     body {
            font-size: ' . $font_size . 'px;
     }' . "\n\n";
	} else {
		$font_size = '';
	}

	if ( ! empty ( $together_paragraph_color ) && $together_paragraph_color != '#676e74' ) {
		$together_paragraph_color = '     p {
            color: ' .$together_paragraph_color . ';
     }' . "\n\n";
	} else {
		$together_paragraph_color = '';
	}

	if ( ! empty ( $together_meta_color ) && $together_meta_color != '#93979c' ) {
		$together_meta_color = '     .entry-meta,
     .entry-meta a,
     .entry-footer,
     .entry-footer a,
     .dt-testimonial-meta span,
     .dt-sidebar .dt-recent-post-holder span {
         color: ' . $together_meta_color . ';
     }' . "\n\n";
	} else {
		$together_meta_color = '';
	}

	if ( ! empty ( $color ) && $color != '#525961' ) {
		$color = '     body,
     h1,
     h2,
     h3,
     h4,
     h5,
     h6,
     h1 a,
     h2 a,
     h3 a,
     h4 a,
     h5 a,
     h6 a,
     a {
        color: ' .$color .';
     }

     .dt-site-header .dt-main-menu .menu > li > a {
        color: ' . $primary . ';
     }

    .dt-main-menu-sub .dt-main-menu li > a,
    .dt-main-menu li a,
    .dt-header-bg .dt-main-menu .menu > li > a {
        color: ' . $color . ';
     }' . "\n\n";
	} else {
		$color = '';
	}

	if ( ! empty ( $primary ) && $primary != '#e55a65' ) {
		$primary = '     a:hover,
    .current-menu-item a,
    .current_page_item a,
    .dt-main-menu li:hover > a,
    .dt-about-couple h2:after,
    .dt-rsvp-form h2:after {
         color: ' . $primary . ' !important;
     }


    .current-menu-item a,
    .current_page_item a,
    .dt-main-menu li > a:hover,
    .dt-couple-cont figure img:hover,
    .dt-rsvp-form input[type="submit"]:hover,
    .dt-error-page .search-form input[type="submit"]:hover {
        border-color: ' . $primary . ' !important;
     }

    .dt-featured-post-meta .dt-read-more a:hover
    #back-to-top:hover,
    .dt-rsvp-form input[type="submit"]:hover,
    .dt-recent-blog-post-holder figure .fa:hover,
    .dt-error-page .search-form input[type="submit"]:hover,
    .dt-archive-post .entry-footer a:hover {
        background: ' . $primary . ';
     }

    #back-to-top:hover {
    	background: ' . $primary . ';
     }' . "\n\n";
	} else {
		$primary = '';
	}

	if ( ! empty ( $header_image ) ) {
		$header_image = '    .dt-site-header {
    	background: url("' . $header_image . '") no-repeat top center;
     }' . "\n\n";
	} else {
		$header_image = '    .dt-site-header {
    	background: ' . $together_header_bg . ';
		}';
	}

	$custom_css = $header . $font_size . $together_paragraph_color . $together_meta_color . $color . $primary . $header_image ;
	wp_add_inline_style( 'together-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'together_customizer_styles' );

/**
 * Count Down Date
 */
// Register the script


function together_load_scripts() {

	wp_register_script( 'dt_countdown_handle', get_template_directory_uri() .'/js/custom.js', array( 'jquery' ), '', true );

	// Localize the script with new data
	$translation_array = array(
			'dt_countdown_year' 	=> date( "Y", strtotime( get_theme_mod( 'dt_countdown_setting' ) ) ),
			'dt_countdown_month' 	=> date( "n", strtotime( get_theme_mod( 'dt_countdown_setting' ) ) ),
			'dt_countdown_day' 		=> date( "j", strtotime( get_theme_mod( 'dt_countdown_setting' ) ) )
	);
	wp_localize_script( 'dt_countdown_handle', 'dt_countdown_date', $translation_array );

	// Enqueued script with localized data.
	wp_enqueue_script( 'dt_countdown_handle' );

}
add_action('wp_enqueue_scripts', 'together_load_scripts');
