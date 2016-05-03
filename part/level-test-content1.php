<?php
wp_enqueue_style('level-test-content1', td() . '/css/level-test-content1.css');
?>
<section class="level-test content-one">
    <div>
        <div class="img1 banner">
            <img src="<?php img_e() ?>level-test-banner-image1.png">
        </div>
        <div class="text banner">
            <h2><?php _e('Level Test', 'x5')?></h2>
            <div class="desc">
                <?php _e('Lvl-C1 Banner Description will be place here', 'x5')?>
            </div>
        </div>
        <div class="img2">
            <img src="<?php img_e() ?>level-test-banner-image2.png">
        </div>
    </div>
</section>