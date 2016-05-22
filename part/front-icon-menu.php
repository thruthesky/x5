<?php
wp_enqueue_style('front-icon-menu', td() . '/css/front-icon-menu.css');
?>
<a name="icon-menu"></a>
<nav class="spy icon-menu bottom-icon-menus">
    <div class="inner">
        <div class="item talk">
            <a href="<?php echo home_url()?>/ve"  class="image">
                <img class="default" src="<?php img_e() ?>icon-menu/book1.jpg">
                <img class="active" src="<?php img_e() ?>icon-menu/book2.jpg">
            </a>
            <div class="label"><?php _text('Enter Class Room')?></div>
        </div>
        <div class="item grad">
            <a href="<?php echo home_url()?>/reservation" class="image">
                <img class="default" src="<?php img_e() ?>icon-menu/grad1.jpg">
                <img class="active" src="<?php img_e() ?>icon-menu/grad2.jpg">
            </a>
            <div class="label"><?php _text('Reservations')?></div>
        </div>
        <div class="item date">
            <a href="<?php echo home_url()?>/teacher-list" class="image">
                <img class="default" src="<?php img_e() ?>icon-menu/camp1.jpg">
                <img class="active" src="<?php img_e() ?>icon-menu/camp2.jpg">
            </a>
            <div class="label"><?php _text('Teacher List')?></div>
        </div>
        <div class="item price">
            <a href="<?php echo home_url()?>/enrollment" class="image">
                <img class="default" src="<?php img_e() ?>icon-menu/price1.jpg">
                <img class="active" src="<?php img_e() ?>icon-menu/price2.jpg">
            </a>
            <div class="label"><?php _text('Enrollment Fee')?></div>
        </div>
        <div class="item write">
            <a href="<?php echo home_url()?>/qna" class="image">
                <img class="default" src="<?php img_e() ?>icon-menu/write1.jpg">
                <img class="active" src="<?php img_e() ?>icon-menu/write2.jpg">
            </a>
            <div class="label"><?php _text('Q & A')?></div>
        </div>
        <div class="item gallery">
            <a href="<?php echo home_url()?>/feedback" class="image">
                <img class="default" src="<?php img_e() ?>icon-menu/gallery1.jpg">
                <img class="active" src="<?php img_e() ?>icon-menu/gallery2.jpg">
            </a>
            <div class="label"><?php _text('Class Comment')?></div>
        </div>
    </div>
</nav>
