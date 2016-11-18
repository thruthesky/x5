<?php
wp_enqueue_style('about-us-content3', td() . '/css/about-us-content3.css');
?>

<?php

$re = teacher_list();

if ( $re['code'] ) {
    echo "<h2>$re[message]</h2>";
    return;
}


$teachers = $re['data'];
if ( empty($teachers)  ) {
    echo "<h2>No teachers</h2>";
    return;
}
//print_r($teachers);

?>
<section class="about-us content-three">
    <div>
        <h2><?php _text('Teachers Greeting') ?></h2>
        <div class="teacher-row">
            <?php foreach ( $teachers as $teacher ) {
                if($teacher['url_youtube']) {
                    ?>
                    <div class="teacher col-sm-6">
                        <div class="photo"><img src="http://witheng.com/<?php echo $teacher['photo']?>"></div>
                        <div class="id">Teacher <?php echo $teacher['nickname']?></div>
                        <div class="greeting text"><?php echo trim_greeting($teacher['greeting'])?></div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</section>
