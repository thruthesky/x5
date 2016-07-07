<?php
$M = $M = date('M', mktime( 0, 0, 0, $m, 1, $Y));
$pM = date('M', mktime( 0, 0, 0, $m-1, 1, $Y));
$nM = date('M', mktime( 0, 0, 0, $m+1, 1, $Y));
$prev_month_digit = date('m', mktime( 0, 0, 0, $m-1, 1, $Y));
$next_month_digit = date('m', mktime( 0, 0, 0, $m+1, 1, $Y));
$pY = date('Y', mktime( 0, 0, 0, $m-1, 1, $Y));
$nY = date('Y', mktime( 0, 0, 0, $m+1, 1, $Y));
?>
<nav class="month">

    <div class="prev-month btn">
        <img src="<?php img_e() ?>reservation/left.png">
        <a href="?m=<?php echo $prev_month_digit;?>&Y=<?php echo $pY; if ( isset($_REQUEST['view']) ) echo "&view=list"; ?>">
            <?php echo $pM?> <?php echo $pY?>
        </a>
        <div class="show-month">
            <?php
            for($x = 2; $x < 13; $x++):
                ?>
                <div class="display-month">
                <a href="?m=<?php echo date('m', mktime( 0, 0, 0, $m-$x, 1, $Y));?>&Y=<?php echo date('Y', mktime( 0, 0, 0, $m-$x, 1, $Y));
                if ( isset($_REQUEST['view']) ) echo "&view=list";?>
                ">
                    <?php echo date('M Y', mktime( 0, 0, 0, $m-$x, 1, $Y));?>
                </a>
                </div>
                <?php
            endfor;
            ?>
        </div>
    </div>

    <div class="this-month btn">
        <img src="<?php img_e() ?>reservation/center.png">
        <span><?php echo $M?> <?php echo $Y?></span>
        <div class="show-month">
            <?php
            for($x = -1; $x < 4; $x++):
                ?>
                <div class="display-month">
                    <a href="?m=<?php echo date('m', mktime( 0, 0, 0, $m, 1, $Y+$x));?>&Y=<?php echo date('Y', mktime( 0, 0, 0, $m, 1, $Y+$x));
                    if ( isset($_REQUEST['view']) ) echo "&view=list";?>
                    ">
                        <?php echo date('M Y', mktime( 0, 0, 0, $m, 1, $Y+$x));?>
                    </a>
                </div>
                <?php
            endfor;
            ?>
        </div>
    </div>


    <div class="next-month btn">
        <img src="<?php img_e() ?>reservation/right.png">
        <a href="?m=<?php echo $next_month_digit;?>&Y=<?php echo $nY; if ( isset($_REQUEST['view']) ) echo "&view=list"; ?>">
            <?php echo $nM?> <?php echo $nY?>
        </a>

        <div class="show-month">
            <?php
            for($x = 2; $x < 13; $x++):
                ?>
                <div class="display-month">
                    <a href="?m=<?php echo date('m', mktime( 0, 0, 0, $m+$x, 1, $Y));?>&Y=<?php echo date('Y', mktime( 0, 0, 0, $m+$x, 1, $Y));
                    if ( isset($_REQUEST['view']) ) echo "&view=list";?>
                    ">
                        <?php echo date('M Y', mktime( 0, 0, 0, $m+$x, 1, $Y));?>
                    </a>
                </div>
                <?php
            endfor;
            ?>
        </div>
    </div>

</nav>