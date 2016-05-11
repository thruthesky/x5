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
</body>
</html>