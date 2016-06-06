<?php
wp_enqueue_script( 'log-in-content2', td() . '/js/log-in-content2.js', array('jquery'), false, true );
wp_enqueue_style('log-in-content2', td() . '/css/log-in-content2.css');

?>
<section class="log-in content-two">
    <div>
        <div class="inner">
            <?php if ( in('action') == 'lostpassword' ) { ?>
                <?php _e('Password reset link has been sent to your email.') ?>
            <?php } ?>
            <form action="<?php echo home_url('/user/loginSubmit')?>" method="POST">

                <?php wp_nonce_field('log-in'); ?>

                <fieldset class="form-group">
                    <div class="info user">
                        <label class="caption" for="user_login" hidden>User ID</label>
                        <span class="dashicons dashicons-admin-users"></span>
                        <div class="text"><input type="text" name="user_login" maxlength="64" id="user_login" tabindex="200" placeholder="Username"></div>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <div class="info password">
                        <label class="caption" for="user_pass" hidden>Password</label>
                        <span class="dashicons dashicons-admin-network"></span>
                        <div class="text"><input type="password" name="user_pass" maxlength="64" id="user_pass" tabindex="201" placeholder="Password"></div>
                    </div>
                </fieldset>

                <div class="lost-password-button">
                    <a href="<?php echo home_url('/user-password-lost')?>"><?php _text('Lost Password?')?></a>
                </div>

                <fieldset class="form-group">
                    <div class="info keep">
                        <div class="text"><input type="checkbox" name="rememberme" id="rememberme" tabindex="203">
                            <label class="caption" for="rememberme"><?php _text('Remember Me')?></label>
                        </div>
                    </div>
                </fieldset>


                <div class="line spinner" style="display:none;">
                    <i class="fa fa-spinner fa-spin"></i> Connecting to server ...
                </div>

                <div class="line error" style="display:none;"></div>

                <input class="btn btn-primary" type="submit" value="<?php _text('LOGIN')?>" tabindex="121">

            </form>

            <a class="register" href="<?php echo home_url('/user-register')?>"><?php _text('Create an Account')?></a>
        </div>
    </div>
</section>
