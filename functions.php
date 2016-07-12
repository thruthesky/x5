<?php
/**
 * @file functions.php
 */

/**
 * Load library
 */

if ( ! defined('ABC_LIBRARY') ) {
    echo "x5/functions.php: Activate ABC-Library";
    return;
}


add_action( 'init', function() {

    //

    // add_theme_support('menus'); // how ticks do you waste by adding this line?

    if ( current_user_can('manage_options') ) {
        register_nav_menu('primary', 'Primary Header Navigation');
        register_nav_menu('secondary', 'Footer Navigation');
    }


});

if ( isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == 'header_top_menu_user' ) {

    ob_start();
    include 'part/header-top-menu-user.php';
    $user = ob_get_clean();
    ob_start();
    include 'part/header-top-menu-register-logout.php';
    $register = ob_get_clean();

    wp_send_json_success( ['user' => $user, 'register' => $register ] );
}


/*

add_action('init', function() {``
    add_rewrite_rule(
        '^forum/([a-zA-Z0-9\-]+)/?$',
        'index.php?category_name=$matches[1]',
        'top'
    );
    //add_rewrite_tag('%val%','([^/]*)');
    //flush_rewrite_rules();
});
*/
/**
 *
 */
add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'style', td() . '/style.css' );
    wp_enqueue_style( 'base', td() . '/css/base.css' );
    wp_enqueue_style( 'layout', td() . '/css/layout.css' );
    wp_enqueue_style( 'module', td() . '/css/module.css' );

    wp_enqueue_style( 'module.content', td() . '/css/module.content.css' );
    wp_enqueue_style( 'module.aside', td() . '/css/module.aside.css' );
    wp_enqueue_style( 'module.data', td() . '/css/module.data.css' );
    wp_enqueue_style( 'module.footer', td() . '/css/module.footer.css' );
    wp_enqueue_style( 'module.translate', td() . '/css/module.translate.css' );

    wp_enqueue_style( 'state', td() . '/css/state.css' );
    wp_enqueue_style( 'state.header', td() . '/css/state.header.css' );
    wp_enqueue_script( 'wp-util' );



    /** Pages that use bootstrap */
    if ( is_front_page() || seg(0) == 'reservation' || seg(0) == 'enrollment' || seg(0) == 'user-log-in' || seg(0) == 'user-register') {
        wp_enqueue_style( 'bootstrap', td() . '/css/bootstrap/css/bootstrap.min.css' );
        wp_enqueue_script( 'tether', td() . '/css/bootstrap/js/tether.min.js' );
        wp_enqueue_script( 'bootstrap', td() . '/css/bootstrap/js/bootstrap.min.js', array(), false, true );
    }

    wp_deregister_style('font-awesome');
    wp_enqueue_style( 'font-awesome', td() . '/css/font-awesome/css/font-awesome.min.css' );

    wp_enqueue_style( 'theme', td() . '/css/theme.css' );


    wp_enqueue_script( 'cookie',            td() . '/js/js.cookie.min.js', array('jquery') );
    wp_enqueue_script( 'translate',        td() . '/js/translate.js', array('jquery') );
    wp_enqueue_script( 'theme', td() . '/js/theme.js', array('jquery', 'underscore') );


});




add_action('after_setup_theme', function () {
    if ( function_exists('remove_admin_bar') ) remove_admin_bar(true);
    load_theme_textdomain('x5', get_template_directory());
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
        'past',
        'help',
        'feedback',
        'skype',
        've',
        'testing',
        'team-viewer',
        'kakao',
        'manpower-register'
    ]
);


function youtube_tag($url, $w=640, $h=390) {
    $arr = explode('/', $url);
    $id = end( $arr );
    return <<<EOH
    <div class="youtube" id="$id"></div>
EOH;

    // <iframe width="214" height="120" src="http://www.youtube.com/embed/$id?autohide=1&controls=0" border="0" scrolling="no"></iframe>
    //<iframe width="214" height="120" data-src="http://www.youtube.com/embed/$id?autohide=1&controls=0" border="0" scrolling="no"></iframe>
}
function trim_greeting( $str ) {
    $str = stripslashes($str);
    $str = strip_tags($str);
    $str = preg_replace("/\s|&nbsp;/",' ',$str);
    return $str;
}


if ( user()->admin() ) {
    if ( isset($_REQUEST['code'] ) && isset($_REQUEST['original_text']) ) {
        $_REQUEST['original_text'] = stripslashes($_REQUEST['original_text']);
        $_REQUEST['content'] = stripslashes($_REQUEST['content']);
        if ( empty( $_REQUEST['original_text'] ) ) $_REQUEST['original_text'] = '&nbsp;';
        $option_name = $_REQUEST['code'];

        delete_option( $option_name );
        add_option( $option_name, ['original_text' => $_REQUEST['original_text'], 'content' => $_REQUEST['content']] );

        wp_send_json_success($_REQUEST);
    }
}



function get_text_translation_option_name_prefix() {
    $domain = get_opt('lms[domain]', 'default');
    return 'translation-' . $domain . '-';
}

function get_text_translation_option_name($md5) {
    return get_text_translation_option_name_prefix() . $md5;
}


function _getText($str, $convert=false) {
    $md5 = md5($str);
    $option_name = get_text_translation_option_name( $md5 );
    $data = get_option( $option_name );
    $org = esc_html($str);
    if ( empty($data) ) $str = $org;
    else {
        $content = null;
        if ( isset($data['content']) ) $content = trim($data['content']);
        if ( empty($content) ) $str = $org;
        else $str = $data['content'];
    }

    if ( $convert ) {
	$str = convert_text_var( 'company name', 'company_name', $str );
	$str = convert_text_var( 'company address', 'company_address', $str );
	$str = convert_text_var( 'phone number', 'phone_number', $str );
	$str = convert_text_var( 'manager name', 'manager_name', $str );
	$str = convert_text_var( 'email', 'email', $str );
	$str = convert_text_var( 'skype', 'skype', $str );
	$str = convert_text_var( 'kakaotalk', 'kakaotalk', $str );
	$str = convert_text_var( 'bank', 'bank', $str );
    }


    return $str;
}
function convert_text_var($text_var, $option_name, $str) {
        if ( stripos( $str, "($text_var)") !== false ) {
            $v = get_opt("lms[$option_name]");
            $str = str_ireplace("($text_var)", $v, $str);
        }
	return $str;
}

/**
 * Admin can only edit the text. so it lets the admin to use css and javascript.
 * @param $str
 * @return void
 */
function _text($str) {
    $md5 = md5($str);
    $option_name = get_text_translation_option_name( $md5 );
    $org = esc_html($str);

    if ( !isset($_COOKIE['site-edit']) || $_COOKIE['site-edit'] != 'Y' || ! user()->admin() ) {
        $str = _getText($str, true);
        echo $str;
    }
    else {
        $str = _getText($str);
        echo "
<div class='translate-text' md5='$md5' original-text='$org' code='$option_name'><span class='dashicons dashicons-welcome-write-blog'></span>
<div class='html-content'>$str</div>
</div>
";
    }

}




add_action('admin_menu', function () {
    add_menu_page(
        __('X5 Theme Settings', 'x5'),
        __('X5 Theme', 'x5'),
        'manage_options',
        'x5_theme_settings', // slug id. 메뉴가 클릭되면 /wp-admin/philgo-usage 와 같이 slug 로 URL 경로가 나타남.
        'x5_admin_menu',
        'dashicons-text',
        '23.45'
    );
} );


function x5_admin_menu() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    include get_stylesheet_directory() . '/settings.php';
}


/**
 * @return string
 */
function get_domain_part_location( $part, $ext = 'php' ) {
    $domain = get_domain_name();
    $domain_header_path = get_template_directory() . "/part-domain/$part-$domain.$ext";
    if ( file_exists( $domain_header_path ) ) return $domain_header_path;
    return null;
}
function get_part_location( $part, $ext = 'php' ) {
    $path = get_domain_part_location( $part, $ext );
    if ( $path ) return $path;
    else return get_template_directory() . "/part/$part.$ext";
}

function get_header_location() {
    $path = get_domain_part_location( 'header' );
    if ( $path ) return $path;
    $menu_type = get_option('site_menu_type', 'A');
    $path = get_template_directory() . "/part/header-$menu_type.php";
    return $path;
}



/**
 * @param string $username
 * @param string $roomname
 */
function vc_url( $username = '', $roomname = 'VC TEST Room' ) {
    $roomname = urlencode($roomname);
    if ( empty($username) ) $username = 'User' . date('is');
    $url = "https://www.videocenter.co.kr/0.0.14/index.php?joinRoom=Y&username=$username&roomname=$roomname";
    echo $url;
}

function get_og_tags_custom_page() {
    $og_siteName = get_bloginfo('name');
    $og_title = null;
    $og_permalink = null;
    $og_description = null;
    $og_image = null;

    if ( is_front_page() ) {
        $og_permalink = $home_url = home_url();
        ob_start(); _text('Front Page OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Front Page OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://localhost/wordpress/wp-content/themes/x5/img/info.jpg"); $og_image = ob_get_clean();
    }
    else if ( is_single() ) {
        $og_title = esc_attr(get_the_title());
        $og_permalink = get_the_permalink();
        $og_description = esc_attr( forum()->getCategory()->description) ;
        $og_image = '';
    }
    else if ( seg(0)  == 'about-us') {
        $og_permalink = home_url('about-us');
        ob_start(); _text('About Us OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('About Us OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/about-us-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'level-test') {
        $og_permalink = home_url('level-test');
        ob_start(); _text('Level Test OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Level Test OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/level-test-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'enrollment') {
        $og_permalink = home_url('enrollment');
        ob_start(); _text('Enrollment OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Enrollment OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/enrollment-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'curriculum') {
        $og_permalink = home_url('curriculum');
        ob_start(); _text('Curriculum OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Curriculum OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/curriculum-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'reservation') {
        $og_permalink = home_url('reservation');
        ob_start(); _text('Reservation OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Reservation OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/reservation-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'teacher-list') {
        $og_permalink = home_url('teacher-list');
        ob_start(); _text('Teacher List OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Teacher List OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/teacher-list-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'help') {
        $og_permalink = home_url('help');
        ob_start(); _text('Help OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Help OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/help-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'feedback') {
        $og_permalink = home_url('feedback');
        ob_start(); _text('Feedback OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Feedback OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/feedback-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'skype') {
        $og_permalink = home_url('skype');
        ob_start(); _text('Skype OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Skype OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/skype-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'testing') {
        $og_permalink = home_url('testing');
        ob_start(); _text('Testing OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Testing OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/testing-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'team-viewer') {
        $og_permalink = home_url('team-viewer');
        ob_start(); _text('Team Viewer OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Team Viewer OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/team-viewer-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'kakao') {
        $og_permalink = home_url('kakao');
        ob_start(); _text('Kakao OG Title -'); $og_title = ob_get_clean();
        ob_start(); _text('Kakao OG Description.'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/kakao-banner1.jpg"); $og_image = ob_get_clean();
    }
    else {
        
    }
    if ( $og_title ) {
        echo <<<EOH
        <meta property="og:title" content="$og_title $og_siteName" />
        <meta property="og:url" content="$og_permalink" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="$og_description" />
        <meta property="og:site_name" content="$og_siteName" />
EOH;
        if ( $og_image ) {
            echo<<<EOH
        <meta property="og:image" content="$og_image" />
EOH;
        }
    }
}

