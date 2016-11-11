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
        'manpower-register',
        'level-test-inquiry'
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
    di($path);
    if ( $path ) return $path;
    $menu_type = get_option('site_menu_type', 'A');
    $path = get_template_directory() . "/part/header-$menu_type.php";
    return $path;
}



/**
 * @param string $username
 * @param string $roomname
 */
function vc_url( $roomname = 'VC TEST Room' ) {
	if ( is_user_logged_in() ) {
		$domain = get_opt('lms[domain]', 'default');
		$user = wp_get_current_user();
		$username = $user->user_login;
		$roomname = "$username@$domain";
	}
	else {
	    if ( empty($username) ) $username = 'User' . date('is');
	}

    $roomname = str_replace('@', '.', $roomname);
    $roomname = urlencode($roomname);
    $url = "https://www.videocenter.co.kr/0.0.14/index.php?joinRoom=Y&username=$username&roomname=$roomname&show_header=Y";
    echo $url;
}

function get_og_tags_custom_page() {
    $og_siteName = get_bloginfo('name');
    $og_title = null;
    $og_permalink = null;
    $og_description = null;
    $og_image = null;

    if ( is_front_page() ) {
        $og_permalink = home_url();
        ob_start(); _text('- Welcome to our home page -'); $og_title = ob_get_clean();
        ob_start(); _text('- We are teaching English language that will surely enhance your english skills. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://localhost/wordpress/wp-content/themes/x5/img/info.jpg"); $og_image = ob_get_clean();
    }
    else if ( is_single() ) {
        $og_title = null;
    }
    else if ( seg(0)  == 'about-us') {
        $og_permalink = home_url('about-us');
        ob_start(); _text('- About Us -'); $og_title = ob_get_clean();
        ob_start(); _text('- We educate English Online. We aim to help your English skills and Guide you in developing your english knowledge. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/about-us-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'level-test') {
        $og_permalink = home_url('level-test');
        ob_start(); _text('- Level Test -'); $og_title = ob_get_clean();
        ob_start(); _text('- Lets Test your English skills and see will teach you what you still need. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/level-test-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'enrollment') {
        $og_permalink = home_url('enrollment');
        ob_start(); _text('- Enrollment -'); $og_title = ob_get_clean();
        ob_start(); _text('- Enroll now and meet our best teachers that will help you develop your english skills. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/enrollment-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'curriculum') {
        $og_permalink = home_url('curriculum');
        ob_start(); _text('- Curriculum -'); $og_title = ob_get_clean();
        ob_start(); _text('- In our curriculum we provide different selection of books that will help you learn and develop your english skill. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/curriculum-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'reservation') {
        $og_permalink = home_url('reservation');
        ob_start(); _text('- Reservation -'); $og_title = ob_get_clean();
        ob_start(); _text('- View your reservations and see your next class. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/reservation-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'teacher-list') {
        $og_permalink = home_url('teacher-list');
        ob_start(); _text('- Teacher -'); $og_title = ob_get_clean();
        ob_start(); _text('- Greetings, All the teaching are here to greet you. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/teacher-list-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'help') {
        $og_permalink = home_url('help');
        ob_start(); _text('- Help -'); $og_title = ob_get_clean();
        ob_start(); _text('- Looking for something? Check our help guide. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/help-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'feedback') {
        $og_permalink = home_url('feedback');
        ob_start(); _text('- Feedback -'); $og_title = ob_get_clean();
        ob_start(); _text('- Testimonials of our students that have learn from us -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/feedback-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'skype') {
        $og_permalink = home_url('skype');
        ob_start(); _text('- Skype -'); $og_title = ob_get_clean();
        ob_start(); _text('- Skype help guide. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/skype-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'testing') {
        $og_permalink = home_url('testing');
        ob_start(); _text('- Testing -'); $og_title = ob_get_clean();
        ob_start(); _text('- Test and check your video and audio Settings. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/testing-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'team-viewer') {
        $og_permalink = home_url('team-viewer');
        ob_start(); _text('- Team Viewer -'); $og_title = ob_get_clean();
        ob_start(); _text('- Team Viewer help guide. -'); $og_description = ob_get_clean();
        ob_start(); _text("http://www.withcenter.kr/wp-content/themes/x5/img/header/team-viewer-banner1.jpg"); $og_image = ob_get_clean();
    }
    else if ( seg(0)  == 'kakao') {
        $og_permalink = home_url('kakao');
        ob_start(); _text('- Kakao Talk -'); $og_title = ob_get_clean();
        ob_start(); _text('- Kakao Talk help guide. -'); $og_description = ob_get_clean();
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
        else {
            $og_image = get_stylesheet_directory_uri() . '/img/opengraph_default.jpg';
            echo<<<EOH
        <meta property="og:image" content="$og_image" />
EOH;
        }
    }
}




if ( isset($_REQUEST['ajax']) && $_REQUEST['ajax'] == 'level_test_inquiry' ) {

    $category = get_category_by_slug($_REQUEST['category']);
}


add_action('wp_ajax_level_test_inquiry', 'level_test_inquiry');
add_action('wp_ajax_nopriv_level_test_inquiry', 'level_test_inquiry');


function level_test_inquiry()
{
    if ( ! isset($_REQUEST['student_name']) || $_REQUEST['student_name'] == '' )
        wp_send_json_error(json_error( -12001, "Please provide Name"));
    if ( ! isset($_REQUEST['date']) || $_REQUEST['date'] == '' )
        wp_send_json_error(json_error( -12002, "Please Select Date"));
    if (( ! isset($_REQUEST['phone']) || $_REQUEST['phone'] == '' ) &&
        ( ! isset($_REQUEST['telephone']) || $_REQUEST['telephone'] == '' ))
        wp_send_json_error(json_error( -12003, "Please provide either phone number or telephone number"));

    $category = forum()->getCategory( 'level-test-inquiry' );
    $category_id = $category->term_id;
    
    if ( empty($post_arr) ) {
        $post_arr = array(
            'post_title'    => $_REQUEST['post_title'],
            'post_content'  => $_REQUEST['post_content'],
            'student_id'  => $_REQUEST['student_id'],
            'student_name'  => $_REQUEST['student_name'],
            'phone'  => $_REQUEST['phone'],
            'telephone'  => $_REQUEST['telephone'],
            'post_status'   => 'private',
            'post_author'   => wp_get_current_user()->ID,
            'post_category' => array( $category_id )
        );
    }
    $post_ID = wp_insert_post( $post_arr );
    if ( is_wp_error( $post_ID ) )wp_send_json_error(json_error( -12701, $post_ID->get_error_message() ));
    if ( $post_ID  == 0 ) wp_send_json_error(json_error( -12702, "Post may be empty."));

    /**
     * Save extra data
     * @note saves any data that was sent by web browser.
     * @warning Saving any data can cause a serious problem.
     */
    $meta = getPostMeta($_REQUEST);
    savePostMeta($post_ID, $meta);

    
    $p = get_post($post_ID);
    unset(
        $p->comment_status,
        $p->filter,
        $p->pinged,
        $p->menu_order,
        $p->ping_status,
        $p->post_content_filtered,
        $p->post_date_gmt,
        $p->post_excerpt,
        $p->post_mime_type,
        $p->post_modified,
        $p->post_modified_gmt,
        $p->post_name,
        $p->post_password,
        $p->post_status,
        $p->post_type,
        $p->to_ping
    );
    $p->meta = array_map( function( $a ){ return $a[0]; }, get_post_meta( $p->ID ) );
    
    wp_send_json_success([$p]);
}


/**
 * Returns an array of meta data after un-setting all the post fields.
 * @param $_req
 * @return mixed
 */
function getPostMeta( $_req )
{
    $m = $_req;
    unset( $m['ID'], $m['post_author'], $m['post_date'], $m['post_date_gmt'], $m['post_title'], $m['post_content'] );
    unset( $m['post_excerpt'], $m['post_status'], $m['post_comment_status'], $m['ping_status'], $m['post_password'] );
    unset( $m['post_name'], $m['to_ping'], $m['pinged'], $m['post_modified'], $m['post_modified_gmt'] );
    unset( $m['post_content_filtered'], $m['post_parent'], $m['guid'], $m['menu_order'], $m['post_type']);
    unset( $m['post_mime_type'], $m['comment_count']);
    return $m;
}

function savePostMeta($post_ID, $meta)
{
    foreach( $meta as $k => $v ) {
        add_post_meta( $post_ID, $k, $v, true);
    }
}


/**
 *
 * Unsets data that are not needed by client.
 *
 * @param $p
 * @return mixed
 */
function jsonPost( $p ) {
    unset(
        $p->comment_status,
        $p->filter,
        $p->pinged,
        $p->menu_order,
        $p->ping_status,
        $p->post_content_filtered,
        $p->post_date_gmt,
        $p->post_excerpt,
        $p->post_mime_type,
        $p->post_modified,
        $p->post_modified_gmt,
        $p->post_name,
        $p->post_password,
        $p->post_status,
        $p->post_type,
        $p->to_ping
    );
    $p->meta = array_map( function( $a ){ return $a[0]; }, get_post_meta( $p->ID ) );
    return $p;
}


function human_datetime( $date ) {
    $time = strtotime( $date );
    if ( date('Ymd') == date('Ymd', $time) ) return date("h:i a", $time);
    else return date("Y-m-d");
}



function get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {

    global $wpdb;

    if( empty( $key ) ) return null;

    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s' 
        AND p.post_status = '%s' 
        AND p.post_type = '%s'
    ", $key, $status, $type ) );

    return count($r);
}





















