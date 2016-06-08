<?php
wp_enqueue_style('enrollment-content2', td() . '/css/enrollment-content2.css');
?>


<section class="enrollment content-two">
    <div>
        <form action="">
            <h2><?php _text('Enr:B2:Title')?></h2>
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
                            <div class="text"><input type="radio" name="min" value="25" checked> <?php _text('25mins 120,000 won')?></div>
                            <div class="text"><input type="radio" name="min" value="50"> <?php _text('50mins (5% discount) 230,000 won')?></div>
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
                            <div class="text"><input type="radio" name="month" value="1" checked> <?php _text('credit card')?></div>
                            <div class="text"><input type="radio" name="month" value="1" checked> <?php _text('online banking')?></div>
                            <div class="text"><input type="radio" name="month" value="1" checked> <?php _text('offline banking')?></div>
                            <div class="text"><input type="radio" name="month" value="1" checked> <?php _text('paypal')?></div>
                            <div class="text"><input type="radio" name="month" value="1" checked> <?php _text('auto credit ( 20% discount )')?></div>
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
                            <div class="text"><input type="radio" name="day" value="Monday - Friday" checked> <?php _text('5 days')?></div>
                            <div class="text"><input type="radio" name="day" value="Mon Wed Fri only"> <?php _text('4 days ( 5% discount )')?></div>
                            <div class="text"><input type="radio" name="day" value="Tue Thu only"> <?php _text('3 days ( 10% discount )')?></div>
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
                            <div class="text"><input type="radio" name="day" value="1" checked> <?php _text('Curriculum1')?></div>
                            <div class="text"><input type="radio" name="day" value="2"> <?php _text('Curriculum2')?></div>
                            <div class="text"><input type="radio" name="day" value="3"> <?php _text('Curriculum3')?></div>
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
                <div class="submit"><?php _text('Enr:B2:ENROLL NOW')?></div>
            </nav>
        </form>
    </div>
</section>
