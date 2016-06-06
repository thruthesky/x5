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
    wp_enqueue_style( 'module.header', td() . '/css/module.header.css' );
    wp_enqueue_style( 'module.content', td() . '/css/module.content.css' );
    wp_enqueue_style( 'module.aside', td() . '/css/module.aside.css' );
    wp_enqueue_style( 'module.data', td() . '/css/module.data.css' );
    wp_enqueue_style( 'module.footer', td() . '/css/module.footer.css' );
    wp_enqueue_style( 'module.translate', td() . '/css/module.translate.css' );

    wp_enqueue_style( 'state', td() . '/css/state.css' );
    wp_enqueue_style( 'state.header', td() . '/css/state.header.css' );
    wp_enqueue_style( 'theme', td() . '/css/theme.css' );
    wp_enqueue_script( 'theme', td() . '/js/theme.js', array('jquery') );
    wp_enqueue_style( 'my-slider-v3', td() . '/css/my-slider-v3.css' );
    wp_enqueue_script( 'my-slider-v3', td() . '/js/my-slider-v3.js', array('jquery') );
    wp_enqueue_script( 'cookie',            td() . '/js/js.cookie.min.js', array('jquery') );
    wp_enqueue_script( 'translate',        td() . '/js/translate.js', array('jquery') );

    wp_enqueue_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css' );
    //wp_enqueue_script( 'tether', FORUM_URL . 'js/tether.min.js' );

    wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js', array(), false, true );


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
        'reservation',
        'past',
        'help',
        'feedback',
        'skype',
        've',
        'testing',
        'team-viewer',
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
