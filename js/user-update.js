jQuery( function( $ ) {
    var $spinner = $('.line.spinner');
    var $submit = $('.line.submit');
    var $error = $('.line.error');
    $('section.user-update form').submit ( function (e) {
        e.preventDefault();
        on_submit();
        var $form = $(this);
        var url = $form.prop('action') + '?' + $form.serialize();
        $.post(url, function(re) {
            console.log(re);
            on_result(re);
        });
    });
    function on_submit() {
        $spinner.show();
        $submit.hide();
        $error.hide();
    }
    function on_result(re) {
        setTimeout(function(){
            $spinner.hide();
            if ( re['code'] ) {
                $submit.show();
                $error.html( '<i class="fa fa-exclamation-triangle"></i> ' + re['message'] );
                $error.show();
            }
            else if ( typeof re['code'] == 'undefined' ) {
                $submit.show();
                $error.html( '<i class="fa fa-exclamation-triangle"></i> Server Internal Error : ' + re);
                $error.show();
            }
            else {
                //location.href = home_url;
                //alert("User Profile Update Success !")
                $submit.show();
                $submit.after('<div class="alert alert-success" role="alert"><strong>Good</strong> User account has been updated successfully.</div>');
            }
        }, 500);
    }


    $('.change-pwd').click(function() {
        $(this).hide();
        $(this).next().show();
    });

});