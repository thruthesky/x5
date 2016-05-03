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
        var t = $('body').scrollTop();
        var g = t + 100;

        //if ($(window).width() > 1200) {
            $sidebar.animate({ top: g}, 800);
        //}
    }



    /** Translating Text */
    var $site_edit = $('.site-edit');
    $site_edit.click(function(){
        console.log(Cookies.get('site-edit'));
        if ( Cookies.get('site-edit') == 'Y' ) { // do not edit.
            $site_edit.removeClass('site-edit-enabled');
            Cookies.set('site-edit', 'N');
            $('.translate-text').addClass('translate-text-disabled');
            $('.translate-text').removeClass('translate-text');

        }
        else { // let's edit now.
            Cookies.set('site-edit', 'Y');
            $(this).addClass('site-edit-enabled');
            $('.translate-text-disabled').addClass('translate-text');
            $('.translate-text-disabled').removeClass('translate-text-disabled');
        }
    });
    if ( Cookies.get('site-edit') == 'Y' ) {
        $site_edit.addClass('site-edit-enabled');
    }
    else {

        $('.translate-text').addClass('translate-text-disabled');
        $('.translate-text').removeClass('translate-text');
    }


    $('.translate-text').click(function(){
        var $this = $(this);
        console.log( $this.attr('original-text'));

        if ( $this.find('.edit').length ) return;

        var original_text = $this.attr('original-text');
        console.log(original_text);
        var code = $this.attr('code');
        var html_content = $this.find('.html-content').html();
        var m = '' +
            '<div class="edit">' +
            '   <form>' +
            '       <input type="hidden" name="code" value="'+ code +'">' +
            '       <input type="hidden" name="original_text" value="'+ _.escape(original_text) +'">' +
            '       <textarea name="content">'+html_content+'</textarea>' +
            '       <input type="submit">' +
            '   </form>' +
            '   <div class="original-text">'+original_text+'</div>' +
            '</div>' +
            '';
        $this.append(m);
    });


    $('body').on('submit', '.translate-text form', function(event){
        event.preventDefault();

        var $form = $(this);
        var $edit = $(this).parent();
        var $translate_text_box = $edit.parent();

        var data = $form.serialize();
        //console.log(data);

        var url = home_url + '?translate_text=Y&' + data;
        console.log(url);
        $.post(url, function( re ) {
            console.log(re);
            if ( re['success'] == true ) {
                console.log('true !');
                $translate_text_box.find('.html-content').html( re['data']['content'] );
                $translate_text_box.find('.edit').remove();
            }
            else {
                console.log('false !!');
            }
        });

        return false;
    });

    /**
    $('.translate-text:eq(1)').click();
    $('.translate-text:eq(1)').find('textarea').val('hi. how are you?');
    $('.translate-text:eq(1)').find('form').submit();
    */


});