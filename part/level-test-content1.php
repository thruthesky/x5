<?php
wp_enqueue_style('level-test-content1', td() . '/css/level-test-content1.css');
?>
<section class="level-test content-one">
    <div>
        <h2><?php _e('Lvl-C1 Banner Title', 'x5')?></h2>
        <div class="desc"><?php _e('Lvl-C1 Banner Description will be place here.<br>
         You can use HTML to decorate on the text. Try to use p, br, b, i tags. You can also input<br>
         CSS and Javascript on this paragraph.', 'x5')?>
        </div>
        <div class="trial button"><a><?php _e('Start Free Trial Now', 'x5')?></a></div>
    </div>
</section>