<?php
wp_enqueue_style('enrollment-content2', td() . '/css/enrollment-content2.css');
?>


<section class="enrollment content-two">
    <div>
        <form action="">
            <h2>오늘 등록하고 무료 평가판을 얻을!</h2>
            <div class="content row">
                <div class="col-sm-4">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon1.png">
                        </div>
                        <div class="desc">
                            Minutes
                        </div>
                        <div class="radio">
                            <input type="radio" name="mins" value="20"> 20mins<br>
                            <input type="radio" name="mins" value="30"> 30mins (5% discount)<br>
                            <input type="radio" name="mins" value="40"> 40mins (10% discount)<br>
                            <input type="radio" name="mins" value="50"> 50mins (15% discount)
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon2.png">
                        </div>
                        <div class="desc">
                            Months
                        </div>
                        <div class="radio">
                            <input type="radio" name="month" value="1"> 1month<br>
                            <input type="radio" name="month" value="2"> 2months (5% discount)<br>
                            <input type="radio" name="month" value="3"> 3months (10% discount)
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cover">
                        <div class="picture">
                            <img src="<?php img_e() ?>enrollment-icon3.png">
                        </div>
                        <div class="desc">
                            Days
                        </div>
                        <div class="radio">
                            <input type="radio" name="mins" value="20"> Monday - Friday<br>
                            <input type="radio" name="mins" value="30"> Mon Wed Fri only<br>
                            <input type="radio" name="mins" value="40"> Tue Thu only
                        </div>
                    </div>
                </div>
            </div>
            <div class="summary">
                <div class="row">
                    <div class="result time col-sm-4">
                        <label>오늘 등록하고</label>
                        <label>20mins</label>
                    </div>
                    <div class="result month col-sm-4">
                        <label>오늘 등록하고</label>
                        <label>1months</label>
                    </div>
                    <div class="result day col-sm-4">
                        <label>오늘 등록하고</label>
                        <label>Monday-Friday</label>
                    </div>
                </div>
            </div>
            <nav>
                <div class="total">Total: 1,188,000</div>
                <div class="submit">ENROLL NOW</div>
            </nav>
        </form>
    </div>
</section>