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
    wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js' );

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
    <iframe width="214" height="120" src="http://www.youtube.com/embed/$id?autohide=1&controls=0" border="0" scrolling="no"></iframe>
EOH;
}
function trim_greeting( $str ) {
    $str = stripslashes($str);
    $str = strip_tags($str);
    return $str;
}



if ( user()->admin() ) {
    if ( isset($_GET['code'] ) && isset($_GET['original_text']) ) {
        $org = $_GET['original_text'];
        $content = stripslashes($_GET['content']);
	if ( empty($content) ) $content = '&nbsp;';
        $option_name = $_GET['code'];
        //di($option_name);

        delete_option( $option_name );
        add_option( $option_name, ['original_text' => $org, 'content' => $content] );

        /*
        wp_send_json_success([
            'original_text' => $org,
            'content' => $content,
        ]);
        exit;
        */
    }
}


/**
 * Admin can only edit the text. so it lets the admin to use css and javascript.
 * @param $str
 * @return void
 */
function _text($str) {
    $md5 = md5($str);
    $domain = get_opt('lms[domain]', 'default');
    $option_name = 'translation-' . $domain . '-' . $md5;
    $data = get_option( $option_name );
    $org = esc_html($str);
    if ( empty($data) ) $str = $org;
    else {
        $content = trim($data['content']);
        if ( empty($content) ) $str = $org;
        else $str = $data['content'];
    }

    if ( !isset($_COOKIE['site-edit']) || $_COOKIE['site-edit'] != 'Y' || ! user()->admin() ) {
        echo $str;
    }
    else {
        echo "
<div class='translate-text' md5='$md5' original-text='$org' code='$option_name'><span class='dashicons dashicons-welcome-write-blog'></span>
<div class='html-content'>$str</div>
</div>
";
    }

}

