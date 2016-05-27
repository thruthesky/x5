<?php
wp_enqueue_style('reservation', td() . '/css/reservation.css');
wp_enqueue_script('reservation', td() . '/js/reservation.js');

$m = in('m', date('m'));
$Y = in('Y', date('Y'));

if ( isset( $_REQUEST['m'] ) &&  isset( $_REQUEST['Y'] ) ) {
    $MnY = 'm='.$_REQUEST['m'].'&Y='.$_REQUEST['Y'];
}

$re = class_list_by_month($Y, $m);
if ( $re['code'] ) { // error from server
    // warning_e($re['message']);
    $re['data'] = [];
}


$books = $re['data'];
$data = $books ? prepare_books_by_date( $books ) : [];
//di($books);
include 'part/reservation-content1.php';
?>



<section class="reservation content-two">
    <div>
        <?php if ( is_user_logged_in() ) : ?>
            <?php if ( empty( $books ) ) : ?>
                <?php _text("You have no reservations"); ?>
            <?php else : ?>
                <?php _text("No. of Reservations"); ?> : <?php echo  count($books); ?>
            <?php endif; ?>
        <?php else : ?>
            <img class="reminder" src="<?php img_e() ?>reservation-content2-image1.png">
            <div class="reminder-text">Please Login to View Reservation</div>
        <?php endif; ?>


        <h2><?php _e("Class Reservation", 'x5')?></h2>
        <?php if ( is_user_logged_in() ) include 'part/reservation-header.php' ?>

        <div class="desc">
            <?php
            if ( isset($_REQUEST[ 'view' ] ) && $_REQUEST[ 'view' ] = 'list' )
            echo draw_calendar_listview( $m, $Y, $data );
            else echo draw_calendar( $m, $Y, $data ); ?>
        </div>

        <nav>
            <i class="fa fa-th-large btm-btn" aria-hidden="true"></i>
            <div class="calendar-view btm-btn"><a href="<?php hd()?>reservation<?php if( isset( $MnY ) ) echo '?'.$MnY; ?>">CALENDAR VIEW</a></div>
            <div class="divider btm-btn"> | </div>
            <i class="fa fa-bars btm-btn" aria-hidden="true"></i>
            <div class="list-view btm-btn"><a href="?view=list<?php if( isset( $MnY ) ) echo '&'.$MnY; ?>">LIST VIEW</a></div>
        </nav>
    </div>
</section>

<script>
    jQuery(function($){
        $('.book').popover({
            html: true,
            placement: 'left'
        });
        $('.book')
            .mouseenter(function(){
                $(this).popover('show');
            })
            .mouseleave(function(){
                $(this).popover('hide');
            });
        var $book = $('.book[date="<?php echo date('Ymd')?>"]:eq(0)');
        if ( $book.length ) {
            $book.popover('show');
            $('.calendar').bind('mouseenter', on_calendar_mouseenter);
            function on_calendar_mouseenter() {
                $book.popover('hide');
                console.log('mouseenter: calendar');
                $('.calendar').unbind('mouseenter', on_calendar_mouseenter);
            }
        }
    });
</script>


