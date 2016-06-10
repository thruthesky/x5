<?php
wp_enqueue_style('testing-content1', td() . '/css/testing-content1.css');
wp_enqueue_style('banner-header', td() . '/css/banner-header.css');
?>
<section class="testing content-one">
    <img src="<?php img_e() ?>header/testing-banner1.jpg">
    <div>
        <div class="banner">
            <h2><?php _text('Audio & Video Testing') ?></h2>
            <div class="desc"><?php _text('Audio & Video Testing Banner Description will be place here') ?></div>
        </div>
    </div>
</section>