<?php
wp_enqueue_style('level-test-content1', td() . '/css/level-test-content1.css');
wp_enqueue_style('banner-header', td() . '/css/banner-header.css');
?>
<section class="level-test content-one">
    <img src="<?php img_e() ?>header/level-test-banner1.jpg">
    <div>
        <div class="text banner">
            <h2><?php _text('Lv:B1:Level Test')?></h2>
            <div class="desc">
                <?php _text('Lv:B1:Banner Description will be place here')?>
            </div>
        </div>
    </div>
</section>