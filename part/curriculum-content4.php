<?php
wp_enqueue_style('curriculum-content4', td() . '/css/curriculum-content4.css');
?>
<section class="curriculum content-four">
    <div>
        <h2><?php _text('Cur:B4:Title')?></h2>
        <div class="desc">
            <?php _text('Cur:B4:Description will be place here. You can use HTML to decorate on the text.
             Try to use p, br, b, i tags. You can also input CSS and Javascript on this paragraph.')?>
        </div>

        <div class="info">
            <div class="key">
                <img src="<?php img_e() ?>curriculum_key.png">
            </div>
            <div class="career level">
                <div class="title"><?php _text('Career')?></div>
                <div class="desc"><?php _text('Cur:B4:Description on Career')?></div>
            </div>
            <div class="resume level">
                <div class="title"><?php _text('Resume')?></div>
                <div class="desc"><?php _text('Cur:B4:Description on Resume')?></div>
            </div>
            <div class="preparation level">
                <div class="title"><?php _text('Preparation')?></div>
                <div class="desc"><?php _text('Cur:B4:Description on Preparation')?></div>
            </div>
            <div class="interview level">
                <div class="title"><?php _text('Interview')?></div>
                <div class="desc"><?php _text('Cur:B4:Description on Interview')?></div>
            </div>
            <div class="role-play level">
                <div class="title"><?php _text('Role Play')?></div>
                <div class="desc"><?php _text('Cur:B4:Description on Role Play')?></div>
            </div>
            <div class="organization level">
                <div class="title"><?php _text('Organization')?></div>
                <div class="desc"><?php _text('Cur:B4:Description on Organization')?></div>
            </div>
        </div>
    </div>
</section>