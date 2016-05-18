jQuery( function( $ ) {
    var $load = $('.load');
    var $more = $('.load-more');
    var $less = $('.load-less');
    var $sub = $('.load-sub');
    var $x = true;
    $load.click(function() {
        if ($x) {
            $sub.css({
                'display': 'block'
            });
            $x = false;
            $more.removeClass('active');
            $less.addClass('active');
        }else {
            $sub.css({
                'display': 'none'
            });
            $x = true;
            $less.removeClass('active');
            $more.addClass('active');
        }
    });
});