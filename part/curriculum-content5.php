<?php
wp_enqueue_style('curriculum-content5', td() . '/css/curriculum-content5.css');
?>
<section class="curriculum content-five">
    <div>
        <h2><?php _text('Cur:B5:Banner Title')?></h2>
        <div class="desc">
            <?php _text('Cur:B5:Description will be place here. You can use HTML to decorate on the text.
            Try to use p, br, b, i tags. You can also input CSS and Javascript on this paragraph.')?>
        </div>
    </div>
</section>

<section class="curriculum extra">
    <div>
        <?php include "book-collection.php"; ?>
    </div>
</section>