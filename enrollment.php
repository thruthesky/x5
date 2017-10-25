<?php
/**
 * @file enrollment.php
 * @note The route "/enrollment" has get_header() and get_footer() already.
 * 		So, if you are going to use (load) script here,  it will have header.php / footer.php
 */





if ( isset( $_REQUEST['mode'] ) ) {
    if ( $_REQUEST['mode'] == "AGS_pay_ing" ) {
        include ALLTHEGATE_DIR . 'AGS_pay_ing.php';
    }
    else if ( $_REQUEST['mode'] == "AGS_pay_result" ) {
        //include ALLTHEGATE_DIR . 'AGS_pay_result.php';
        include get_template_directory() . '/pg/AGS_pay_result.php';
    }
    else if ( $_REQUEST['mode'] == "payment-list" ) {
        include get_template_directory() . '/pg/payment-list.php';
    }
    else if ($_REQUEST['mode'] == "AGS_pay") {
        if ( ! PAYMENT_DEBUG ) include ALLTHEGATE_DIR . 'allthegate-javascript.php';
        include ALLTHEGATE_DIR . 'AGS_pay.php';
    }
    else if ($_REQUEST['mode'] == "AGS_VirtAccResult") {
        include ALLTHEGATE_DIR . 'AGS_VirAcctResult.php';
    }
}
else {
    include 'part/enrollment-content1.php';
    if ( strpos( $_SERVER['HTTP_HOST'], 'thetalktalk' ) !== false ) include 'part/enrollment-content2-thetalktalk.php';
    else include 'part/enrollment-content2.php';
}

