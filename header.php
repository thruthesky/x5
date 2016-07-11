<?php
ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
    <script>
        var home_url = "<?php echo home_url()?>";
    </script>
    <title><?php echo get_option('site_title')?></title>
    <meta name="description" content="<?php echo get_option('site_description')?>" />

    <?php
    $title = "";
    $og_sitename = "";
    $permalink = "";
    $description = "";
    if ( is_front_page() ) {
        echo <<<EOH

        <meta property="og:title" content="$title" />
        <meta property="og:url" content="$permalink" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="$description" />
        <meta property="og:site_name" content="$og_sitename" />

EOH;
    }
    else if ( is_single() ) {

        echo <<<EOH

        <meta property="og:title" content="$title" />
        <meta property="og:url" content="$permalink" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="$description" />
        <meta property="og:site_name" content="$og_sitename" />

EOH;

    }
    else if ( seg(0) == 'about-us' ) {
        $sitename = get_bloginfo('name');
        $url = home_url('about-us');
        ob_start();
        _text('og_description_about_us');
        $og_description_about_us = ob_get_clean();
        echo <<<EOH

        <meta property="og:title" content="About Us! - $sitename" />
        <meta property="og:url" content="$url" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="$og_description_about_us" />
        <meta property="og:site_name" content="$sitename" />
        <meta property="og:image" content="http://www.withcenter.kr/wp-content/themes/x5/img/header/about-us-banner1.jpg" />

EOH;

    }

    ?>

</head>


<body <?php body_class( is_front_page() ? 'front' : '' ); ?> >

<div class="layout">
    <header>
        <?php
        $header_location = get_header_location();
        include $header_location;
        ?>
    </header>

    <section class="content">



        <section class="data">
            <?php include 'part/aside.php'; ?>
            <?php if ( segment(0) == 'forum' ){ include 'part/forum-content1.php';  } ?>

