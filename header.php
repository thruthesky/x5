<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Whiz English</title>
    <?php wp_head();?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script>
        var home_url = "<?php echo home_url()?>";
    </script>
</head>
<body <?php body_class( is_front_page() ? 'front' : '' ); ?>>

<div class="layout">
    <header>
        <div class="header-inner">
            <?php

            ?>
            <div class="logo">
                <a href="<?php echo home_url()?>">
                    <img src="<?php opt('lms[logo]', img() . 'logo.jpg')?>">
                    <span class="title">위즈잉글리시</span>
                </a>
            </div>
            <nav class="top-menu">
                <ul>
                    <li>
                        <span class="dashicons dashicons-menu menu-icon"></span>
                    </li>
                    <li>
                        <?php if ( user()->login() ) : ?>
                            <?php if ( user()->admin() ) : ?>
                                <a href="<?php hd()?>wp-admin">
                                    <span><?php _e('ADMIN', 'whizeng')?></span>
                                </a>
                            <?php else : ?>
                                <a href="<?php hd()?>user-update">
                                    <span><?php _e('PROFILE UPDATE', 'whizeng')?></span>
                                </a>
                            <?php endif ?>
                        <?php else : ?>
                            <a href="<?php hd()?>user-log-in">
                                <span><?php _e('LOGIN', 'whizeng')?></span>
                            </a>
                        <?php endif ?>
                    </li>
                    <li>
                        <?php if ( user()->login() ) : ?>
                            <a href="<?php echo wp_logout_url( home_url() ); ?>">
                                <span><?php _e('LOGOUT', 'whizeng')?></span>
                            </a>
                        <?php else : ?>
                            <a href="<?php hd()?>user-register">
                                <span><?php _e('REGISTER', 'whizeng')?></span>
                            </a>
                        <?php endif ?>
                    </li>
                    <li>
                        <a href="<?php hd()?>menu-all">
                            <span><?php _e('ALL MENU', 'whizeng')?></span>
                        </a>
                    </li>
                </ul>
            </nav>
            <nav class="menu">
                <ul>
                    <li>
                        <div><a href="<?php hd()?>about-us"><?php _e('About  Us', 'whizeng')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>level-test"><?php _e('Level Test', 'whizeng')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>enrollment"><?php _e('Enrollment', 'whizeng')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>curriculum"><?php _e('Curriculum', 'whizeng')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>reservation"><?php _e('Reservation', 'whizeng')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>category/forum/qna/"><?php _e('QnA', 'whizeng')?></a></div>
                    </li>
                    <li class="close">
                        <div><a href="#"><?php _e('Close', 'whizeng')?></a></div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="content">

        <?php include 'part/aside.php'; ?>

        <section class="data">

