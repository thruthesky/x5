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




function prepare_books_by_date( $data ) {
    $dates = array();
    $texts = array();
    foreach( $data as $book ) {
        $book['icon'] = str_replace('./data/', 'http://onlineenglish.kr/data/', $book['icon']);
        $dates[ $book['date'] ][] = $book;
    }

    if ( $dates ) {
        foreach ( $dates as $date => $books ) {
            $count = count( $books );
            $text = "<div class='books' count='$count'>";

            foreach( $books as $book ) {
                $name = $book['teacher']['mb_nick'];
                $no = $book['idx'];
                $minutes = $book['mins'];
                $text .= "
                    <div class='book' title='Class No.: $no, Mininutes: $minutes'>
                        <span class='icon'>$book[icon]</span>
                        <span class='name'>$name</span>
                        <span class='time'>$book[ktime]</span>
                    </div>
                ";
            }
            $text .= "</div>";
            $texts[ $date ] = $text;
        }
    }
    return $texts;
}
$data = prepare_books_by_date( $books );







?>

<style>
    .tooltip-inner {
        padding: 6px 12px;
        background-color: #9c9c9c;
        border-radius: 2px;
    }
    .tooltip-arrow {
        border-top-color: #9c9c9c!important;
        color: #9c9c9c;
    }
</style>

<script>
    jQuery(function($){
        $('.book').tooltip({
            'delay' : { "show" : 300, "hide" : 100 },
            'placement' : "top"
        } );
    });
</script>



<?php
$m = in('m', date('m'));
$Y = in('Y', date('Y'));

$M = date('M', mktime( 0, 0, 0, $m, 1, $Y));
$pM = date('M', mktime( 0, 0, 0, $m-1, 1, $Y));
$nM = date('M', mktime( 0, 0, 0, $m+1, 1, $Y));

$prev_month_digit = date('m', mktime( 0, 0, 0, $m-1, 1, $Y));
$next_month_digit = date('m', mktime( 0, 0, 0, $m+1, 1, $Y));



$pY = date('Y', mktime( 0, 0, 0, $m-1, 1, $Y));
$nY = date('Y', mktime( 0, 0, 0, $m+1, 1, $Y));



?>

<nav class="month">

    &lt;&lt;
    <a href="?m=<?php echo $prev_month_digit?>&Y=<?php echo $pY?>"><span class="prev-month"><?php echo $pM?> <?php echo $pY?></span></a>

    <strong><span class="this-month"><?php echo $M?> <?php echo $Y?></span></strong>

    <a href="?m=<?php echo $next_month_digit?>&Y=<?php echo $nY?>"><span class="next-month"><?php echo $nM?> <?php echo $nY?></span></a>
    &gt;&gt;

</nav>






<?
echo draw_calendar($m, $Y, $data);

?>



<?php
/*


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

 */
?>

