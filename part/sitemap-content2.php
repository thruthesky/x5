<?php
wp_enqueue_style('sitemap-content2', td() . '/css/sitemap-content2.css');
?>
<section class="sitemap content-two">
    <div>
        <div class="row">
            <div class="col-sm-4">
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-login.jpg">
                    <div class="text login"><a href="<?php echo home_url()?>/user-log-in">Login</a></div>
                </div>
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-aboutus.jpg">
                    <div class="text all"><a href="<?php echo home_url()?>/about-us">About Us</a></div>
                </div>
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-curriculum.jpg">
                    <div class="text all"><a href="<?php echo home_url()?>/curriculum">Curriculum</a></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-register.jpg">
                    <div class="text register"><a href="<?php echo home_url()?>/user-register">Register</a></div>
                </div>
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-leveltest.jpg">
                    <div class="text all"><a href="<?php echo home_url()?>/level-test">Level Test</a></div>
                </div>
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-reservation.jpg">
                    <div class="text all"><a href="<?php echo home_url()?>/reservation">Reservation</a></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-help.jpg">
                    <div class="text help "><a href="<?php echo home_url()?>/help">Help</a></div>
                </div>
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-enrollment.jpg">
                    <div class="text all"><a href="<?php echo home_url()?>/enrollment">Enrollment</a></div>
                </div>
                <div class="cover">
                    <img src="<?php img_e() ?>sitemap-icon-qna.jpg">
                    <div class="text all"><a href="<?php echo home_url()?>/forum/qna">QnA</a></div>
                </div>
            </div>
        </div>

    </div>
</section>

<!--p>Profile Update / Logout<br>
    About us, Level Test, Enrollment, Curriculum, Reservation,
    <a href="<?php hd()?>forum/qna"><?php _e('QnA', 'x5')?></a>,
    <a href="<?php hd()?>forum/discussion"><?php _e('Discussion', 'x5')?></a>,

    <br>

    <a href="<?php hd()?>teacher-list">Teacher List</a><br>
    <a href="<?php hd()?>reservation">Reservation</a><br>
    <a href="<?php hd()?>past">Past Class</a><br>
    </p-->