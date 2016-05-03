<?php
wp_enqueue_style('info', td() . '/css/front-info.css');
?>
<section class="info container">
    <div class="row">
        <h2><?php _text('Welcome to Our Company')?></h2>
        <div class="info text">
            <?php _e('Let us introduce our call center.', 'x5')?>
            <br /><br />
            <?php _e(
                'Mr. Song had published Withcenter, inc. on 2007.
                 Since then, the company grew every year and now it is located in Angeles City, Pampanga,
                  Philippines. We have 40 English teachers.', 'x5'
            )?>
        </div>
        <div>
            <img src="<?php img_e() ?>info.png" >
        </div>
    </div>
</section>
