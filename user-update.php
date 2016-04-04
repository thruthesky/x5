<?php
wp_enqueue_script( 'user-update', td() . '/js/user-update.js', array('jquery') );
?>
<h2>Profile Update</h2>
<section class="user-update">
    <form action="<?php echo home_url('/user/updateSubmit')?>" method="POST">
        <?php wp_nonce_field('register'); ?>

        <div class="line">
            <label for="user_login">User ID</label>
            <div class="text">
                <?php echo user()->user_login?>
            </div>
        </div>


        <div class="line">
            <label for="user_pass"><i class="fa fa-lock"></i> Do you want to change password?</label>
            <div class="text" style="display:none;">
                <input type="password" name="user_pass" maxlength="64" id="user_pass" tabindex="101" placeholder="Input password ...">
            </div>
        </div>

        <div class="line">
            <label for="user_email">Email</label>
            <div class="text"><input type="email" name="user_email" maxlength="64" id="user_email" tabindex="101" value="<?php echo user()->user_email?>"></div>
        </div>


        <div class="line">
            <label for="nickname">Nickname</label>
            <div class="text"><input type="text" name="nickname" maxlength="64" id="nickname" tabindex="101" value="<?php echo user()->nickname?>"></div>
        </div>



        <div class="line">
            <label for="name">Name</label>
            <div class="text"><input type="text" name="name" maxlength="64" id="name" tabindex="101" value="<?php echo user()->name?>"></div>
        </div>


        <div class="line">
            <label for="mobile">Mobile No.</label>
            <div class="text"><input type="number" name="mobile" maxlength="64" id="mobile" tabindex="101" value="<?php echo user()->mobile?>"></div>
        </div>

        <div class="line">
            <label for="landline">Landline No.</label>
            <div class="text"><input type="number" name="landline" maxlength="64" id="landline" tabindex="101" value="<?php echo user()->landline?>"></div>
        </div>

        <div class="line">
            <label for="address">Address</label>
            <div class="text"><input type="text" name="address" maxlength="64" id="address" tabindex="101" value="<?php echo user()->address?>"></div>
        </div>


        <div class="line">
            <label for="skype">skype</label>
            <div class="text"><input type="text" name="skype" maxlength="64" id="skype" tabindex="101" value="<?php echo user()->skype?>"></div>
        </div>

        <div class="line">
            <label for="kakao">Kakao</label>
            <div class="text"><input type="text" name="kakao" maxlength="64" id="kakao" tabindex="101" value="<?php echo user()->kakao?>"></div>
        </div>

        <div class="line spinner" style="display:none;">
            <i class="fa fa-spinner fa-spin"></i> Connecting to server ...
        </div>
        <div class="line error" style="display:none;">
        </div>
        <div class="line submit">
            <div class="text"><input type="submit" tabindex="121"></div>
        </div>
    </form>
</section>