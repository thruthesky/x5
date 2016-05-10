<?php
wp_enqueue_style('help-content1', td() . '/css/help-content1.css');
?>
<section class="help content-one">
    <div>
        <div class="banner">
            <h2><?php _text('Help')?></h2>
            <div class="desc"><?php _text('Hlp:B1:Banner Description will be place here')?></div>
        </div>
        <div class="img1">
            <img src="<?php img_e() ?>help-banner-image1.png">
            <div class="how text"><?php _text('How', 'x5')?></div>
            <div class="what text"><?php _text('What', 'x5')?></div>
            <div class="why text"><?php _text('Why', 'x5')?></div>
            <div class="who text"><?php _text('Who', 'x5')?></div>
        </div>
        <div id="content-two"></div>
    </div>
</section>
