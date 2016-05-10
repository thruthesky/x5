<?php
wp_enqueue_style('level-test-content2', td() . '/css/level-test-content2.css');
?>


<section class="level-test content-two">
    <div>
        <h2><?php _text('Lv:B2:Title')?></h2>
        <div class="content row">
            <div class="col-sm-4">
                <div class="cover">
                    <div>
                        <div class="level one">
                            <h4><?php _text('Step')?></h4>
                            <h5><?php _text('1')?></h5>
                        </div>
                    </div>
                    <div class="desc">
                        <?php _text('Lv:B2:Step 1 Description will be place here. You can use HTML to decorate on the text.')?>
                    </div>
                    <div class="picture">
                        <img src="<?php img_e() ?>level_test_thumb1.png">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="cover">
                    <div>
                        <div class="level two">
                            <h4><?php _text('Step')?></h4>
                            <h5><?php _text('2')?></h5>
                        </div>
                    </div>
                    <div class="desc">
                        <?php _text('Lv:B2:Step 2 Description will be place here. You can use HTML to decorate on the text.')?>
                    </div>
                    <div class="picture">
                        <img src="<?php img_e() ?>level_test_thumb2.png">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="cover">
                    <div>
                        <div class="level three">
                            <h4><?php _text('Step')?></h4>
                            <h5><?php _text('3')?></h5>
                        </div>
                    </div>
                    <div class="desc">
                        <?php _text('Lv:B2:Step 3 Description will be place here. You can use HTML to decorate on the text.')?>
                    </div>
                    <div class="picture">
                        <img src="<?php img_e() ?>level_test_thumb3.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>