<?php
wp_enqueue_style('reservation-content1', td() . '/css/reservation-content1.css');
?>
<section class="reservation content-one" style="background: url('<?php img_e() ?>/header/reservation-banner1.jpg') no-repeat center center;">
    <div>
        <img src="<?php img_e() ?>header-980/reservation-banner1.jpg">
        <div class="text banner">
            <div class="title"><?php _text('Title: English Level')?></div>
            <div class="level"><?php _text('English Level')?></div>
            <div class="desc">
                <strong><?php _text('First class:')?></strong> 2014-08-27<br>
                <strong><?php _text('No. of past classes:')?></strong> 68<br>
                <strong><?php _text('No. of reservations:')?></strong> 20<br>
                <strong><?php _text('Next class:')?></strong> 8:30pm on 2016-04-19
            </div>
        </div>
    </div>
</section>