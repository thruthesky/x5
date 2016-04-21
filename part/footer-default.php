<?php
wp_enqueue_style('footer-default', td() . '/css/footer-default.css');
?>
<div class="default-footer">
    <div class="logo-picture">
        <img class="logo" src="<?php opt('lms[logo]', img() . 'logo.jpg')?>">
        <div class="title"><?php opt('lms[company_name]')?></div>
    </div>
    <div class="footer-content">
        <strong>Representative</strong> Song JaeHo. <strong>Email</strong> thruthesky@gmail.com<br>
        <strong>Business Registration No.</strong> 106-02-98669<br>
        <strong>Address</strong> 2nd Floor Galang Wong Building.<br>
        Salome Rd. Balibago, Pampanga. <strong>Privacy Policy</strong>
    </div>
</div>