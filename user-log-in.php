<?php
wp_enqueue_script( 'log-in', td() . '/js/log-in.js', array('jquery'), false, true );
wp_enqueue_style('info', td() . '/css/log-in.css');

?>


<h2>Page/Login</h2>
<?php if ( in('action') == 'lostpassword' ) { ?>
    <?php _e('Password reset link has been sent to your email.') ?>
<?php } ?>
<section class="log-in">
    <form action="<?php echo home_url('/user/loginSubmit')?>" method="POST">

        <?php wp_nonce_field('log-in'); ?>

        <fieldset class="form-group">
            <label class="caption" for="user_login">User ID</label>
            <div class="text"><input type="text" name="user_login" maxlength="64" id="user_login" tabindex="100"></div>
        </fieldset>

        <fieldset class="form-group">
            <label class="caption" for="user_pass">Password</label>
            <div class="text"><input type="password" name="user_pass" maxlength="64" id="user_pass" tabindex="101"></div>
        </fieldset>

        <fieldset class="form-group">
            <div class="text"><input type="checkbox" name="rememberme" id="rememberme" tabindex="101"></div>
            <label class="caption" for="rememberme">Keep me logged in</label>
        </fieldset>


        <div class="line spinner" style="display:none;">
            <i class="fa fa-spinner fa-spin"></i> Connecting to server ...
        </div>

        <div class="line error" style="display:none;"></div>

        <input class="btn btn-primary" type="submit" value="Log In" tabindex="121">

    </form>


    <div class="lost-password-button">
        <a href="<?php echo home_url('/user-password-lost')?>">Lost Password?</a>
    </div>

    <a href="<?php echo home_url('/user-register')?>">Register</a>
</section>
