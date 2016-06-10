<?php
wp_enqueue_style('enrollment-content1', td() . '/css/enrollment-content1.css');
wp_enqueue_style('banner-header', td() . '/css/banner-header.css');
?>
<section class="enrollment content-one">
    <img src="<?php img_e() ?>header/enrollment-banner1.jpg">
    <div>
        <div class="banner">
            <h2><?php _text('Enr:B1:Enrollment') ?></h2>
            <div class="desc"><?php _text('Enr:B1:Banner Description will be place here') ?></div>
        </div>
    </div>
</section>