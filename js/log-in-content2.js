jQuery( function( $ ) {
    var $log_in_form = $('section.log-in form');
    $log_in_form.submit ( function (e) {
        e.preventDefault();
        on_submit();
        var $form = $(this);
        var url = $form.prop('action') + '?' + $form.serialize();
        console.log(url);
        $.post(url, function(re) {
            on_result(re);
        });
    });
    function on_submit() {
        $log_in_form.find('.line.spinner').show();
        $log_in_form.find('.line.submit').hide();
        $log_in_form.find('.line.error').hide();
    }
    function on_result(re) {
        var $error = $('.line.error');
        setTimeout(function(){
            $('.line.spinner').hide();
            if ( re['code'] ) {
                $('.line.submit').show();
                $error.html( '<i class="fa fa-exclamation-triangle"></i> ' + re['message'] );
                $error.show();
            }
            else if ( typeof re['code'] == 'undefined' ) {
                $('.line.submit').show();
                $error.html( '<i class="fa fa-exclamation-triangle"></i> Server Internal Error ...');
                $error.show();
            }
            else {
                location.href = home_url;
            }
        }, 500);
    }

});