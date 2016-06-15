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
	<title>굿톡</title>
<meta name="description" content="굿톡 www.igoodtalk.com - 세상에서 가장 쉬운 화상영어. 굿톡!" />
</head>


<body <?php body_class( is_front_page() ? 'front' : '' ); ?> >

<div class="layout">
    <header>
        <?php include get_header_location(); ?>
    </header>

    <section class="content">



        <section class="data">
            <?php if ( segment(0) == 'forum' ){ include 'part/forum-content1.php';  } ?>
            <?php include 'part/aside.php'; ?>
