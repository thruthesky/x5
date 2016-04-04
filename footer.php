</section><!--/data-->
</section><!--/content-->



<footer>

    <div class="grid3"">
        <div class="content row footer-menu">
            <div class="col-sm-4">
                <div class="footer-list menus">
                    <div class="footer-list-title">
                        빠른메뉴
                    </div>
                    <ul>
                        <li><a href="#">홈</a></li>
                        <li><a href="#">인사말</a></li>
                        <li><a href="#">어린이영어</a></li>
                        <li><a href="#">기초 영어 회화</a></li>
                        <li><a href="#">비지니스 영어</a></li>
                        <li><a href="#">질문과 답변</a></li>
                        <li><a href="#">선생님 목록</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="footer-list address">
                    <div class="footer-list-title">
                        연락처
                    </div>

                    <div class="row">
                        <b>화상 센터</b>
                        2nd Floor Galang Wong Building,<br>
                        Salome Rd, Balibago<br>
                        Pampanga.
                    </div>
                    <div class="row">
                        <b>전화번호</b>
                        062-576-5010<br>
                    </div>
                    <div class="row">
                        <b>메일주소</b>
                        hanmun777@naver.com<br>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div id="contactUs" class="footer-list contact">
                    <div class="footer-list-title">
                        문의하기
                    </div>
                    <form class="contact-us" action="#">
                        <input type="text" name="name" placeholder="이름">
                        <input type="email" name="email" placeholder="이메일">
                        <input type="text" name="title" placeholder="제목">
                        <textarea name="content" placeholder="본문"></textarea>
                        <input type="submit" value="전송">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <?php option('lms', 'copyright', false)?>
    </div>
</footer>

</div><!--/layout-->




<?php wp_footer(); ?>
<script src="<?php tde()?>/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>