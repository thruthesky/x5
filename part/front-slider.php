<?php
wp_enqueue_style('front-slider', td() . '/css/front-slider.css');
wp_enqueue_script('front-slider', td() . '/js/front-slider.js');
?>
<div class="my-slider">
    <nav>
        <img src="<?php img_e()?>/banner/top_arrow_left.png">
        <img src="<?php img_e()?>/banner/top_arrow_right.png">
    </nav>
    <ul>
        <li>
            <img src="<?php img_e()?>/banner/banner_1.jpg">
            <div class="text-info one">
                <div class="inner">
                    <div class="wrapper">
                        <div class="text top"><?php opt('lms[banner_1_title]')?></div><br>
                        <div class="text bottom"><?php opt('lms[banner_1_content]')?></div>
                        <div class="text more"><a href="/introduction/1"><?php opt('lms[banner_1_more]')?><div class="triangle"></div></a></div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="<?php img_e()?>/banner/banner_2.jpg">
            <div class="text-info two">
                <div class="inner">
                    <div class="wrapper">
                        <div class="text-items">
                            <div class="text top"><?php opt('lms[banner_2_title]')?></div>
                            <div class="text bottom"><?php opt('lms[banner_2_content]')?></div>
                            <div class="text more"><a href="/introduction/3"><?php opt('lms[banner_2_more]')?><div class="triangle"></div></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="<?php img_e()?>/banner/banner_3.jpg">
            <div class="text-info three">
                <div class="inner">
                    <div class="wrapper">
                        <div class="text top">잉글리쉬월드의 자랑. 최고의 화상영어 선생님과 알찬 수업 과정.</div><br>
                        <div class="text bottom">품격, 자질, 교육 !! 모든 면에서 뛰어난 잉글리쉬월드 화상 콜센터 선생님을 만나보세요.</div><br>
                        <div class="text more"><a href="/ve?page=teacher_list">자세히 보기<div class="triangle"></div></a></div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="<?php img_e()?>/banner/banner_4.jpg">
            <div class="text-info four">
                <div class="inner">
                    <div class="wrapper">
                        <div class="text top">영어는 암기가 아닌 생활 습관! 지겨운 공부는 시간 낭비!</div><br>
                        <div class="text bottom">잉글리쉬월드 화상영어로 진정한 배움의 시간을 가지세요.</div><br>
                        <div class="text more"><a href="/junior/1">무료 체험 설명</a></div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <img src="<?php img_e()?>/banner/banner_5.jpg">
            <div class="text-info five">
                <div class="inner">
                    <div class="wrapper">
                        <div class="text top">2015년 주니어 겨울 영어 캠프</div><br>
                        <div class="text bottom">즐거운 방학, 파인스 영어와 함께 영어 정복을 할 주니어 학생을 모집합니다.</div><br>
                        <div class="text more"><a href="http://pineseg.com/pinesjr/event_camp.html" target="_blank">자세히 보기<div class="triangle"></div></a></div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>


