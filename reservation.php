<h2>Reservation</h2>
<style>
    .calendar {
        width: 100%;
        background-color: #fbfbfb;
    }
    .calendar td {
        height: 32px;
        text-align: center;
    }
    @media all and (  min-width: 600px ) {
        .calendar td {
            height: 64px;
        }
    }
    @media all and (  min-width: 800px ) {
        .calendar td {
            height: 82px;
        }
    }
    .calendar-day-np {
        background-color: #f0f0f0;
    }

    .calendar .books {
        background-color: #eec188;
    }
    .calendar .books .book .icon {
        display:inline-block;
        width: 25px;
        height: 26px;
        overflow: hidden;
        border-radius: 50%;
    }
</style>
<?php



$re = reservation_list();

if ( $re['code'] ) return warning_e($re['message']);

$books = $re['data'];

if ( empty($books) ) {
    _e("You have no reservations", 'x5');
    return;
}

_e("No. of Reservations : ", 'x5');
echo  count($books);



$m = date('m');
$Y = date('Y');
/* sample usages */
echo "<h2>$m / $Y</h2>";

function prepare_books_by_date( $books ) {
    $dates = array();
    foreach( $books as $book ) {
        $book['icon'] = str_replace('./data/', 'http://onlineenglish.kr/data/', $book['icon']);
        $dates[ $book['date'] ][] = $book;
    }
    return $dates;
}
$data = prepare_books_by_date($books);

echo draw_calendar($m, $Y, $data);



?>




<?php

?>

<table class="table">
    <thead>
    <tr>
        <th><?php _e('Class No.', 'x5')?></th>
        <th></th>
        <th><?php _e('Teachers', 'x5')?></th>
        <th><?php _e('Date', 'x5')?></th>
        <th><?php _e('Class Begin', 'x5')?></th>
        <th><?php _e('Class Minutes', 'x5')?></th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ( $books as $book ) {
        ?>
        <tr>
            <td><?php echo $book['idx']?></td>
            <td><?php
                $icon = $book['icon'];
                $icon = str_replace('./data/', 'http://onlineenglish.kr/data/', $icon);
                echo $icon;
                ?></td>
            <td><?php echo $book['teacher']['mb_nick']?></td>
            <td><?php
                $kday = kday( $book['kday'] );
                $dt = "$book[kdate] ( $kday )";
                echo $dt;
                ?>
            </td>
            <td>
                <?php
                echo $book['ktime'];
                ?>
            </td>
            <td><?php echo $book['mins']; ?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>
