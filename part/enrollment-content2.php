<?php
wp_enqueue_style('enrollment-content2', td() . '/css/enrollment-content2.css');
?>


<section class="enrollment content-two">
    <div>
        <form action="">
            <h2><?php _e('오늘 등록하고 무료 평가판을 얻을!', 'x5')?></h2>
            <div class="content row">
                <div class="col-sm-4">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon1.png">
                        </div>
                        <div class="desc">
                            <?php _e('Minutes', 'x5')?>
                        </div>
                        <div class="radio">
                            <input type="radio" name="mins" value="20"> <?php _e('20mins', 'x5')?><br>
                            <input type="radio" name="mins" value="30"> <?php _e('30mins (5% discount)', 'x5')?><br>
                            <input type="radio" name="mins" value="40"> <?php _e('40mins (10% discount)', 'x5')?><br>
                            <input type="radio" name="mins" value="50"> <?php _e('50mins (15% discount)', 'x5')?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon2.png">
                        </div>
                        <div class="desc">
                            <?php _e('Months', 'x5')?>
                        </div>
                        <div class="radio">
                            <input type="radio" name="month" value="1"> <?php _e('1month', 'x5')?><br>
                            <input type="radio" name="month" value="2"> <?php _e('2months (5% discount)', 'x5')?><br>
                            <input type="radio" name="month" value="3"> <?php _e('3months (10% discount)', 'x5')?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon3.png">
                        </div>
                        <div class="desc">
                            <?php _e('Days', 'x5')?>
                        </div>
                        <div class="radio">
                            <input type="radio" name="mins" value="20"> <?php _e('Monday - Friday', 'x5')?><br>
                            <input type="radio" name="mins" value="30"> <?php _e('Mon Wed Fri only', 'x5')?><br>
                            <input type="radio" name="mins" value="40"> <?php _e('Tue Thu only', 'x5')?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="summary">
                <div class="row">
                    <div class="result time col-sm-4">
                        <label><?php _e('오늘 등록하고', 'x5')?></label>
                        <label><?php _e('20mins', 'x5')?></label>
                    </div>
                    <div class="result month col-sm-4">
                        <label><?php _e('오늘 등록하고', 'x5')?></label>
                        <label><?php _e('1month', 'x5')?></label>
                    </div>
                    <div class="result day col-sm-4">
                        <label><?php _e('오늘 등록하고', 'x5')?></label>
                        <label><?php _e('Monday-Friday', 'x5')?></label>
                    </div>
                </div>
            </div>
            <nav>
                <div class="total"><?php _e('Total: 1,188,000', 'x5')?></div>
                <div class="submit"><?php _e('ENROLL NOW', 'x5')?></div>
            </nav>
        </form>
    </div>
</section>