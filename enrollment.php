<?php
/**
 * @file enrollment.php
 * @note The route "/enrollment" has get_header() and get_footer() already.
 * 		So, if you are going to use (load) script here,  it will have header.php / footer.php
 */



if ( ! PAYMENT_DEBUG ) include ALLTHEGATE_DIR . 'allthegate-javascript.php';


if ( isset( $_REQUEST['mode'] ) ) {
    if ( $_REQUEST['mode'] == "AGS_pay_ing" ) {
        include ALLTHEGATE_DIR . 'AGS_pay_ing.php';
    }
    else if ( $_REQUEST['mode'] == "AGS_pay_result" ) {
        include ALLTHEGATE_DIR . 'AGS_pay_result.php';
    }
    else if ( $_REQUEST['mode'] == "payment-list" ) {
        include ALLTHEGATE_DIR . 'payment-list.php';
    }
    else if ($_REQUEST['mode'] == "AGS_pay") {
        include ALLTHEGATE_DIR . 'AGS_pay.php';
    }
    else if ($_REQUEST['mode'] == "AGS_VirtAccResult") {
        include ALLTHEGATE_DIR . 'AGS_VirAcctResult.php';
    }
}
else {
    include 'part/enrollment-content1.php';
    include 'part/enrollment-content2.php';
}

