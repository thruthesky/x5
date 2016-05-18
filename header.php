<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
    <script>
        var home_url = "<?php echo home_url()?>";
    </script>
</head>


<body

    <?php body_class( is_front_page() ? 'front' : '' );
    if(is_front_page()){
        // echo ' data-spy="scroll" data-target="#nav-link"';
    }
    ?>
    <?php if ( segment(0) == 'help' ) echo 'data-spy="scroll" data-target="#nav-link"'; ?>

>



<div class="layout">
    <header>
        <div class="header-inner">
            <?php
            ?>
            <div class="logo">
                <a href="<?php echo home_url()?>">
                    <img src="<?php opt('lms[logo]', img() . 'logo.jpg')?>">
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
                    <?php if ( user()->login() ) : ?>
                        <?php if ( user()->admin() ) : ?>
                            <li class="<?php if ( segment(0) == 'user-log-in' ) echo 'active'; ?>">

                                <a href="<?php hd()?>wp-admin">
                                    <span><?php _e('ADMIN', 'x5')?></span>
                                </a></li>
                            <li><span class="site-edit"><?php _e('EDIT', 'x5')?></span></li>
                        <?php else : ?>
                            <li>
                                <a href="<?php hd()?>user-update">
                                    <span><?php printf(__('%s PROFILE UPDATE', 'x5'), login('user_login'))?></span>
                                </a>
                            </li>
                        <?php endif ?>
                    <?php else : ?>
                        <li class="<?php if ( segment(0) == 'user-log-in' ) echo 'active'; ?>" >
                            <a href="<?php hd()?>user-log-in">
                                <span><?php _e('LOGIN', 'x5')?></span>
                            </a>

                        </li>
                    <?php endif ?>
                    <li class="<?php if ( segment(0) == 'user-register' ) echo 'active'; ?>">

                        <?php if ( user()->login() ) : ?>
                            <a href="<?php echo wp_logout_url( home_url() ); ?>">
                                <span><?php _text('LOGOUT')?></span>
                            </a>
                        <?php else : ?>
                            <a href="<?php hd()?>user-register">
                                <span><?php _text('REGISTER')?></span>
                            </a>
                        <?php endif ?>
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
                </ul>
            </nav>
            <nav class="menu">
                <ul>
                    <li class="<?php if ( segment(0) == 'about-us' ) echo 'active'; ?>">
                        <div><a href="<?php hd()?>about-us"><?php _text('About  Us')?></a></div>
                    </li>
                    <li class="<?php if ( segment(0) == 'level-test' ) echo 'active'; ?>">
                        <div><a href="<?php hd()?>level-test"><?php _text('Level Test')?></a></div>
                    </li>
                    <li class="<?php if ( segment(0) == 'enrollment' ) echo 'active'; ?>">
                        <div><a href="<?php hd()?>enrollment"><?php _text('Enrollment')?></a></div>
                    </li>
                    <li class="<?php if ( segment(0) == 'curriculum' ) echo 'active'; ?>">
                        <div><a href="<?php hd()?>curriculum"><?php _text('Curriculum')?></a></div>
                    </li>
                    <li class="<?php if ( segment(0) == 'reservation' ) echo 'active'; ?>">
                        <div><a href="<?php hd()?>reservation"><?php _text('Reservation')?></a></div>
                    </li>
                    <li class="<?php if ( segment(1) == 'qna' ) echo 'active'; ?>">
                        <div><a href="<?php hd()?>forum/qna"><?php _text('QnA')?></a></div>
                    </li>
                    <li class="close">
                        <div><a href="#"><?php _text('Close')?></a></div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="content">



        <section class="data">
            <?php if ( segment(0) == 'forum' ){ include 'part/forum-content1.php';  } ?>
            <?php include 'part/aside.php'; ?>
