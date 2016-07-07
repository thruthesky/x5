<?php
wp_enqueue_style('register-content2', td() . '/css/register-content2.css');
wp_enqueue_script( 'register', td() . '/js/register.js', array('jquery') );
?>

<section class="register content-two">
    <div>
        <form action="<?php echo home_url('/user/registerSubmit')?>" method="POST">
            <?php wp_nonce_field('register'); ?>

            <input type="hidden" name="login" value="1">
            <div class="header-detail"><?php _text("YOUR DETAILS") ?></div>
            <div class="col-sm-6 left">
            <div class="line">
                <label for="user_login"><?php _text('User ID')?></label>
                <div class="text">
                    <input type="text" name="user_login" maxlength="64" id="user_login" tabindex="101" placeholder="<?php _text('User ID')?>">
                </div>
            </div>

            <div class="line">
                <label for="user_pass"><?php _text('Password')?></label>
                <div class="text">
                    <input type="password" name="user_pass" maxlength="64" id="user_pass" tabindex="101" placeholder="<?php _text('Input password ...')?>">
                </div>
            </div>

            <div class="line">
                <label for="user_email"><?php _text('Email')?></label>
                <div class="text"><input type="email" name="user_email" maxlength="64" id="user_email" tabindex="101" placeholder="<?php _text('Email Address')?>" value="<?php echo user()->user_email?>"></div>
            </div>

            <div class="line">
                <label for="nickname"><?php _text('Nickname')?></label>
                <div class="text"><input type="text" name="nickname" maxlength="64" id="nickname" tabindex="101" placeholder="<?php _text('Nickname')?>" value="<?php echo user()->nickname?>"></div>
            </div>
            </div>
            <div class="col-sm-6 right">
            <div class="line">
                <label for="name"><?php _text('Name')?></label>
                <div class="text"><input type="text" name="name" maxlength="64" id="name" tabindex="101" placeholder="<?php _text('Name')?>" value="<?php echo user()->name?>"></div>
            </div>

            <div class="line">
                <label for="mobile"><?php _text('Mobile Number')?></label>
                <div class="text"><input type="number" name="mobile" maxlength="64" id="mobile" tabindex="101" placeholder="<?php _text('Mobile number')?>" value="<?php echo user()->mobile?>"></div>
            </div>

            <div class="line">
                <label for="landline"><?php _text('Landline Number')?></label>
                <div class="text"><input type="number" name="landline" maxlength="64" id="landline" tabindex="101" placeholder="<?php _text('Landline number')?>" value="<?php echo user()->landline?>"></div>
            </div>

            <div class="line">
                <label for="skype"><?php _text('Skype ID')?></label>
                <div class="text"><input type="text" name="skype" maxlength="64" id="skype" tabindex="101"  placeholder="<?php _text('Skype ID')?>" value="<?php echo user()->skype?>"></div>
            </div>

            </div>
            <div class="agree-line">

                <label for="agree">
                <input type="checkbox" id="agree" name="agree" value="Y" message="<?php _text("agree terms of service if you want to register")?>">
                <?php _text('If you agree to the terms of our service, check this box.')?>
                </label>
                <span class="agree-detail" data-toggle="modal" data-target="#myModal">
                <?php _text("For more detail of terms of service")?>
                </span>

                <?php /* 회원 가입 시 회원 약관 및 개인정보 수집·이용·서비스 제공을 위한 개인정보 취급 위탁에 대하여 동의하신 것으로 간주됩니다. 내용 상세보기 */ ?>




                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
                            </div>
                            <div class="modal-body">
                                <div class="title"><?php _text("Membership of Condition: title")?></div>
                                <div style="padding: 1em; box-sizing:border-box; border: 1px solid #dfdfdf; height: 10em; overflow-y: scroll;">
                                    <?php _text("membership of condition: description")?>
                                </div>

                                <div class="title"><?php _text("Privacy: title")?></div>
                                <div style="padding: 1em; box-sizing:border-box; border: 1px solid #dfdfdf; height: 10em; overflow-y: scroll;">
                                    <?php _text("privacy: description")?>
                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <div class="line spinner" style="display:none;">
                <img src="<?php echo td() . '/img/gif-loader'?>/loader1.gif">
                <?php _text('Connecting to server ...')?>
            </div>




            <div class="line error alert alert-warning" role="alert" style="display:none;">
            </div>
            <div class="button">
                <div class="text submit"><input type="submit" tabindex="121" value="<?php _text('REGISTER')?>"></div>
            </div>
            <div class="button right">
                <div class="text cancel"><input type="button" onClick="location.href='<?php echo home_url()?>'" tabindex="121" value="<?php _text('Cancel')?>"></div>
            </div>
        </form>
    </div>
</section>
