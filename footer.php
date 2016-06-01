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
<!-- JS Holder -->
<?php wp_footer(); ?>


</body>
</html>
<?php

$html = ob_get_clean();

//<link rel='stylesheet' id='forum-basic-css'  href='http://work.org/wordpress/wp-content/plugins/k-forum/css/forum-basic.css?ver=4.4.3' type='text/css' media='all' />

// css
preg_match_all("/<link.*href=.*(\/wp\-)(.*\.css)[^>]+>/", $html, $ms);

if ( $ms[2] ) {
    $styles = $ms[2];
    $css = null;
    for( $i = 0; $i < count($styles); $i ++ ) {
        $path = 'wp-' . $styles[$i];
        $tag = $ms[0][$i];
        $css .= file_get_contents($path) . "\n";
        $html = str_replace( $tag, '', $html );
    }
}



// vars
$cache_path = 'wp-content/uploads/cache-x';
$cache_dir = ABSPATH . $cache_path;
$route = seg(0) ? seg(0) : 'front-page';

// default code
if ( ! is_dir($cache_dir) ) mkdir( $cache_dir );


// save only if files ( or css ) has been changed.
//
$md5 = md5($css);
$cache_file = $cache_dir . "/$route-$md5.css";
if ( ! file_exists($cache_file) ) {
    $files = $cache_dir . "/$route-*.css";
    foreach( glob($cache_dir . "/$route-*.css" ) as $file ) {
        @unlink( $file );
    }
    file_put_contents($cache_file, $css);
    //echo 'uncached...';
}
$cache_url = home_url() . "/$cache_path/$route-$md5.css";

$html = str_replace("</head>", "<link rel='stylesheet' href='$cache_url'></head>", $html);



preg_match_all("/<script.*src=.*\/(wp\-includes|wp\-content)(.*.js).+>/", $html, $ms);
if ( $ms[1] ) {
    $tags = $ms[0];
    $js = null;
    for( $i = 0; $i < count( $tags ); $i ++ ) {
        $tag = $tags[$i];
        $path = $ms[1][$i] . $ms[2][$i];
        $js .= file_get_contents($path) . "\n";
        $html = str_replace( $tag, '', $html );
    }
}
$md5 = md5($js);
$cache_file = $cache_dir . "/$route-$md5.js";
if ( ! file_exists($cache_file) ) {
    $files = $cache_dir . "/$route-*.js";
    foreach( glob($cache_dir . "/$route-*.js" ) as $file ) {
        @unlink( $file );
    }
    file_put_contents( $cache_file, $js);
    //echo 'uncached...';
}
$cache_url = home_url() . "/$cache_path/$route-$md5.js";

$html = str_replace("<!-- JS Holder -->", "<script src='$cache_url'></script></body>", $html);

echo $html;


