<?php
wp_enqueue_style('payment-list-content2', td() . '/css/payment-list-content2.css');
global $wpdb;
$table = $wpdb->prefix . 'payment';
$id = payment_get_user_no();
$rows = $wpdb->get_results(
    "SELECT * FROM $table WHERE result='Y' AND user_id = $id ORDER BY id DESC",
    ARRAY_A
);
$latestrows = current($rows);
$total_amount = array_sum(array_column($rows,'amount'));
$latestdate = date("Y-m-d h:i a", $latestrows['stamp_finish']);
?>
<section class="payment-list content-two">
    <div>
        <div class="row">
            <div class="col-sm-6 left">
                <h3><?php _text("Latest Transaction") ?></h3>
                <div><?php _text("Currency :") ?> <?php echo isset($latestrows['currency']) ? $latestrows['currency'] : '0'; ?></div>
                <div><?php _text("Amount Paid") ?> : <?php echo isset($latestrows['amount']) ? $latestrows['amount'] : '0'; ?></div>
                <div><?php _text("Method :") ?> <?php echo isset($latestrows['method']) ? $latestrows['method'] : 'None'; ?></div>
                <div><?php _text("Date :") ?> <?php echo isset($latestrows['stamp_finish']) ?  $latestdate : 'None'; ?></div>
            </div>
            <div class="col-sm-6 right">
                <h3><?php _text("User Details") ?></h3>
                <div><?php _text("Total No. of transaction :") ?> <?php echo count($rows); ?></div>
                <div><?php _text("Total Amount Paid :") ?> <?php echo $total_amount; ?></div>
            </div>
        </div>
        <table class="table table-striped">
            <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Method</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach( $rows as $row ) {
                $data = unserialize($row['values_from_paygate_server']);
                $date = date("Y-m-d h:i a", $row['stamp_finish']);
                $method = $data['AuthTy'];
                $Storeid = get_opt('lms[allthegate_id]');
                if ( $row['method'] == 'onlycardselfnormal' || $method == 'card' ) {
                    $method = '신용카드';
                    $print_receipt = <<<EOS
<a href="javascript:show_receipt('$data[rApprTm]', '$Storeid', '$data[rApprNo]', '$data[rDealNo]');">
<i class='fa fa-print' aria-hidden='true'></i> Print Receipt
</a>
EOS;
                }
                else if ( $row['method'] == 'onlyicheselfnormal' ) {
                    $method = '계좌이체';
                }
                else if ( $row['method'] == 'onlyvirtualselfnormal' ) {
                    $method = '1회용 무통장';
                }
                else $print_receipt = '';
                echo "
    <tr>
	    <th scope='row'>$row[id]</th>
        <th scope='row'>$date</th>
        <th scope='row'>$method</th>
        <th scope='row'>$row[amount]</th>
        <th scope='row'>$print_receipt</th>
    </tr>
    ";

            }
            ?>
            </tbody>
        </table>

    </div>
</section>
<script>
    function show_receipt(appr_tm, sRetailer_id, approve, send_no )
    {
        var send_dt = appr_tm;
        var url = "http://www.allthegate.com/customer/receiptLast3.jsp";
        url=url+"?sRetailer_id="+sRetailer_id;
        url=url+"&approve="+approve;
        url=url+"&send_no="+send_no;
        url=url+"&send_dt="+send_dt.substring(0,8);

        window.open(url, "window","toolbar=no,location=no,directories=no,status=,menubar=no,scrollbars=no,resizable=no,width=420,height=700,top=0,left=150");
    }
</script>