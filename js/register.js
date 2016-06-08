jQuery( function( $ ) {
    var $error = $('.line.error');
    $('section.register form').submit ( function (e) {
        e.preventDefault();
        var $form = $(this);

        // check if the user agreed

        var $$$ = $form.find('[name="agree"]');
        if ( ! $$$.prop('checked') ) {
            alert( $$$.attr('message') );
            return;
        }


        on_submit();
        var url = $form.prop('action') + '?' + $form.serialize();
        $.post(url, function(re) {
            on_result(re);
        });
    });

    function on_submit() {
        $('.line.spinner').show();
        $('.line.submit').hide();
        $error.hide();
    }

    function on_result(re) {
        setTimeout(function(){
            $('.line.spinner').hide();
            if ( re['code'] ) {
                $('.line.submit').show();
                var $error = $('.line.error');
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