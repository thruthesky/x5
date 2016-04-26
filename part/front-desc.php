<?php
wp_enqueue_style('desc', td() . '/css/front-desc.css');
?>
<section class="desc">
    <div class="row">
        <h2><?php _e('Why Choose Us?', 'x5')?></h2>
        <div class="info text">
            <?php _e(
                'We provides the best quality service on Online Video English Tutorial.
                 Practice your listening, reading, speaking and writing skills and interact with
                  our international community of native speakers.', 'x5'
            )?>
        </div>
        <div>
            <img src="<?php img_e() ?>whychooseus.png" >
        </div>
        <div class="inner row">
            <div class="col-sm-3">
                <div><img src="<?php img_e() ?>device.png" ></div>
                <div class="title"><?php _e('Any Device', 'x5')?></div>
                <div class="desc"><?php _e('You can use any device for the video class.', 'x5')?></div>
            </div>
            <div class="col-sm-3">
                <div><img src="<?php img_e() ?>time.png" ></div>
                <div class="title"><?php _e('Any Time<', 'x5')?>/div>
                <div class="desc"><?php _e('You can choose class time on your convenience.', 'x5')?></div>
            </div>
            <div class="col-sm-3">
                <div><img src="<?php img_e() ?>location.png" ></div>
                <div class="title"><?php _e('Any Where', 'x5')?></div>
                <div class="desc"><?php _e('With your mobile device, you can get your class from any where.', 'x5')?></div>
            </div>
            <div class="col-sm-3">
                <div><img src="<?php img_e() ?>option.png" ></div>
                <div class="title"><?php _e('Any Option<', 'x5')?>/div>
                <div class="desc"><?php _e('You can have MWF, TTH or M~F class.', 'x5')?></div>
            </div>
        </div>
    </div>
</section>
