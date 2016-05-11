<?php
wp_enqueue_style('gallery', td() . '/css/front-gallery.css');
?>
<a name="gallery"></a>
<section class="spy gallery">
    <div>
        <h2><?php _text('Gallery')?></h2>
        <div class="info text">
            <?php _text('
            Please meet our office staffs. Teachers, Managers and Technicians.
            With our qualified service, you will be statisfied with the lesson.
            If you want to see more about us, feel free to ask us more photos.') ?>
        </div>
        <div>
            <img src="<?php img_e() ?>gallery.png" >
        </div>
    </div>
</section>
