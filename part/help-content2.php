<?php
wp_enqueue_style('help-content2', td() . '/css/help-content2.css');
wp_enqueue_script('help-content2', td() . '/js/help-content2.js');
?>
<section class="help content-two" >
    <div>

        <ul id="nav-link" class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#content-two"><i class="fa fa-angle-right nav-link" aria-hidden="true"></i> <?php _e('Company Information', 'x5')?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#content-three"><i class="fa fa-angle-right nav-link" aria-hidden="true"></i> <?php _e('Send an Inquiry', 'x5')?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#content-four"><i class="fa fa-angle-right nav-link" aria-hidden="true"></i> <?php _e('FAQs', 'x5')?></a>
            </li>
        </ul>
        <h2><?php _e('Company Information', 'x5')?></h2>
        <div class="company-picture">
            <img src="<?php img_e()?>/banner/home_slider1.jpg">
        </div>
        <div class="line">
            <div class="title"><?php _e('Address:', 'x5')?></div>
            <div class="desc"><?php _e('hlpC2-Address will be place here', 'x5')?></div>
        </div>
        <div class="line">
            <div class="title"><?php _e('Office Tel. No.:', 'x5')?></div>
            <div class="desc"><?php _e('hlpC2-Tel. No. will be place here', 'x5')?></div>
        </div>
        <div class="line">
            <div class="title"><?php _e('Email:', 'x5')?></div>
            <div class="desc"><?php _e('hlpC2-Email will be place here', 'x5')?></div>
        </div>
        <div class="line">
            <div class="title"><?php _e('Skype:', 'x5')?></div>
            <div class="desc"><?php _e('hlpC2-Skype ID will be place here', 'x5')?></div>
        </div>
        <div class="line">
            <div class="title"><?php _e('Kakao Talk:', 'x5')?></div>
            <div class="desc"><?php _e('hlpC2-Kakao ID will be place here', 'x5')?></div>
        </div>
        <div id="content-three"></div>
        <div class="line">
            <div class="title"><?php _e("Manager's Name", 'x5')?></div>
            <div class="desc"><?php _e("hlpC2-Manager's Name will be place here", 'x5')?></div>
        </div>
    </div>
</section>