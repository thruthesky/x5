<?php
wp_enqueue_style('gallery', td() . '/css/front-gallery.css');
?>
<section class="gallery">
    <div>
        <h2><?php _e('Gallery', 'x5')?></h2>
        <div class="info text">
            <?php _e('
            Please meet our office staffs. Teachers, Managers and Technicians.
            With our qualified service, you will be statisfied with the lesson.
            If you want to see more about us, feel free to ask us more photos.
            ', 'x5') ?>
        </div>
        <div>
            <img src="<?php img_e() ?>gallery.png" >
        </div>
    </div>
</section>
