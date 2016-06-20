<?php
wp_enqueue_style('help-content1', td() . '/css/help-content1.css');
wp_enqueue_style('banner-header', td() . '/css/banner-header.css');
?>
<section class="help content-one">
    <img src="<?php img_e() ?>header/help-banner1.jpg">
    <span class="img1">
        <span class="how text"><?php _text('How')?></span>
        <span class="what text"><?php _text('What')?></span>
        <span class="why text"><?php _text('Why')?></span>
        <span class="who text"><?php _text('Who')?></span>
    </span>
    <div>
        <div class="banner">
            <h2><?php _text('Help')?></h2>
            <div class="desc"><?php _text('Hlp:B1:Banner Description will be place here')?></div>
        </div>
        <div id="content-two"></div>
    </div>
</section>
