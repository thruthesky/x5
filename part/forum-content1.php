<?php
wp_enqueue_style('forum-content1', td() . '/css/forum-content1.css');
wp_enqueue_style('banner-header', td() . '/css/banner-header.css');
?>

<section class="forum-content-one content-one">
    <img src="<?php img_e() ?>header/forum-banner1.jpg">
    <div>
        <div class="banner">
            <h2><?php _text('Forum')?></h2>
            <div class="desc">
                <?php _text('Frm:B1:Banner Description will be place here')?>
            </div>
        </div>
    </div>
</section>