<?php
wp_enqueue_style('front-icon-menu', td() . '/css/front-icon-menu.css');
?>

<nav class="bottom-icon-menus">
    <div class="inner">
        <div class="item talk">
            <a href="#" class="image">
                <img class="default" src="<?php echo td() . '/img/book1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/book2.png' ?>">
            </a>
            <div class="label"><?php _e('Enter Class Room', 'x5')?></div>
        </div>
        <div class="item grad">
            <a href="#" class="image">
                <img class="default" src="<?php echo td() . '/img/grad1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/grad2.png' ?>">
            </a>
            <div class="label"><?php _e('Reservations', 'x5')?></div>
        </div>
        <div class="item date">
            <a href="#" class="image">
                <img class="default" src="<?php echo td() . '/img/camp1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/camp2.png' ?>">
            </a>
            <div class="label"><?php _e('Past Classes', 'x5')?></div>
        </div>
        <div class="item price">
            <a href="#" class="image">
                <img class="default" src="<?php echo td() . '/img/price1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/price2.png' ?>">
            </a>
            <div class="label"><?php _e('Enrollment Fee', 'x5')?></div>
        </div>
        <div class="item write">
            <a href="#" class="image">
                <img class="default" src="<?php echo td() . '/img/write1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/write2.png' ?>">
            </a>
            <div class="label"><?php _e('Q & A', 'x5')?></div>
        </div>
        <div class="item gallery">
            <a href="#" class="image">
                <img class="default" src="<?php echo td() . '/img/gallery1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/gallery2.png' ?>">
            </a>
            <div class="label"><?php _e('Class Comment', 'x5')?></div>
        </div>
    </div>
</nav>
