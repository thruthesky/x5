<?php
wp_enqueue_style('info', td() . '/css/front-info.css');
?>
<section id="info" class="spy info container">
    <div class="row">
        <h2><?php _text('Title: Welcome to Our Company')?></h2>
        <div class="info text">
            <?php _text('Sub Title : Introduction of Company or Callcenter. You can use HTML to decorate on the text.')?>
            <br /><br />
            <?php _text('Description of Company or Callcenter. You can use HTML to decorate on the text.
            Try to use p, br, b, i tags. You can also input CSS and Javascript on this paragraph.')?>
        </div>
        <div>
            <img src="<?php img_e() ?>info.png" >
        </div>
    </div>
</section>
