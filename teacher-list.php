<h2>X5 Teacher</h2>

<?php

$re = teacher_list();

if ( $re['code'] ) {
    echo "<h2>$re[message]</h2>";
    return;
}



$teachers = $re['data'];




?>


<style>
    .teachers {

    }
    .teachers .teacher {
        margin: 1em 0;
        background-color: #b0bbf3;
    }
    .teachers .teacher .photo {

    }
    .teachers .teacher .photo img {
        width: 100px;
        height: 120px;
    }
</style>
<section class="teachers">
    <?php foreach ( $teachers as $teacher ) { ?>
        <div class="teacher">
            <div class="photo"><img src="http://witheng.com/<?php echo $teacher['photo']?>"></div>
            <div class="youtube"><?php echo youtube_tag($teacher['url_youtube'])?></div>
            <div class="name"><?php echo $teacher['name']?></div>
            <div class="teaching-year">Teacher Years : <?php echo $teacher['teaching_year']?></div>
            <div class="birthday">Birth day : <?php echo $teacher['birthday']?></div>
            <div class="greeting"><?php echo trim_greeting($teacher['greeting'])?></div>
            <div class="major"><?php echo $teacher['major']?></div>
            <div class="gender"><?php echo $teacher['gender']?></div>
        </div>
    <?php } ?>
</section>
