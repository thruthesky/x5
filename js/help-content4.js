jQuery(function($) {
    $('.line-faq').click(function () {
        var $this = $(this);
        var $desc = $this.find('.desc');
        var $img = $this.find('img');
        var $src = $img.attr('src');
        if ($desc.css('display') != 'none'){
            $desc.slideUp();
            $img.attr('src',$src.replace('down.png','right.png'));
        }
        else {
            $desc.slideDown();
            $img.attr('src',$src.replace('right.png','down.png'));
        }
    });
});