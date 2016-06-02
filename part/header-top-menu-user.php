


<?php if ( user()->login() ) : ?>
    <?php if ( user()->admin() ) : ?>
        <li class="<?php if ( segment(0) == 'user-log-in' ) echo 'active'; ?>">
            <a href="<?php hd()?>wp-admin">
                <span><?php _e('ADMIN', 'x5')?></span>
            </a></li>
        <li><span class="site-edit"><?php _e('EDIT', 'x5')?></span></li>
    <?php else : ?>
        <li>
            <a href="<?php hd()?>user-update">
                <span><?php printf(__('%s PROFILE UPDATE', 'x5'), login('user_login'))?></span>
            </a>
        </li>
    <?php endif ?>
<?php else : ?>
    <li class="<?php if ( segment(0) == 'user-log-in' ) echo 'active'; ?>" >
        <a href="<?php hd()?>user-log-in">
            <span><?php _text('LOGIN')?></span>
        </a>
    </li>
<?php endif ?>


