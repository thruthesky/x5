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
                <strong><?php _text('First class:')?></strong> <?php echo $first_class?><br>
                <strong><?php _text('No. of past classes:')?></strong> <?php echo $no_of_past?><br>
                <strong><?php _text('No. of reservations:')?></strong> <?php echo $no_of_reservation?><br>
                <strong><?php _text('Next class:')?></strong> <?php echo $next_class?>
            </div>
        </div>
    </div>
</section>