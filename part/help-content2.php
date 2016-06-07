<?php
wp_enqueue_style('help-content2', td() . '/css/help-content2.css');
wp_enqueue_script('help-content2', td() . '/js/help-content2.js');
?>
<section class="spy help content-two" >
    <div>
        <ul id="nav-link" class="nav">
            <li class="nav-item">
                <a class="nav-link" href="#content-two"> <?php _text('Company Information')?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#content-three"> <?php _text('Send an Inquiry')?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#content-four"> <?php _text('FAQs')?></a>
            </li>
        </ul>
        <h2><?php _text('Company Information' )?></h2>
        <div class="company-picture">
            <img src="<?php opt('lms[extra_image]', img() . 'company.jpg')?>">
        </div>
        <div class="line">
            <div class="title"><?php _text('Address:')?></div>
            <div class="desc"><?php _text('Hlp:B2-Address will be place here')?></div>
        </div>
        <div class="line">
            <div class="title"><?php _text('Office Tel. No.:')?></div>
            <div class="desc"><?php _text('Hlp:B2-Tel. No. will be place here')?></div>
        </div>
        <div class="line">
            <div class="title"><?php _text('Email:')?></div>
            <div class="desc"><?php _text('Hlp:B2-Email will be place here')?></div>
        </div>
        <div class="line">
            <div class="title"><?php _text('Skype:')?></div>
            <div class="desc"><?php _text('Hlp:B2-Skype ID will be place here')?></div>
        </div>
        <div class="line">
            <div class="title"><?php _text('Kakao Talk:')?></div>
            <div class="desc"><?php _text('Hlp:B2-Kakao ID will be place here')?></div>
        </div>
        <div id="content-three"></div>
        <div class="line">
            <div class="title"><?php _text("Manager's Name" )?></div>
            <div class="desc"><?php _text("Hlp:B2-Manager's Name will be place here")?></div>
        </div>
    </div>
</section>