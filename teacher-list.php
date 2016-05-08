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


<style>
    .teachers {

    }
    .teachers .teacher {
        margin: 1em 0;
        background-color: #01d9c1;
        text-align: center;
    }
    .teachers .teacher .photo {
        overflow: hidden;
        position: relative;
        display: inline-block;
        height: 150px;
        width: 150px;
        border: 3px solid #ffffff;
        border-radius: 100%;
    }
    .teachers .teacher .photo img {
        width: 150px;
        height: auto;
    }
    .teachers .teacher .greeting {
        height: 250px;
        overflow-y: hidden;
    }
</style>
<section class="teachers">
    <div>
        <h2>X5 Teacher</h2>
    <?php foreach ( $teachers as $teacher ) { ?>
        <div class="teacher col-sm-4">
            <div class="photo"><img src="http://witheng.com/<?php echo $teacher['photo']?>"></div>
            <div class="name"><?php echo $teacher['name']?></div>
            <div class="teaching-year">Teacher Years : <?php echo $teacher['teaching_year']?></div>
            <div class="birthday">Birth day : <?php echo $teacher['birthday']?></div>
            <div class="gender"><?php echo $teacher['gender']?></div>
            <div class="major"><?php echo $teacher['major']?></div>
            <div class="greeting"><?php echo trim_greeting($teacher['greeting'])?></div>
            <div class="youtube"><?php echo youtube_tag($teacher['url_youtube'])?></div>
        </div>
    <?php } ?>
    </div>
</section>
