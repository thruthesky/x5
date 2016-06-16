    jQuery(function($) {
    var $nav_header    = $('#nav-link'),
        offset_val     = 353;
    function navSlide() {
        var scroll_top = $(window).scrollTop();

        if (scroll_top >= offset_val) { // the detection!
            $nav_header.css({
                'position' : 'absolute',
                'top': scroll_top - 218 + 'px'
            });
        } else {
            $nav_header.css({
                'position': 'absolute',
                'top' : '135px'
            });
        }
    }
    $(window).scroll(navSlide);

    function activate( id ) {
        //console.log('activate : ' + id);
        $('#nav-link').find('a').removeClass('active');
        $('a[href="#'+id+'"]').addClass( 'active' );
    }
    var spyElements = ['content-four', 'content-three', 'content-two'];
    var spyElementTops = getScrollTops();
    function getScrollTops() {
        var tops = {};
        spyElements.forEach(function(i){
            var p = $('.spy.' + i).position();
            tops[i] = p.top;
        });
        return tops;
    }
    // to make sure that web browser finished rendering of '.spy' elements.
    setTimeout(function() {
        spyElementTops = getScrollTops();
    }, 5000);
    $(document).scroll(_.debounce( function () {
        var st = $(window).scrollTop();
        for ( var e in spyElementTops ) {
            var top = spyElementTops[e];
            if ( st > top ) {
                activate( e );
                break;
            }
        }
    },100));

});