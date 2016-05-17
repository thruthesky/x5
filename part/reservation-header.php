<?php
$M = date('M', mktime( 0, 0, 0, $m, 1, $Y));
$pM = date('M', mktime( 0, 0, 0, $m-1, 1, $Y));
$nM = date('M', mktime( 0, 0, 0, $m+1, 1, $Y));
$prev_month_digit = date('m', mktime( 0, 0, 0, $m-1, 1, $Y));
$next_month_digit = date('m', mktime( 0, 0, 0, $m+1, 1, $Y));
$pY = date('Y', mktime( 0, 0, 0, $m-1, 1, $Y));
$nY = date('Y', mktime( 0, 0, 0, $m+1, 1, $Y));
?>
<nav class="month">

    <div class="prev-month btn">
        <a href="?m=<?php echo $prev_month_digit?>&Y=<?php echo $pY?>">
            <?php echo $pM?> <?php echo $pY?>
        <i></i>
        </a>

            <!--?php
            $prev = '<div class="prev-past-month">';
            for($x = 0; $x < 11; $x++):
                $prev.= '<div class="calendar-day-np"> </div>';
                $days_in_this_week++;
            endfor;
            $prev .= '</div>';
            ?-->

    </div>

    <div class="this-month btn">
        <?php echo $M?> <?php echo $Y?>
        <i></i>
    </div>


    <div class="next-month btn">
        <a href="?m=<?php echo $next_month_digit?>&Y=<?php echo $nY?>">
            <?php echo $nM?> <?php echo $nY?>
            <i></i>
        </a>
    </div>

</nav>