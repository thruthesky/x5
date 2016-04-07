<?php
wp_enqueue_style('reservation', td() . '/css/reservation.css');
wp_enqueue_script('reservation', td() . '/js/reservation.js');

$m = in('m', date('m'));
$Y = in('Y', date('Y'));

$re = class_list_by_month($Y, $m);
if ( $re['code'] ) return warning_e($re['message']); // error on server.

$books = $re['data'];
$data = $books ? prepare_books_by_date( $books ) : [];

?>

<section class="reservation">
    <h2><?php _e('Class Reservation')?></h2>
    <?php include 'reservation-header.php'?>
    <?php if ( empty( $books ) ) : ?>
        <?php _e("You have no reservations", 'x5'); ?>
    <?php else : ?>
        <div class="desc">
        <?php _e("No. of Reservations", 'x5'); ?> : <?php echo  count($books); ?>
            <?php echo draw_calendar($m, $Y, $data); ?>
        </div>
    <?php endif; ?>
</section>


