/**
 * Custom Script
 */
jQuery(document).ready( function() {
    // Wedding Countdown
    var wedding_year = dt_countdown_date.dt_countdown_year;
    var wedding_month = dt_countdown_date.dt_countdown_month;
    var wedding_day = dt_countdown_date.dt_countdown_day;

    jQuery( '#dt_wedding_day' ).simplyCountdown({
        year: wedding_year,
        month: wedding_month,
        day: wedding_day
    });

    // Scroll to Menu
    jQuery( '.dt-scroll-down' ).click(function() {
        jQuery( 'html, body' ).animate({
            scrollTop: jQuery( '.dt-main-menu' ).offset().top
        }, 800 );
    });


    // Sticky Menu
    var stickyNavTop = jQuery( '.dt-menu-fixed' ).offset().top;

    var stickyNav = function(){
        var scrollTop = jQuery(window).scrollTop();

        if (scrollTop > stickyNavTop) {
            jQuery( '.dt-menu-fixed' ).addClass( 'dt-sticky');
        } else {
            jQuery( '.dt-menu-fixed' ).removeClass( 'dt-sticky' );
        }
    };

    stickyNav();
    jQuery(window).scroll(function() {
        stickyNav();
    });

    // RESPONSIVE MENU
    jQuery( '.dt-menu-btn, #primary-menu.menu li:last-of-type a' ).on( 'click', function(e){
        e.preventDefault();
        jQuery('.menu-main-container').toggleClass('top-mobile-nav')
    });

    // Back to Top
    if (jQuery('#back-to-top').length) {
        var scrollTrigger = 500, // px
            backToTop = function () {
                var scrollTop = jQuery(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    jQuery('#back-to-top').addClass('show');
                } else {
                    jQuery('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        jQuery(window).on('scroll', function () {
            backToTop();
        });
        jQuery('#back-to-top').on('click', function (e) {
            e.preventDefault();
            jQuery('html,body').animate({
                scrollTop: 0
            }, 600);
        });
    }
});
