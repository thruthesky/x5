<?php
include __LMS_PATH__ . 'payment-gateway/allthegate/load_module.php';
if ( isset( $_REQUEST['mode'] ) ) {
    if ( $_REQUEST['mode'] == "AGS_pay_ing" ) {
        if ( isset( $_REQUEST['StoreId'] ) ) {
            include __LMS_PATH__ . 'payment-gateway/allthegate/AGS_pay_ing.php';
            return;
        }
        else {
            jsAlert("No StoreId. It looks like you didn't authenticate for the payment.");
        }
    }
    else if ( $_REQUEST['mode'] == "AGS_pay_result" ) {
        include __LMS_PATH__ . 'payment-gateway/allthegate/AGS_pay_result.php';
        return;
    }

}

include 'part/enrollment-content1.php';
include 'part/enrollment-content2.php';