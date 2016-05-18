<?php
wp_enqueue_style('front-slider', td() . '/css/front-slider.css');
//wp_enqueue_script('front-slider', td() . '/js/front-slider.js');
?>
<section class="my-slider">
    <nav id="carousel-banner" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-banner" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-banner" data-slide-to="1"></li>
            <li data-target="#carousel-banner" data-slide-to="2"></li>
            <li data-target="#carousel-banner" data-slide-to="3"></li>
            <li data-target="#carousel-banner" data-slide-to="4"></li>
            <li data-target="#carousel-banner" data-slide-to="5"></li>
            <li data-target="#carousel-banner" data-slide-to="6"></li>
            <li data-target="#carousel-banner" data-slide-to="7"></li>
            <li data-target="#carousel-banner" data-slide-to="8"></li>
            <li data-target="#carousel-banner" data-slide-to="9"></li>
            <li data-target="#carousel-banner" data-slide-to="10"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="<?php img_e()?>/banner/banner_1.jpg" alt="First slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 1')?></h3>
                    <p><?php _text('Banner Description 1')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_2.jpg" alt="Second slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 2')?></h3>
                    <p><?php _text('Banner Description 2')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_3.jpg" alt="Third slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 3')?></h3>
                    <p><?php _text('Banner Description 3')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_4.jpg" alt="Fourth slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 4')?></h3>
                    <p><?php _text('Banner Description 4')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_5.jpg" alt="Fifth slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 5')?></h3>
                    <p><?php _text('Banner Description 5')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_6.jpg" alt="Fifth slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 6')?></h3>
                    <p><?php _text('Banner Description 6')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_7.jpg" alt="Fifth slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 7')?></h3>
                    <p><?php _text('Banner Description 7')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_8.jpg" alt="Fifth slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 8')?></h3>
                    <p><?php _text('Banner Description 8')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_9.jpg" alt="Fifth slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 9')?></h3>
                    <p><?php _text('Banner Description 9')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_10.jpg" alt="Fifth slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 10')?></h3>
                    <p><?php _text('Banner Description 10')?></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?php img_e()?>/banner/banner_11.jpg" alt="Fifth slide">
                <div class="carousel-caption">
                    <h3><?php _text('Banner Title 11')?></h3>
                    <p><?php _text('Banner Description 11')?></p>
                </div>
            </div>
        </div>
        <a class="left carousel-control" href="#carousel-banner" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-banner" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </nav>
</section>




