<?php
wp_enqueue_style('curriculum-content1', td() . '/css/curriculum-content1.css');
?>
<section class="curriculum content-one">
    <div>
        <div class="img1 banner">
            <img src="<?php img_e() ?>curriculum-banner-image1.png">
        </div>
        <div class="text banner">
            <h2><?php _e('Curriculum', 'x5')?></h2>
            <div class="desc">
                <?php _e('Curr-C1 Banner Description will be place here', 'x5')?>
            </div>
        </div>
        <div class="img2">
            <img src="<?php img_e() ?>curriculum-banner-image2.png">
        </div>
    </div>
</section>