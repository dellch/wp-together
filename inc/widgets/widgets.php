<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function together_widgets_init() {

    // Register Right Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'together' ),
        'id'            => 'sidebar',
        'description'   => __( 'Add widgets to Show widgets at sidebar', 'together' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // RSVP
    register_sidebar( array(
        'name'          => esc_html__( 'Front Page RSVP section', 'together' ),
        'id'            => 'dt-front-rsvp',
        'description'   => __( 'Add widgets to Show widgets at RSVP Section', 'together' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    // Register Footer Position
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Position', 'together' ),
        'id'            => 'dt-footer-widget',
        'description'   => __( 'Add widgets to Show widgets at Footer Position', 'together' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title"><span></span>',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'together_widgets_init' );

/**
 * Enqueue Admin Scripts
 */
function together_media_script() {
    // Update CSS within in Admin
    wp_enqueue_style('admin-styles', get_template_directory_uri() . '/inc/widgets/widgets.css');

    wp_enqueue_media();
    wp_enqueue_script( 'dt-media-upload-js', get_template_directory_uri() . '/inc/widgets/widgets.js', array( 'jquery' ), '', true );
}
add_action( 'admin_enqueue_scripts', 'together_media_script' );

/**
 * Social Icons widget.
 */
class together_social_icons extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'together_social_icons',
            __( 'Daisy: Social Icons', 'together' ),
            array(
                'classname'     => 'dt-social-icons',
                'description'   => __( 'Social Icons', 'together' )
            )
        );

    }

    public function widget( $args, $instance ) {

        extract( $args, EXTR_SKIP );

        $title      = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : '';
        $facebook   = isset( $instance[ 'facebook' ] ) ? $instance[ 'facebook' ] : '';
        $twitter    = isset( $instance[ 'twitter' ] ) ? $instance[ 'twitter' ] : '';
        $g_plus     = isset( $instance[ 'g-plus' ] ) ? $instance[ 'g-plus' ] : '';
        $instagram  = isset( $instance[ 'instagram' ] ) ? $instance[ 'instagram' ] : '';
        $github     = isset( $instance[ 'github' ] ) ? $instance[ 'github' ] : '';
        $flickr     = isset( $instance[ 'flickr' ] ) ? $instance[ 'flickr' ] : '';
        $pinterest  = isset( $instance[ 'pinterest' ] ) ? $instance[ 'pinterest' ] : '';
        $wordpress  = isset( $instance[ 'wordpress' ] ) ? $instance[ 'wordpress' ] : '';
        $youtube    = isset( $instance[ 'youtube' ] ) ? $instance[ 'youtube' ] : '';
        $vimeo      = isset( $instance[ 'vimeo' ] ) ? $instance[ 'vimeo' ] : '';
        $linkedin   = isset( $instance[ 'linkedin' ] ) ? $instance[ 'linkedin' ] : '';
        $behance    = isset( $instance[ 'behance' ] ) ? $instance[ 'behance' ] : '';
        $dribbble   = isset( $instance[ 'dribbble' ] ) ? $instance[ 'dribbble' ] : '';

        echo $before_widget; ?>

        <ul>
            <?php if( ! empty( $facebook ) ) { ?>
                <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank"><i class="fa fa-facebook transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $twitter ) ) { ?>
                <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank"><i class="fa fa-twitter transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $g_plus ) ) { ?>
                <li><a href="<?php echo esc_url( $g_plus ); ?>" target="_blank"><i class="fa fa-google-plus transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $instagram ) ) { ?>
                <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank"><i class="fa fa-instagram transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $github ) ) { ?>
                <li><a href="<?php echo esc_url( $github ); ?>" target="_blank"><i class="fa fa-github transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $flickr ) ) { ?>
                <li><a href="<?php echo esc_url( $flickr ); ?>" target="_blank"><i class="fa fa-flickr transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $pinterest ) ) { ?>
                <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank"><i class="fa fa-pinterest transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $wordpress ) ) { ?>
                <li><a href="<?php echo esc_url( $wordpress ); ?>" target="_blank"><i class="fa fa-wordpress transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $youtube ) ) { ?>
                <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank"><i class="fa fa-youtube transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $vimeo ) ) { ?>
                <li><a href="<?php echo esc_url( $vimeo ); ?>" target="_blank"><i class="fa fa-vimeo transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $linkedin ) ) { ?>
                <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank"><i class="fa fa-linkedin transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $behance ) ) { ?>
                <li><a href="<?php echo esc_url( $behance ); ?>" target="_blank"><i class="fa fa-behance transition35"></i></a> </li>
            <?php } ?>

            <?php if( ! empty( $dribbble ) ) { ?>
                <li><a href="<?php echo esc_url( $dribbble ); ?>" target="_blank"><i class="fa fa-dribbble transition35"></i></a> </li>
            <?php } ?>

            <div class="clearfix"></div>
        </ul>

        <?php
        echo $after_widget;

    }

    public function form( $instance ) {

        $instance = wp_parse_args(
            (array) $instance, array(
                'title'             => '',
                'facebook'          => '',
                'twitter'           => '',
                'g-plus'            => '',
                'instagram'         => '',
                'github'            => '',
                'flickr'            => '',
                'pinterest'         => '',
                'wordpress'         => '',
                'youtube'           => '',
                'vimeo'             => '',
                'linkedin'          => '',
                'behance'           => '',
                'dribbble'          => ''
            )
        );

        ?>

        <div class="dt-social-icons">
            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo esc_attr( $instance['facebook'] ); ?>" placeholder="https://www.facebook.com/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo esc_attr( $instance['twitter'] ); ?>" placeholder="https://twitter.com/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'g-plus' ); ?>"><?php _e( 'G plus', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'g-plus' ); ?>" name="<?php echo $this->get_field_name( 'g-plus' ); ?>" value="<?php echo esc_attr( $instance['g-plus'] ); ?>" placeholder="https://plus.google.com/">
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" value="<?php echo esc_attr( $instance['instagram'] ); ?>" placeholder="https://instagram.com/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'github' ); ?>"><?php _e( 'Github', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'github' ); ?>" name="<?php echo $this->get_field_name( 'github' ); ?>" value="<?php echo esc_attr( $instance['github'] ); ?>" placeholder="https://github.com/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'flickr' ); ?>"><?php _e( 'Flickr', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'flickr' ); ?>" name="<?php echo $this->get_field_name( 'flickr' ); ?>" value="<?php echo esc_attr( $instance['flickr'] ); ?>" placeholder="https://www.flickr.com/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" value="<?php echo esc_attr( $instance['pinterest'] ); ?>" placeholder="https://www.pinterest.com/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'wordpress' ); ?>"><?php _e( 'WordPress', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'wordpress' ); ?>" name="<?php echo $this->get_field_name( 'wordpress' ); ?>" value="<?php echo esc_attr( $instance['wordpress'] ); ?>" placeholder="https://wordpress.org/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" value="<?php echo esc_attr( $instance['youtube'] ); ?>" placeholder="https://www.youtube.com/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'vimeo' ); ?>"><?php _e( 'Vimeo', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'vimeo' ); ?>" name="<?php echo $this->get_field_name( 'vimeo' ); ?>" value="<?php echo esc_attr( $instance['vimeo'] ); ?>" placeholder="https://vimeo.com/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'Linkedin', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" value="<?php echo esc_attr( $instance['linkedin'] ); ?>" placeholder="https://linkedin.com" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'behance' ); ?>"><?php _e( 'Behance', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'behance' ); ?>" name="<?php echo $this->get_field_name( 'behance' ); ?>" value="<?php echo esc_attr( $instance['behance'] ); ?>" placeholder="https://www.behance.net/" >
            </div><!-- .dt-admin-input-wrap -->

            <div class="dt-admin-input-wrap">
                <label for="<?php echo $this->get_field_id( 'dribbble' ); ?>"><?php _e( 'Dribbble', 'together' ); ?></label>
                <input type="text" id="<?php echo $this->get_field_id( 'dribbble' ); ?>" name="<?php echo $this->get_field_name( 'dribbble' ); ?>" value="<?php echo esc_attr( $instance['dribbble'] ); ?>" placeholder="https://dribbble.com/" >
            </div><!-- .dt-admin-input-wrap -->
        </div><!-- .dt-social-icons -->
        <?php
    }

    public function update( $new_instance, $old_instance ) {

        $instance                = $old_instance;
        $instance[ 'title' ]     = strip_tags( stripslashes( $new_instance[ 'title' ] ) );
        $instance[ 'facebook' ]  = strip_tags( stripslashes( $new_instance[ 'facebook' ] ) );
        $instance[ 'twitter' ]   = strip_tags( stripslashes( $new_instance[ 'twitter' ] ) );
        $instance[ 'g-plus' ]    = strip_tags( stripslashes( $new_instance[ 'g-plus' ] ) );
        $instance[ 'instagram' ] = strip_tags( stripslashes( $new_instance[ 'instagram' ] ) );
        $instance[ 'github' ]    = strip_tags( stripslashes( $new_instance[ 'github' ] ) );
        $instance[ 'flickr' ]    = strip_tags( stripslashes( $new_instance[ 'flickr' ] ) );
        $instance[ 'pinterest' ] = strip_tags( stripslashes( $new_instance[ 'pinterest' ] ) );
        $instance[ 'wordpress' ] = strip_tags( stripslashes( $new_instance[ 'wordpress' ] ) );
        $instance[ 'youtube' ]   = strip_tags( stripslashes( $new_instance[ 'youtube' ] ) );
        $instance[ 'vimeo' ]     = strip_tags( stripslashes( $new_instance[ 'vimeo' ] ) );
        $instance[ 'linkedin' ]  = strip_tags( stripslashes( $new_instance[ 'linkedin' ] ) );
        $instance[ 'behance' ]   = strip_tags( stripslashes( $new_instance[ 'behance' ] ) );
        $instance[ 'dribbble' ]  = strip_tags( stripslashes( $new_instance[ 'dribbble' ] ) );
        return $instance;

    }

}  // together_social_icons

// Register widgets
function register_together_widgets() {
    register_widget( 'together_social_icons' );
}
add_action( 'widgets_init', 'register_together_widgets' );
