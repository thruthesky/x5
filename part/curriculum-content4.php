<?php
wp_enqueue_style('curriculum-content4', td() . '/css/curriculum-content4.css');
?>
<section class="curriculum content-four">
    <div>
        <h2><?php _e('Curriculum Key', 'x5')?></h2>
        <div class="desc">
            <?php _e('Curr-C4 Description will be place here. You can use HTML to decorate on the text.
             Try to use p, br, b, i tags. You can also input CSS and Javascript on this paragraph.', 'x5')?>
        </div>

        <div class="info">
            <div class="key">
                <img src="<?php img_e() ?>curriculum_key.png">
            </div>
            <div class="career level">
                <div class="title"><?php _e('Career', 'x5')?></div>
                <div class="desc"><?php _e('Curr-C4 Description on Career', 'x5')?></div>
            </div>
            <div class="resume level">
                <div class="title"><?php _e('Resume', 'x5')?></div>
                <div class="desc"><?php _e('Curr-C4 Description on Resume', 'x5')?></div>
            </div>
            <div class="preparation level">
                <div class="title"><?php _e('Preparation', 'x5')?></div>
                <div class="desc"><?php _e('Curr-C4 Description on Preparation', 'x5')?></div>
            </div>
            <div class="interview level">
                <div class="title"><?php _e('Interview', 'x5')?></div>
                <div class="desc"><?php _e('Curr-C4 Description on Interview', 'x5')?></div>
            </div>
            <div class="role-play level">
                <div class="title"><?php _e('Role Play', 'x5')?></div>
                <div class="desc"><?php _e('Curr-C4 Description on Role Play', 'x5')?></div>
            </div>
            <div class="organization level">
                <div class="title"><?php _e('Organization', 'x5')?></div>
                <div class="desc"><?php _e('Curr-C4 Description on Organization', 'x5')?></div>
            </div>
        </div>
    </div>
</section>