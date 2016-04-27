jQuery(function($) {
    $('.line').click(function () {
        var $this = $(this);
        var $desc = $this.find('.desc');
        if ($desc.css('display') != 'none'){
            $desc.slideUp();
        }
        else {
            $desc.slideDown();
        }
    });
});