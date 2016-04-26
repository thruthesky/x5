jQuery( function( $ ) {
    var $more = $('.load-more');
    var $sub = $('.load-sub');
    var $x = true;
    $more.click(function() {
        if ($x) {
            $sub.css({
                'display': 'block'
            });
            $x = false;
            $more.text('SHOW LESS','x5');
        }else {
            $sub.css({
                'display': 'none'
            });
            $x = true;
            $more.text('LOAD MORE');
        }
    });
});