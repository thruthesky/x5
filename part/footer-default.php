<?php
wp_enqueue_style('footer-default', td() . '/css/footer-default.css');
?>
<div class="default-footer">
    <div class="logo-picture">
        <img class="logo" src="<?php opt('lms[logo]', img() . 'logo.jpg')?>">
        <div class="title"><?php _text('Company Name')?></div>
    </div>
    <div class="footer-content">
        <?php _text('Representative Song JaeHo. Email thruthesky@gmail.com')?><br>
        <?php _text('Registration No. 106-02-98669') ?><br>
        <?php _text('Address 2nd Floor Galang Wong Building.') ?><br>
        <?php _text('Salome Rd. Balibago, Pampanga. Privacy Policy') ?>
    </div>
</div>