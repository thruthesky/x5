<?php if ( user()->login() ) : ?>
    <a href="<?php echo wp_logout_url( home_url() ); ?>">
        <span><?php _text('LOGOUT')?></span>
    </a>
<?php else : ?>
    <a href="<?php hd()?>user-register">
        <span><?php _text('REGISTER')?></span>
    </a>
<?php endif ?>