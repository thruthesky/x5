jQuery(function($) {

    var el= {};
    el.menu = function () {
        return $('nav.menu');
    };

    $('.top-menu .menu-icon').click(function() {

        if ( el.menu().css('display') != 'none' ) el.menu().slideUp();
        else el.menu().slideDown();
    });

    $('.menu .close a').click(function() {
        el.menu().slideUp();
    });

    var scrollDebounce = _.debounce(scrollDebounced, 200);
    $(window).scroll(scrollDebounce);
    function scrollDebounced() {
        var $sidebar = $('.sidebar');
        //var p = $sidebar.position();
        var t = $('body').scrollTop();
        var g = t + 100;

        //if ($(window).width() > 1200) {
            $sidebar.animate({ top: g}, 800);
        //}
    }


    var $site_edit = $('.site-edit');
    $site_edit.click(function(){
        if ( Cookies.get('site-edit') == 'Y' ) {
            $site_edit.removeClass('site-edit-enabled');
            Cookies.set('site-edit', 'N');
        }
        else {
            Cookies.set('site-edit', 'Y');
            $(this).addClass('site-edit-enabled');
        }
    });
    if ( Cookies.get('site-edit') == 'Y' ) $site_edit.addClass('site-edit-enabled');


});