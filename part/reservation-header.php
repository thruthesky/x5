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
    <a href="?m=<?php echo $prev_month_digit?>&Y=<?php echo $pY?>">
        <span class="prev-month">
            << <?php echo $pM?> <?php echo $pY?>
        </span>
    </a>
    <strong>
        <span class="this-month">
            <?php echo $M?> <?php echo $Y?>
        </span>
    </strong>
    <a href="?m=<?php echo $next_month_digit?>&Y=<?php echo $nY?>">
        <span class="next-month">
            <?php echo $nM?> <?php echo $nY?> >>
        </span>
    </a>
</nav>