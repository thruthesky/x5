<?php
wp_enqueue_style('enrollment-content2', td() . '/css/enrollment-content2.css');
function _check_value($n, $v) {
    if ( isset($_REQUEST[$n]) ) {
        if ( $_REQUEST[$n] == $v ) {
            echo ' checked="1"';
        }
    }
}
?>
<script>
    var form_action = "<?php echo home_url()?>/enrollment?mode=form_elements_submit";
    function form_elements_submit() {
        $("form[name='frmAGS_pay']").prop('action', form_action);
        document.forms['frmAGS_pay'].submit();
    }
</script>
<section class="enrollment content-two">
    <div>
        <form name=frmAGS_pay method=post action="<?php echo home_url()?>/enrollment?mode=AGS_pay_ing">
            <h2><?php _text('Enr:B2:Title')?></h2>

            <?php
            if ( isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'form_elements_submit' ) include __LMS_PATH__ . 'payment-gateway/allthegate/form_elements_submit.php';
            ?>
            <div class="content row">
                <div class="col-sm-3">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon1.png">
                        </div>
                        <div class="desc">
                            <?php _text('Minutes')?>
                        </div>
                        <div class="radio">
                            <div class="text">
                                <label for="min_25">
                                    <input id="min_25" type="radio" name="min" value="25"<?php _check_value('min', '25'); ?>>
                                    <?php _text('25mins 120,000 won')?>
                                </label>
                            </div>
                            <div class="text">
                                <input id="min_50" type="radio" name="min" value="50"<?php _check_value('min', '50'); ?>>
                                <label for="min_50"><?php _text('50mins (5% discount) 230,000 won')?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon2.png">
                        </div>
                        <div class="desc">
                            <?php _text('How To Pay')?>
                        </div>
                        <div class="radio">
                            <div class="text"><input type="radio" name="method" value="onlycardselfnormal"<?php _check_value('method', 'onlycardselfnormal'); ?>> <?php _text('credit card')?></div>
                            <div class="text"><input type="radio" name="method" value="onlyicheselfnormal"<?php _check_value('method', 'onlyicheselfnormal'); ?>> <?php _text('online banking')?></div>
                            <div class="text"><input type="radio" name="method" value="onlyvirtualselfnormal"<?php _check_value('method', 'onlyvirtualselfnormal'); ?>> <?php _text('offline banking')?></div>
                            <div class="text"><input type="radio" name="method" value="auto_credit"<?php _check_value('method', 'auto_credit'); ?>> <?php _text('auto credit ( 20% discount )')?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon3.png">
                        </div>
                        <div class="desc">
                            <?php _text('Days')?>
                        </div>
                        <div class="radio">
                            <div class="text"><input type="radio" name="days" value="1" checked> <?php _text('5 days')?></div>
                            <div class="text"><input type="radio" name="days" value="2"> <?php _text('4 days ( 5% discount )')?></div>
                            <div class="text"><input type="radio" name="days" value="3"> <?php _text('3 days ( 10% discount )')?></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon4.png">
                        </div>
                        <div class="desc">
                            <?php _text('Curriculum')?>
                        </div>
                        <div class="radio">
                            <div class="text"><input type="radio" name="curriculum" value="1" checked> <?php _text('Curriculum1')?></div>
                            <div class="text"><input type="radio" name="curriculum" value="2"> <?php _text('Curriculum2')?></div>
                            <div class="text"><input type="radio" name="curriculum" value="3"> <?php _text('Curriculum3')?></div>
                            <div class="text"><input type="radio" name="curriculum" value="4"> <?php _text('Curriculum4')?></div>
                            <div class="text"><input type="radio" name="curriculum" value="5"> <?php _text('Curriculum5')?></div>
                            <div class="text"><input type="radio" name="curriculum" value="6"> <?php _text('Curriculum6')?></div>
                            <div class="text"><input type="radio" name="curriculum" value="7"> <?php _text('Curriculum7')?></div>
                            <div class="text"><input type="radio" name="curriculum" value="8"> <?php _text('Curriculum8')?></div>
                            <div class="text"><input type="radio" name="curriculum" value="9"> <?php _text('Curriculum9')?></div>
                        </div>

                    </div>
                </div>
            </div>
            <div>
                Notice: When auto credit selected, discounted amount will be returned after a month. Detail description.
            </div>
            <div class="summary">
                <div class="row">
                    <div class="result time col-sm-4">
			time select result and price
                    </div>
                    <div class="result month col-sm-4">
                        <label><?php _text('Enr:B2:Selected Month')?></label>
                        <label><?php _text('1month')?></label>
                    </div>
                    <div class="result day col-sm-4">
                        <label><?php _text('Enr:B2:Selected Day')?></label>
                        <label><?php _text('Monday-Friday')?></label>
                    </div>
                </div>
            </div>
            <nav>
                <div class="total"><?php _text('Total')?>: 1,188,000</div>
                <div class="submit" onclick="form_elements_submit();"><?php _text('Enr:B2:ENROLL NOW')?></div>
            </nav>
        </form>
    </div>
</section>
