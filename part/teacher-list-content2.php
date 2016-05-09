<?php
wp_enqueue_style('teacher-list-content2', td() . '/css/teacher-list-content2.css');
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




?>

<section class="teachers content-two">
    <div>
        <?php foreach ( $teachers as $teacher ) { ?>
            <div class="teacher col-sm-4">
                <div class="photo"><img src="http://witheng.com/<?php echo $teacher['photo']?>"></div>
                <div class="id">Teacher <?php echo $teacher['id']?></div>
                <div class="name text"><?php echo $teacher['name']?></div>
                <div class="teaching-year text">Teacher Years : <?php echo $teacher['teaching_year']?></div>
                <div class="birthday text">Birth day : <?php echo $teacher['birthday']?></div>
                <div class="gender text"><?php echo $teacher['gender']?></div>
                <div class="major text"><?php echo $teacher['major']?></div>
                <div class="greeting text"><?php echo trim_greeting($teacher['greeting'])?></div>
                <div class="youtube"><?php echo youtube_tag($teacher['url_youtube'])?></div>
            </div>
        <?php } ?>
    </div>
</section>