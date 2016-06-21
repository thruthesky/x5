<?php
wp_enqueue_style('under_construction', td() . '/css/under_construction.css');
?>
<section class="under_construction" style="background: url('<?php img_e() ?>/etc/um_bg.jpg')">
    <div>
        <h2>Maintenance Mode</h2>
        <div class="desc"><?php _text("This page is currently undergoing construction/ development. Sorry for the inconvience.") ?></div>

        <div class="row">
            <div class="col-sm-4"><img src="<?php img_e() ?>/etc/um_skype.png" >
                <span class="title"><?php _text("Skype...") ?></span>
                <span class="sub-title"><?php _text("Skype ID...") ?></span>
            </div>
            <div class="col-sm-4"><img src="<?php img_e() ?>/etc/um_kakao.png" >
                <span class="title"><?php _text("Kakao Talk...") ?></span>
                <span class="sub-title"><?php _text("Kakao ID...") ?></span>
            </div>
            <div class="col-sm-4"><img src="<?php img_e() ?>/etc/um_phone.png" >
                <span class="title"><?php _text("Customer Service...") ?></span>
                <span class="sub-title"><?php _text("Customer Service Hotline...") ?></span>
            </div>
        </div>
    </div>
</section>