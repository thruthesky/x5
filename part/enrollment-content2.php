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

    //var form_action = "<?php echo home_url()?>/enrollment?mode=form_elements_submit";
    function form_elements_submit() {
        //  $("form[name='frmAGS_pay']").prop('action', form_action);
        document.forms['payment'].submit();
    }

    window.addEventListener('load',function(){
        $(function(){
            document.forms['payment'].submit();
        });
        $('form[name="payment"]').change(function(){
            $(this).submit();
            if ( $('#auto_credit').prop('checked') ) {
                $('.auto-credit-desc').show();
            }
            else {
                $('.auto-credit-desc').hide();
            }
        });
        $('form [name="amount_input"]').keyup(function(){
            $('form[name="payment"]').submit();
        });
    });


</script>
<section class="enrollment content-two">
    <div>
        <form name="payment" action="<?php echo home_url()?>/enrollment" target="hiframe_payment">
            <input type="hidden" name="layout" value="no">
            <input type="hidden" name="mode" value="AGS_pay">
            <div class="content row">
                <div class="col-sm-3">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon1.png">
                        </div>
                        <div class="desc">
                            <?php _text('Minutes')?>
                        </div>
                        <div class="items">
                            <label for="min_25" class="text">
                                <input id="min_25" type="radio" name="amount" value="120000"<?php _check_value('amount', '120000'); ?>>
                                <?php _text('25mins 120,000 won')?>
                            </label>
                            <label for="min_50" class="text">
                                <input id="min_50" type="radio" name="amount" value="230000"<?php _check_value('amount', '230000'); ?>>

                                <?php _text('50mins (5% discount) 230,000 won')?>
                            </label>

                            <?php _text('or')?>


                            <label for="input-amount" class="input-amount-text">
                                <?php _text('Input payment amount')?>
                            </label>

                            <input id="input-amount" type="text" name="amount_input" value="6000" size="6">
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
                        <div class="items">
                            <label for="onlycardselfnormal" class="text">
                                <input id="onlycardselfnormal" type="radio" name="method" value="onlycardselfnormal"<?php _check_value('method', 'onlycardselfnormal'); ?>>
                                <?php _text('credit card')?>
                            </label>
                            <label for="onlyicheselfnormal" class="text">
                                <input id="onlyicheselfnormal" type="radio" name="method" value="onlyicheselfnormal"<?php _check_value('method', 'onlyicheselfnormal'); ?>>
                                <?php _text('online banking')?>
                            </label>
                            <label for="onlyvirtualselfnormal" class="text">
                                <input id="onlyvirtualselfnormal" type="radio" name="method" value="onlyvirtualselfnormal"<?php _check_value('method', 'onlyvirtualselfnormal'); ?>>
                                <?php _text('offline banking')?>
                            </label>
                            <label for="auto_credit" class="text">
                                <input id="auto_credit" type="radio" name="method" value="auto_credit"<?php _check_value('method', 'auto_credit'); ?>>
                                <?php _text('auto credit ( 20% discount )')?>
                            </label>
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
                        <div class="items">
                            <label for="day_5" class="text">
                                <input id="day_5" type="radio" name="days" value="1" checked>
                                <?php _text('5 days')?>
                            </label>
                            <label for="day_4" class="text">
                                <input id="day_4" type="radio" name="days" value="2">
                                <?php _text('4 days ( 5% discount )')?>
                            </label>
                            <label for="day_3" class="text">
                                <input id="day_3" type="radio" name="days" value="3">
                                <?php _text('3 days ( 10% discount )')?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 curriculum">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon4.png">
                        </div>
                        <div class="desc">
                            <?php _text('Discounted Curriculum')?>
                        </div>
                        <div class="items">

                            <label for="Curriculum1" class="text">
                                <input id="Curriculum1" type="radio" name="curriculum" value="0" checked>
                                <?php _text('Curriculum1')?>
                            </label>


                            <label for="Curriculum2" class="text">
                                <input id="Curriculum2" type="radio" name="curriculum" value="0">
                                <?php _text('Curriculum2')?>
                            </label>
                            <label for="Curriculum3" class="text">
                                <input id="Curriculum3" type="radio" name="curriculum" value="0">
                                <?php _text('Curriculum3')?>
                            </label>

                            <label for="Curriculum4" class="text">
                                <input id="Curriculum4" type="radio" name="curriculum" value="0" checked>
                                <?php _text('Curriculum4')?>
                            </label>
                            <label for="Curriculum5" class="text">
                                <input id="Curriculum5" type="radio" name="curriculum" value="0" checked>
                                <?php _text('Curriculum5')?>
                            </label>
                            <label for="Curriculum6" class="text">
                                <input id="Curriculum6" type="radio" name="curriculum" value="0" checked>
                                <?php _text('Curriculum6')?>
                            </label>
                            <label for="Curriculum7" class="text">
                                <input id="Curriculum7" type="radio" name="curriculum" value="0" checked>
                                <?php _text('Curriculum7')?>
                            </label>
                            <label for="Curriculum8" class="text">
                                <input id="Curriculum8" type="radio" name="curriculum" value="0" checked>
                                <?php _text('Curriculum8')?>
                            </label>
                            <label for="Curriculum9" class="text">
                                <input id="Curriculum9" type="radio" name="curriculum" value="10" checked>
                                <?php _text('10% OFF')?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="auto-credit-desc" style="display:none;">
                <?php _text('Notice: When auto credit selected, discounted amount will be returned after a month.')?>
            </div>

                <iframe name="hiframe_payment" width="100%" height="500" src="javascript:'';" border="0" frameborder="0" scrolling="no"></iframe>

        </form>
    </div>
</section>
