</section><!--/data-->
</section><!--/content-->
<footer>
    <div class="copyright">
        <?php if(get_opt('lms[copyright]', null, false)){
            echo nl2br(get_opt('lms[copyright]', null, false));
        }else {
            include 'part/footer-default.php';
        } ?>
    </div>
</footer>
</div><!--/layout-->

<?php wp_footer(); ?>
<script src="<?php tde()?>/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>