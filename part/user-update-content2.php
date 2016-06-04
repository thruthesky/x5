<?php
wp_enqueue_script( 'user-update', td() . '/js/user-update.js', array('jquery') );
wp_enqueue_style('user-update-content2', td() . '/css/user-update-content2.css');
?>
<section class="user-update content-two">
    <div>
        <form action="<?php echo home_url('/user/updateSubmit')?>" method="POST">
            <?php wp_nonce_field('register'); ?>

            <div class="line">
                <label for="user_login"><?php _text('User ID')?></label>
                <div class="text user-login">
                    <?php echo user()->user_login?>
                </div>
            </div>


            <div class="line">
                <label for="user_pass"><?php _text('Password')?></label>
                <div class="change-pwd"><span class="dashicons dashicons-admin-network"></span> <?php _text('Change Password...')?></div>
                <div class="text" style="display:none;">
                    <input type="password" name="user_pass" maxlength="64" id="user_pass" tabindex="101" placeholder="Input password ...">
                </div>
            </div>

            <div class="line">
                <label for="user_email"><?php _text('Email')?></label>
                <div class="text"><input type="email" name="user_email" maxlength="64" id="user_email" tabindex="101" value="<?php echo user()->user_email?>"></div>
            </div>


            <div class="line">
                <label for="nickname"><?php _text('Nickname')?></label>
                <div class="text"><input type="text" name="nickname" maxlength="64" id="nickname" tabindex="101" value="<?php echo user()->nickname?>"></div>
            </div>



            <div class="line">
                <label for="name"><?php _text('Name')?></label>
                <div class="text"><input type="text" name="name" maxlength="64" id="name" tabindex="101" value="<?php echo user()->name?>"></div>
            </div>


            <div class="line">
                <label for="mobile"><?php _text('Mobile No.')?></label>
                <div class="text"><input type="number" name="mobile" maxlength="64" id="mobile" tabindex="101" value="<?php echo user()->mobile?>"></div>
            </div>

            <div class="line">
                <label for="landline"><?php _text('Landline No.')?></label>
                <div class="text"><input type="number" name="landline" maxlength="64" id="landline" tabindex="101" value="<?php echo user()->landline?>"></div>
            </div>

            <div class="line">
                <label for="address"><?php _text('Address')?></label>
                <div class="text"><input type="text" name="address" maxlength="64" id="address" tabindex="101" value="<?php echo user()->address?>"></div>
            </div>


            <div class="line">
                <label for="skype"><?php _text('Skype')?></label>
                <div class="text"><input type="text" name="skype" maxlength="64" id="skype" tabindex="101" value="<?php echo user()->skype?>"></div>
            </div>

            <div class="line spinner" style="display:none;">
                <i class="fa fa-spinner fa-spin"></i> Connecting to server ...
            </div>
            <div class="line error" style="display:none;">
            </div>
            <div class="line submit">
                <div class="text"><input type="submit" tabindex="121" value="<?php _text('MEMBER UPDATE')?>"></div>
            </div>
        </form>
    </div>
</section>
