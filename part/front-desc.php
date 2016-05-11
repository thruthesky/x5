<?php
wp_enqueue_style('desc', td() . '/css/front-desc.css');
?>
<a name="desc"></a>
<section class="spy desc">
    <div class="row">
        <h2><?php _text('Why Choose Us?')?></h2>
        <div class="info text">
            <?php _text(
                'We provides the best quality service on Online Video English Tutorial.
                 Practice your listening, reading, speaking and writing skills and interact with
                  our international community of native speakers.')?>
        </div>
        <div>
            <img src="<?php img_e() ?>whychooseus.png" >
        </div>
        <div class="inner row">
            <div class="col-sm-3">
                <div><img src="<?php img_e() ?>device.png" ></div>
                <div class="title"><?php _text('Any Device')?></div>
                <div class="desc"><?php _text('You can use any device for the video class.')?></div>
            </div>
            <div class="col-sm-3">
                <div><img src="<?php img_e() ?>time.png" ></div>
                <div class="title"><?php _text('Any Time')?></div>
                <div class="desc"><?php _text('You can choose class time on your convenience.')?></div>
            </div>
            <div class="col-sm-3">
                <div><img src="<?php img_e() ?>location.png" ></div>
                <div class="title"><?php _text('Any Where')?></div>
                <div class="desc"><?php _text('With your mobile device, you can get your class from any where.')?></div>
            </div>
            <div class="col-sm-3">
                <div><img src="<?php img_e() ?>option.png" ></div>
                <div class="title"><?php _text('Any Option')?></div>
                <div class="desc"><?php _text('You can have MWF, TTH or M~F class.')?></div>
            </div>
        </div>
    </div>
</section>
