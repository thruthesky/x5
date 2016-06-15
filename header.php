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
</head>


<body <?php body_class( is_front_page() ? 'front' : '' ); ?> >

<div class="layout">
    <header>
        <?php include get_part_location( 'header' ); ?>
    </header>

    <section class="content">



        <section class="data">
            <?php if ( segment(0) == 'forum' ){ include 'part/forum-content1.php';  } ?>
            <?php include 'part/aside.php'; ?>
