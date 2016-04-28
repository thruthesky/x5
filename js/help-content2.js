jQuery(function($) {
    var $nav_header    = $('#nav-link'),
        offset_val     = 353;
    function navSlide() {
        var scroll_top = $(window).scrollTop();

        if (scroll_top >= offset_val) { // the detection!
            $nav_header.css({
                'position' : 'absolute',
                'top': scroll_top - 198 + 'px',
                'z-index': '12345'
            });
        } else {
            $nav_header.css({
                'position': 'absolute',
                'top' : '155px',
                'z-index': '0'
            });
        }
    }
    $(window).scroll(navSlide);
});