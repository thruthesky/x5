<?php
wp_enqueue_style('curriculum-content1', td() . '/css/curriculum-content1.css');
wp_enqueue_style('banner-header', td() . '/css/banner-header.css');
?>
<section class="curriculum content-one">
    <img src="<?php img_e() ?>header/curriculum-banner1.jpg">
    <div>
        <div class="text banner">
            <h2><?php _text('Cur:B1:Curricumlum')?></h2>
            <div class="desc">
                <?php _text('Cur:B1:Banner Description will be place here')?>
            </div>
        </div>
    </div>
</section>