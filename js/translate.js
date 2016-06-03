jQuery( function( $ ) {
    /** Translating Text */
    var $site_edit = $('.site-edit');
    var $translate_text = $('.translate-text');

    $('body').on('click', $site_edit, function(){
        console.log(Cookies.get('site-edit'));
        if ( Cookies.get('site-edit') == 'Y' ) { // do not edit.
            Cookies.set('site-edit', 'N');
        }
        else { // let's edit now.
            Cookies.set('site-edit', 'Y');
        }
        location.reload();
    });

    if ( Cookies.get('site-edit') == 'Y' ) {
        $site_edit.css('color', 'orangered');
        $translate_text.click(function(event){
            var $this = $(this);
            var md5 = $this.attr('md5');
            console.log( $this.attr('original-text'));

            if ( $('.translate-text-edit[md5="'+md5+'"]').length ) {
                return;
            }
            else {
                event.preventDefault();
            }

            var original_text = $this.attr('original-text');
            console.log(original_text);
            var code = $this.attr('code');
            var html_content = $this.find('.html-content').html();
            var m = '' +
                '<div class="translate-text-edit" md5="'+md5+'">' +
                '   <form action="?">' +
                '       <input type="hidden" name="code" value="'+ code +'">' +
                '       <input type="hidden" name="md5" value="'+ md5 +'">' +
                '       <input type="hidden" name="original_text" value="'+ _.escape(original_text) +'">' +
                '       <textarea name="content">'+html_content+'</textarea>' +
                '       <input type="submit">' +
                '   </form>' +
                '   <div class="original-text">'+original_text+'</div>' +
                '</div>' +
                '';
            $('body').append(m);
            $('[md5="'+md5+'"]').find('textarea').focus();
        });
    }

    $('body').on('submit', '.translate-text-edit form', function(e) {
        e.preventDefault();
        var $form = $(this);
        var values = $form.serialize();
        console.log(values);
        $.post( $form.prop('action'), values, function(re){
            if ( re['success'] ) {
                console.log('success', re);
                var data = re['data'];
                $('.translate-text-edit').remove();
                $('[md5="'+data['md5']+'"]').find('.html-content').html(data['content']);
            }
        });
        return false;
    });

});