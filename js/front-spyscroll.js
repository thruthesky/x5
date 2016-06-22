jQuery( function( $ ) {
    function activate( id ) {
        //console.log('activate : ' + id);
        $('#nav-link').find('a').removeClass('active');
        $('a[href="#'+id+'"]').addClass( 'active' );
    }
    var spyElements = ['icon-menu', 'testimonial', 'book', 'gallery', 'desc', 'info'];
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
        var window_width = $(window).width();
        var slider_height = $('.my-slider').height();
        if( st >= slider_height && window_width >= 940){
            $('.scroll-menu').css('display', 'block');
        }
        else{
            $('.scroll-menu').css('display', 'none');
        }
        for ( var e in spyElementTops ) {
            var top = spyElementTops[e];
            if ( st > top ) {
                activate( e );
                break;
            }
        }
    },100));
});