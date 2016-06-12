<?php
/**
 * 참고 : Center9 에서 "/enrollment" 라우트는 현재 페이지인 "enrollment.php" 가 로드되는데,
 *      이미 get_header() 가 호출 된 상태이다.
 *
 */
if ( ! PAYMENT_DEBUG ) include ALLTHEGATE_DIR . 'allthegate-javascript.php';
if ( isset( $_REQUEST['mode'] ) ) {
    if ( $_REQUEST['mode'] == "AGS_pay" ) {
        include ALLTHEGATE_DIR . 'AGS_pay.php';
        return;
    }
    else if ( $_REQUEST['mode'] == "AGS_pay_ing" ) {
        include ALLTHEGATE_DIR . 'AGS_pay_ing.php';
        return;
    }
    else if ( $_REQUEST['mode'] == "AGS_pay_result" ) {
        include ALLTHEGATE_DIR . 'AGS_pay_result.php';
        return;
    }
}


include 'part/enrollment-content1.php';
include 'part/enrollment-content2.php';


