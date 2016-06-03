<?php
wp_enqueue_style('help-content1', td() . '/css/help-content1.css');
?>
<section class="help content-one" style="background: url('<?php img_e() ?>/header/help-banner1.jpg') no-repeat center center;">
    <div>
        <div class="banner">
            <h2><?php _text('Help')?></h2>
            <div class="desc"><?php _text('Hlp:B1:Banner Description will be place here')?></div>
        </div>
        <div class="img1">
            <div class="how text"><?php _text('How')?></div>
            <div class="what text"><?php _text('What')?></div>
            <div class="why text"><?php _text('Why')?></div>
            <div class="who text"><?php _text('Who')?></div>
        </div>
        <div id="content-two"></div>
    </div>
</section>
