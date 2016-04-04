<?php
/**
 * @file functions.php
 */

/**
 * Load library
 */

if ( ! defined('ABC_LIBRARY') ) {
    echo "whizeng/functions.php: Activate ABC-Library";
    return;
}




/**
 *
 */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'style', td() . '/style.css' );
    wp_enqueue_style( 'base', td() . '/css/base.css' );
    wp_enqueue_style( 'layout', td() . '/css/layout.css' );
    wp_enqueue_style( 'module', td() . '/css/module.css' );
    wp_enqueue_style( 'module.header', td() . '/css/module.header.css' );
    wp_enqueue_style( 'module.content', td() . '/css/module.content.css' );
    wp_enqueue_style( 'module.aside', td() . '/css/module.aside.css' );
    wp_enqueue_style( 'module.data', td() . '/css/module.data.css' );
    wp_enqueue_style( 'module.footer', td() . '/css/module.footer.css' );
    wp_enqueue_style( 'state', td() . '/css/state.css' );
    wp_enqueue_style( 'state.header', td() . '/css/state.header.css' );
    wp_enqueue_style( 'theme', td() . '/css/theme.css' );
    wp_enqueue_style( 'register', td() . '/css/register.css' );



    wp_enqueue_script( 'theme', td() . '/js/theme.js', array('jquery') );

    wp_enqueue_style( 'my-slider-v3', td() . '/css/my-slider-v3.css' );
    wp_enqueue_script( 'my-slider-v3', td() . '/js/my-slider-v3.js', array('jquery') );

});



add_action('after_setup_theme', function () {
    if ( function_exists('remove_admin_bar') ) remove_admin_bar(true);
    load_theme_textdomain('whizeng', get_template_directory());
});



abc()->registerRoute(
    [
        'menu-all',
        'about-us',
        'level-test',
        'enrollment',
        'curriculum',
        'reservation',
        'teacher-list',
    ]
);


/**
 * @return array|mixed|object
 *

[idx] => 18070
[id] => Pia
[name] => Pia Joy Soriano
[nickname] => Manager Pia
[classid] => ontue.teacher.135
[url_youtube] => http://youtu.be/bXM3FP6iL1Q
[photo] => ./data/teacher/primary_photo_18070
[teaching_year] => 5
[birthday] => 19881121
[greeting] =>
Hello there!! ..This is Manager Pia.  If you have any problems in the class, I'm willing to help you.


[major] => Bachelor of Science in Nursing
[gender] => F
 */
function teacher_list() {
    $url = 'http://onlineenglish.kr/ajax.php?';
    $url .= 'id=' . user()->user_login;
    $url .= '&nickname=' . user()->nickname;
    $url .= '&name=' . user()->name;
    $url .= '&email=' . user()->user_email;
    $url .= '&mobile=' . user()->mobile;
    $url .= '&landline=' . user()->landline;
    $url .= '&classid=' . user()->skype;
    $url .= '&function=teacher_list';


    $cid = 'teacher-list' + time() ;
    $response = get_transient( $cid );
    if( false === $response ) {
        $response = wp_remote_get( $url );
        set_transient( $cid, $response, 60 * 60 ); // 1시간 동안 캐시
    }
    $body = json_decode( $response['body'], true );
    return $body;
}

function youtube_tag($url, $w=640, $h=390) {
    $arr = explode('/', $url);
    $id = end( $arr );
    return <<<EOH
    <iframe width="214" height="120" src="http://www.youtube.com/embed/$id?autohide=1&controls=0" border="0" scrolling="no"></iframe>
EOH;
}
function trim_greeting( $str ) {
    $str = stripslashes($str);
    $str = strip_tags($str);
    return $str;
}