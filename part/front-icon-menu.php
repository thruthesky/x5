<?php
wp_enqueue_style('front-icon-menu', td() . '/css/front-icon-menu.css');
?>

<nav class="bottom-icon-menus">
    <div class="inner">
        <div class="item talk">
            <a href="<?php echo home_url()?>/ve"  class="image">
                <img class="default" src="<?php echo td() . '/img/book1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/book2.png' ?>">
            </a>
            <div class="label"><?php _text('Enter Class Room')?></div>
        </div>
        <div class="item grad">
            <a href="<?php echo home_url()?>/reservation" class="image">
                <img class="default" src="<?php echo td() . '/img/grad1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/grad2.png' ?>">
            </a>
            <div class="label"><?php _text('Reservations')?></div>
        </div>
        <div class="item date">
            <a href="<?php echo home_url()?>/teacher-list" class="image">
                <img class="default" src="<?php echo td() . '/img/camp1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/camp2.png' ?>">
            </a>
            <div class="label"><?php _text('Teacher List')?></div>
        </div>
        <div class="item price">
            <a href="<?php echo home_url()?>/enrollment" class="image">
                <img class="default" src="<?php echo td() . '/img/price1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/price2.png' ?>">
            </a>
            <div class="label"><?php _text('Enrollment Fee')?></div>
        </div>
        <div class="item write">
            <a href="<?php echo home_url()?>/qna" class="image">
                <img class="default" src="<?php echo td() . '/img/write1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/write2.png' ?>">
            </a>
            <div class="label"><?php _text('Q & A')?></div>
        </div>
        <div class="item gallery">
            <a href="<?php echo home_url()?>/feedback" class="image">
                <img class="default" src="<?php echo td() . '/img/gallery1.png' ?>">
                <img class="active" src="<?php echo td() . '/img/gallery2.png' ?>">
            </a>
            <div class="label"><?php _text('Class Comment')?></div>
        </div>
    </div>
</nav>
