<?php




//
$api_endpoint = 'http://philgo.org/?api=blog';
$api_id = 'philzine';
$api_password = 'asdf99';

$api_endpoint = 'http://work.org/wordpress/xmlrpc.php';
$api_id = 'admin';
$api_password = '1111';



require_once FORUM_PATH . 'etc/xmlrpc/Autoloader.php';
\PhpXmlRpc\Autoloader::register();
use PhpXmlRpc\Value;
use PhpXmlRpc\Request;
use PhpXmlRpc\Client;



$client = new Client( $api_endpoint );
$request = new Request('blogger.getUsersBlogs',
    array(
        new Value( md5('key') , "string"),
        new Value( $api_id , "string"),
        new Value( $api_password , "string")
    )
);
$response = $client->send( $request );


if ( $response->faultCode() ) {
    print "Fault <BR>";
    print "Code: " . htmlentities($response->faultCode()) . "<BR>" .
        "Reason: '" . htmlentities($response->faultString()) . "'<BR>";
}
else {
    echo 'Success<hr>';
    // di($response->val); Response 클래스의 바로 아래에 Value 클래스 객체가 들어가 있다.
    foreach ( $response->val as $valueArrays ) {
        foreach ( $valueArrays as $values ) {
            foreach ( $values as $value ) {
                di( $value );
            }
        }
    }

    echo "<hr>";

    di($response->val[0]->me['struct']);
    di($response->val[0]->me['struct']['isAdmin']->me['boolean']);
    di($response->val[0]->me['struct']['url']->me['string']);
    di($response->val[0]->me['struct']['blogid']->me['string']);
    di($response->val[0]->me['struct']['blogName']->me['string']);
    di($response->val[0]->me['struct']['xmlrpc']->me['string']);

}


exit;

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head();?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <script>
        var home_url = "<?php echo home_url()?>";
    </script>
</head>


<body
    <?php body_class( is_front_page() ? 'front' : '' ); ?>
    <?php if ( segment(0) == 'curriculum' ) echo 'data-spy="scroll" data-target="#nav-link"'; ?>
>



<div class="layout">
    <header>
        <div class="header-inner">
            <?php

            ?>
            <div class="logo">
                <a href="<?php echo home_url()?>">
                    <img src="<?php opt('lms[logo]', img() . 'logo.jpg')?>">
                    <div class="title"><?php opt('lms[company_name]')?></div>
                </a>
            </div>
            <nav class="top-menu">
                <ul>
                    <li>
                        <a class="icon" >
                        <span class="dashicons dashicons-menu menu-icon"></span>
                        </a>
                    </li>
                    <li>
                        <?php if ( user()->login() ) : ?>
                            <?php if ( user()->admin() ) : ?>
                                <a href="<?php hd()?>wp-admin">
                                    <span><?php _e('ADMIN', 'x5')?></span>
                                </a>
                            <?php else : ?>
                                <a href="<?php hd()?>user-update">
                                    <span><?php _e('PROFILE UPDATE', 'x5')?></span>
                                </a>
                            <?php endif ?>
                        <?php else : ?>
                            <a href="<?php hd()?>user-log-in">
                                <span><?php _e('LOGIN', 'x5')?></span>
                            </a>
                        <?php endif ?>
                    </li>
                    <li>
                        <?php if ( user()->login() ) : ?>
                            <a href="<?php echo wp_logout_url( home_url() ); ?>">
                                <span><?php _e('LOGOUT', 'x5')?></span>
                            </a>
                        <?php else : ?>
                            <a href="<?php hd()?>user-register">
                                <span><?php _e('REGISTER', 'x5')?></span>
                            </a>
                        <?php endif ?>
                    </li>
                    <li>
                        <a href="<?php hd()?>menu-all">
                            <span><?php _e('ALL MENU', 'x5')?></span>
                        </a>
                    </li>
                </ul>
            </nav>
            <nav class="menu">
                <ul>
                    <li>
                        <div><a href="<?php hd()?>about-us"><?php _e('About  Us', 'x5')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>level-test"><?php _e('Level Test', 'x5')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>enrollment"><?php _e('Enrollment', 'x5')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>curriculum"><?php _e('Curriculum', 'x5')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>reservation"><?php _e('Reservation', 'x5')?></a></div>
                    </li>
                    <li>
                        <div><a href="<?php hd()?>forum/qna"><?php _e('QnA', 'x5')?></a></div>
                    </li>
                    <li class="close">
                        <div><a href="#"><?php _e('Close', 'x5')?></a></div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="content">



        <section class="data">
            <?php include 'part/aside.php'; ?>
