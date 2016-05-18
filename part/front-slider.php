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




