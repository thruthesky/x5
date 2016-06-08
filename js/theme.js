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
        //var t = $('body').scrollTop(); not working on IE
        var w = $(window).scrollTop();
        var g = w + 100;
        //if ($(window).width() > 1200) {
            $sidebar.animate({ top: g}, 800);
        //}
    }



    $.get('?ajax=header_top_menu_user', function(res) {
        $('nav.top-menu ul li:eq(0)').after( res.data.user );
        $('nav.top-menu .register-logout').html( res.data.register );
    });

});

