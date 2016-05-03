<?php
wp_enqueue_style('about-us-content2', td() . '/css/about-us-content2.css');
?>
<section class="about-us content-two">
    <div>
        <h2><?php _e('Abt-C2 Content 1 Description will be place here.
        You can use HTML to decorate on the text. Try to use p, br, b, i tags.
        You can also input CSS and Javascript on this paragraph.', 'x5')?></h2>
        <h3><?php _e('Abt-C2 Content 2 Description will be place here.
        You can use HTML to decorate on the text. Try to use p, br, b, i tags.
        You can also input CSS and Javascript on this paragraph.', 'x5')?></h3>
        <div class="content row">
            <div class="col-sm-4">
                <div class="cover">
                    <div class="picture">
                        <img src="<?php img_e() ?>about_us_content3_img1.png">
                    </div>
                    <div class="desc">
                        <?php _e('Abt-C2 Image 1 Description', 'x5')?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="cover">
                    <div class="picture">
                        <img src="<?php img_e() ?>about_us_content3_img2.png">
                    </div>
                    <div class="desc">
                        <?php _e('Abt-C2 Image 2 Description', 'x5')?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="cover">
                    <div class="picture">
                        <img src="<?php img_e() ?>about_us_content3_img3.png">
                    </div>
                    <div class="desc">
                        <?php _e('Abt-C2 Image 3 Description', 'x5')?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="bot row">
            <div class="col-sm-6">
                <div class="bot-desc">
                    <?php _e('Abt-C2 Bottom 1 Description will be place here', 'x5')?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="bot-desc">
                    <?php _e('Abt-C2 Bottom 2 Description will be place here', 'x5')?>
                </div>
            </div>
        </div>
    </div>
</section>