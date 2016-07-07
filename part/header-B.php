<?php wp_enqueue_style( 'module.header-A', td() . '/css/module.header-B.css' ); ?>
<div class="header-inner">
    <?php
    ?>
    <div class="logo">
        <a href="<?php echo home_url()?>">
            <img src="<?php opt('lms[logo_on_top]', img() . 'logo.jpg')?>">
        </a>
        <div class="title">
            <a href="<?php echo home_url()?>">
                <?php _text('Company Name')?>
            </a>
        </div>
    </div>
    <nav class="top-menu">
        <ul>
            <li>
                <a class="icon" >
                    <span class="dashicons dashicons-menu menu-icon"></span>
                </a>
            </li>

            <li class="register-logout <?php if ( segment(0) == 'user-register' ) echo 'active'; ?>">

            </li>

            <li class="<?php if ( segment(0) == 'help' ) echo 'active'; ?>">
                <a href="<?php hd()?>help">
                    <span><?php _text('HELP')?></span>
                </a>
            </li>
            <li class="<?php if ( segment(0) == 'menu-all' ) echo 'active'; ?>">
                <a href="<?php hd()?>menu-all">
                    <span><?php _text('SITEMAP')?></span>
                </a>
            </li>
            <li></li>
        </ul>
    </nav>
    <nav class="menu">
        <ul>
            <li class="<?php if ( segment(0) == 'about-us' ) echo 'active'; ?>">
                <div><a href="<?php hd()?>about-us"><span class="menu-img"><img src="<?php img_e() ?>header-menu/B/about_us.png"></span><?php _text('About  Us')?></a></div>
            </li>
            <li class="<?php if ( segment(0) == 'level-test' ) echo 'active'; ?>">
                <div><a href="<?php hd()?>level-test"><span class="menu-img"><img src="<?php img_e() ?>header-menu/B/level test.png"></span><?php _text('Level Test')?></a></div>
            </li>
            <li class="<?php if ( segment(0) == 'curriculum' ) echo 'active'; ?>">
                <div><a href="<?php hd()?>curriculum"><span class="menu-img"><img src="<?php img_e() ?>header-menu/B/curriculum.png"></span><?php _text('Curriculum')?></a></div>
            </li>
            <li class="<?php if ( segment(0) == 'enrollment' ) echo 'active'; ?>">
                <div><a href="<?php hd()?>enrollment"><span class="menu-img"><img src="<?php img_e() ?>header-menu/B/enroll.png"></span><?php _text('Enrollment')?></a></div>
            </li>
            <li class="<?php if ( segment(0) == 'reservation' ) echo 'active'; ?>">
                <div><a href="<?php hd()?>reservation"><span class="menu-img"><img src="<?php img_e() ?>header-menu/B/reservation.png"></span><?php _text('Reservation')?></a></div>
            </li>
            <li class="<?php if ( segment(1) == 'qna' ) echo 'active'; ?>">
                <div><a href="<?php hd()?>forum/qna"><span class="menu-img"><img src="<?php img_e() ?>header-menu/B/forum.png"></span><?php _text('QnA')?></a></div>
            </li>
            <li class="close-btn">
                <div><a href="#"><?php _text('Close')?></a></div>
            </li>
        </ul>
    </nav>
</div>