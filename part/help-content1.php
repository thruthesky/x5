<?php
wp_enqueue_style('help-content1', td() . '/css/help-content1.css');
?>
<section class="help content-one">
    <div>
        <div class="banner">
            <h2><?php _e('Help', 'x5')?></h2>
            <div class="desc"><?php _e('Hlp-C1 Banner Description will be place here', 'x5')?></div>
        </div>
        <div class="img1">
            <img src="<?php img_e() ?>help-banner-image1.png">
            <div class="how text"><?php _e('How', 'x5')?></div>
            <div class="what text"><?php _e('What', 'x5')?></div>
            <div class="why text"><?php _e('Why', 'x5')?></div>
            <div class="who text"><?php _e('Who', 'x5')?></div>
        </div>
        <div id="content-two"></div>
    </div>
</section>
