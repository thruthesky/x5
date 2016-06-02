<?php
wp_enqueue_style('book', td() . '/css/front-book.css');
?>
<a name="book"></a>
<section class="spy book" style="background: url('<?php img_e() ?>/book_bg.jpg') #ededed no-repeat;">
    <div>
        <div class="info text">
            <?php _text('title: Our Books')?>
        </div>
        <br />
        <div class="more text">
            <a href="<?php echo home_url()?>/curriculum"><?php _text('LEARN MORE')?></a>
        </div>
        <?php include "book-collection.php"; ?>
    </div>
</section>
