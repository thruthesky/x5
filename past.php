<h2>Past Classes</h2>


<?php

$re = past_list();

$books = $re['data'];

if ( empty($books) ) {
    _e("You have no past classes", 'x5');
    return;
}

_e("No. of Past classes : ", 'x5');
echo  count($books);

?>

<table class="table">
    <thead>
    <tr>
        <th><?php _e('Class No.', 'x5')?></th>
        <th></th>
        <th><?php _e('Teachers', 'x5')?></th>
        <th><?php _e('Date', 'x5')?></th>
        <th><?php _e('Class Begin', 'x5')?></th>
        <th><?php _e('Class Comment', 'x5')?></th>
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
            <td>
                <?php
                $comment = $book['rate_comment'];
                echo $comment;
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
