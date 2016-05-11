<?php
wp_enqueue_style('front-spyscroll', td() . '/css/front-spyscroll.css');


?>

<nav class="scroll-menu">
    <ul id="nav-link" class="nav">
        <li class="nav-item"><a class="nav-link" href="#info">Welcome</a></li>
        <li class="nav-item"><a class="nav-link" href="#desc">Why Choose Us?</a></li>
        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#book">Books</a></li>
        <li class="nav-item"><a class="nav-link" href="#testimonial">Feedback</a></li>
        <li class="nav-item"><a class="nav-link" href="#icon-menu">More</a></li>
    </ul>
</nav>


<script>
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
            for ( var e in spyElementTops ) {
                    var top = spyElementTops[e];
                    if ( st > top ) {
                        activate( e );
                        break;
                    }
            }
        },100));
    });
</script>