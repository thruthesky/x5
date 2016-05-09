<?php
wp_enqueue_style('info', td() . '/css/front-info.css');
?>
<section class="info container">
    <div class="row">
        <h2><?php _text('Title: Welcome to Our Company')?></h2>
        <div class="info text">
            <?php _text('Sub Title : Introduction of Company or Callcenter.')?>
            <br /><br />
            <?php _text('Description of Company or Callcenter. Please write more than 20 words.')?>
        </div>
        <div>
            <img src="<?php img_e() ?>info.png" >
        </div>
    </div>
</section>
