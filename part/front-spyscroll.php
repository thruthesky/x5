<?php
wp_enqueue_style('front-spyscroll', td() . '/css/front-spyscroll.css');
wp_enqueue_script('front-spyscroll', td() . '/js/front-spyscroll.js');
?>

<nav class="scroll-menu">
    <ul id="nav-link" class="nav">
        <li class="nav-item"><a class="nav-link" href="#info"><?php _text("Welcome") ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#desc"><?php _text("Why Choose Us?") ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#gallery"><?php _text("Gallery") ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#book"><?php _text("Books") ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#testimonial"><?php _text("Feedback") ?></a></li>
        <li class="nav-item"><a class="nav-link" href="#icon-menu"><?php _text("More") ?></a></li>
    </ul>
</nav>
