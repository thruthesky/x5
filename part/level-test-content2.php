<?php
wp_enqueue_style('level-test-content2', td() . '/css/level-test-content2.css');
?>


<section class="level-test content-two">
    <hr>
    <div>

        <h2><?php _text('"Level Test Page" : \'Block 2\' : Title')?></h2>

        <div class="content row">
            <div class="col-sm-4">
                <div class="cover">
                    <div>
                        <div class="level one">
                            <h4><?php _e('Step', 'x5')?></h4>
                            <p><?php _e('1', 'x5')?></p>
                        </div>
                    </div>
                    <div class="desc">
                        <?php _e('Lvl-C2 Step 1 Description Here', 'x5')?>
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
                            <h4><?php _e('Step', 'x5')?></h4>
                            <p><?php _e('2', 'x5')?></p>
                        </div>
                    </div>
                    <div class="desc">
                        <?php _e('Lvl-C2 Step 2 Description Here', 'x5')?>
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
                            <h4><?php _e('Step', 'x5')?></h4>
                            <p><?php _e('3', 'x5')?></p>
                        </div>
                    </div>
                    <div class="desc">
                        <?php _e('Lvl-C2 Step 3 Description Here', 'x5')?>
                    </div>
                    <div class="picture">
                        <img src="<?php img_e() ?>level_test_thumb3.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>