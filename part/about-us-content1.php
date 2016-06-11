<?php
wp_enqueue_style('about-us-content1', td() . '/css/about-us-content1.css');
wp_enqueue_style('banner-header', td() . '/css/banner-header.css');
?>
<section class="about-us content-one">
    <img src="<?php img_e() ?>header/about-us-banner1.jpg">
    <div>
        <div class="banner">
            <h2><?php _text('AU:B1:About Us') ?></h2>
            <div class="desc"><?php _text('AU:B1:Description will be place here') ?></div>
        </div>
    </div>
</section>