<?php
wp_enqueue_style('reservation', td() . '/css/reservation.css');
wp_enqueue_script('reservation', td() . '/js/reservation.js');

$m = in('m', date('m'));
$Y = in('Y', date('Y'));

if ( isset( $_REQUEST['m'] ) &&  isset( $_REQUEST['Y'] ) ) {
    $MnY = 'm='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'];
}

$re = class_list_by_month($Y, $m);
$data = $books = $first_class = $next_class = null;
$no_of_absence = $no_of_past = $no_of_reservation = 0;
if ( $re['code'] ) { // error from server
}
else {
    $books = $re['data']['books'];
    $no_of_past = $re['data']['no_of_past'];
    $no_of_reservation = $re['data']['no_of_reservation'];
    $next_class = $re['data']['next_class'];
    $first_class = $re['data']['first_class'];
    $no_of_absence = 0;
    $data = $books ? prepare_books_by_date( $books, $no_of_absence ) : [];


    //getting the unique list of teachers
    $tmp = array();
    $unique = array();
    $myTeacher = '';
    if ( !empty( $books ) ) {
        foreach ($books as $item) {
            if (!in_array($item['idx_teacher'], $tmp)) {
                $icon = str_replace('./data/', 'http://onlineenglish.kr/data/', $item['icon']);
                $teacherName = $item['teacher']['mb_nick'];
                $myTeacher .="<span class='teacher_icon' data-toggle='tooltip' data-placement='bottom' title='$teacherName'> $icon </span>";
                $unique[] = $item;
                $tmp[] = $item['idx_teacher'];
            }
        }
    }
}
//di($books);
//di($unique);
include 'part/reservation-content1.php';
?>



<section class="reservation content-two">
    <div>
        <div class="row">
            <div class="col-sm-6 left">
                <h2 class="title"><?php _text("Class Reservation")?></h2>
                <?php if ( is_user_logged_in() ) : ?>
                    <?php if ( empty( $books ) ) : ?>
                        <?php _text("You have no reservations"); ?>
                    <?php else : ?>
                        <div><?php _text("No. of Reservations of this month:"); ?><?php echo  count($books); ?></div>
                        <div><?php _text("No. of Absence of this month:"); ?> : <?php echo  $no_of_absence ?></div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 right">
                <h2 class="title"><?php _text("My Teachers"); ?></h2>
                <div class="my-teacher">
                    <?php echo isset($myTeacher) ? $myTeacher : ''; ?>
                </div>
            </div>
        </div>
        <?php if ( is_user_logged_in() ) : ?>
            <?php include 'part/reservation-header.php' ?>
        <?php else : ?>
            <img class="reminder" src="<?php img_e() ?>reservation-content2-image1.png">
            <div class="reminder-text"><?php _text('Please Login to View Reservation')?></div>
        <?php endif; ?>
        <div class="desc">
            <?php
            if ( isset($_REQUEST[ 'view' ] ) && $_REQUEST[ 'view' ] = 'list' ) echo draw_calendar_listview( $m, $Y, $data );
            else echo draw_calendar( $m, $Y, $data );
            ?>
        </div>
        <?php if ( is_user_logged_in() ) : ?>
            <nav>
                <span class="dashicons dashicons-grid-view btm-btn"></span>
                <div class="calendar-view btm-btn"><a href="<?php hd()?>reservation<?php if( isset( $MnY ) ) echo '?'.$MnY; ?>"><?php _text('CALENDAR VIEW')?></a></div>
                <div class="divider btm-btn"> | </div>
                <span class="dashicons dashicons-list-view btm-btn"></span>
                <div class="list-view btm-btn"><a href="?view=list<?php if( isset( $MnY ) ) echo '&'.$MnY; ?>"><?php _text('LIST VIEW')?></a></div>
            </nav>
        <?php endif; ?>
    </div>
</section>


