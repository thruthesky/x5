<?php
wp_enqueue_style('book-collection', td() . '/css/book-collection.css');
wp_enqueue_script('front-book', td() . '/js/front-book.js');
?>
<div class="collection">
    <div class="row">
    <?php
    $path = img();
    $collection = '';
    for($x = 1; $x <= 44 ; $x++):
        ?>
        <div class="col-sm-3">
            <div class="inner row <?php if($x > 12) { echo 'load-sub'; } ?>">
                <img src="<?php echo $path .'book/curric-book'. $x .'.jpg' ?>">
                <div class="title"><?php _text("Home Book$x Title")?></div>
                <div class="desc">
                    <?php _text("Home Book$x Description")?>
                </div>
            </div>
        </div>
        <?php
    endfor;
    ?>
    </div>
    <nav class="load">
        <div class="load-more active">
           <?php _text('LOAD MORE')?>
        </div>
        <div class="load-less">
            <?php _text('SHOW LESS')?>
        </div>
    </nav>
</div>

