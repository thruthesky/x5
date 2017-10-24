    <?php
wp_enqueue_style('log-in-content2', td() . '/css/user-password-lost-content2.css');
include 'part/log-in-content1.php';
?>



<section class="lost-password">
    <div>
        <h2>User password lost</h2>
        <form action="<?php echo home_url('/user-password-lost')?>" method="POST">
            <input type="hidden" name="redirect_to" value="<?php echo home_url('/log-in?action=lostpassword')?>">
            <div class="line">
                <label class="caption" for="user_login">User ID or Email</label>
                <div class="text"><input type="text" name="user_login" maxlength="64" id="user_login" tabindex="100"></div>
            </div>
            <div class="line submit">
                <div class="text"><input class="abc-button btn btn-primary" type="submit" value="Send me new password" tabindex="121"></div>
            </div>

            <div class="line cancel">
                <div class="text abc-button cancel"><a class="register btn btn-secondary" href="<?php echo home_url('/user-log-in')?>">Cancel</a></div>
            </div>



            <?php
            if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
                ob_start();
                include ABSPATH . '/wp-login.php';
                $output = ob_get_clean();
                $errors = retrieve_password();
                if ( is_wp_error($errors) ) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        <strong>Warning!</strong> <?php echo get_error_message($errors); ?>
                    </div>
                    <?php
                }
                else {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Oh snap!</strong> <?php _text('Password reset link has been sent to your email. Please check your email.'); ?>
                    </div>
                    <?php

                }
            }
            ?>
            <?php ?>
            <?php ?>
        </form>
    </div>
</section>

