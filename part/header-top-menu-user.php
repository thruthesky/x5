<?php if ( user()->login() ) : ?>
    <?php if ( user()->admin() ) : ?>
        <li class="<?php if ( segment(0) == 'user-log-in' ) echo 'active'; ?>">
            <a href="<?php hd()?>wp-admin">
                <span><?php _e('ADMIN', 'x5')?></span>
            </a></li>
        <li><span class="site-edit"><?php _text('EDIT')?></span></li>
        <li class="<?php if ( segment(0) == 'level-test-inquiry' ) echo 'active'; ?>">
                <a href="<?php hd()?>level-test-inquiry">
                    <span><?php _text('INQUIRY')?></span>
                </a>
        </li>
    <?php else : ?>
        <li>
            <a href="<?php hd()?>user-update">
                <span><?php echo login('user_login');?>
                    <?php _text("PROFILE UPDATE")?></span>
            </a>
        </li>
    <?php endif ?>
<?php else : ?>
    <li class="<?php if ( segment(0) == 'user-log-in' ) echo 'active'; ?>" >
        <a href="<?php hd()?>user-log-in">
            <span><?php _text("LOGIN")?></span>
        </a>
    </li>
<?php endif ?>


