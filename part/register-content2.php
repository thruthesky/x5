<?php
wp_enqueue_style('register-content2', td() . '/css/register-content2.css');
wp_enqueue_script( 'register', td() . '/js/register.js', array('jquery') );
?>

<section class="register content-two">
    <div>
        <form action="<?php echo home_url('/user/registerSubmit')?>" method="POST">
            <?php wp_nonce_field('register'); ?>

            <input type="hidden" name="login" value="1">
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
                <label for="address"><?php _text('Address')?></label>
                <div class="text"><input type="text" name="address" maxlength="64" id="address" tabindex="101" placeholder="<?php _text('Address')?>" value="<?php echo user()->address?>"></div>
            </div>


            <div class="line">
                <label for="skype"><?php _text('Skype ID')?></label>
                <div class="text"><input type="text" name="skype" maxlength="64" id="skype" tabindex="101"  placeholder="<?php _text('Skype ID')?>" value="<?php echo user()->skype?>"></div>
            </div>

            <div class="line spinner" style="display:none;">
                <i class="fa fa-spinner fa-spin"></i> <?php _text('Connecting to server ...')?>
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
