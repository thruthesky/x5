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
//print_r($teachers);



?>

<section class="teachers content-two">
    <div>
        <div class="teacher-row">
            <?php foreach ( $teachers as $teacher ) {
                if($teacher['url_youtube']) {
                ?>
                <div class="teacher col-sm-4">
                    <div class="photo"><img src="http://witheng.com/<?php echo $teacher['photo']?>"></div>
                    <div class="id">Teacher <?php echo $teacher['id']?></div>
                    <div class="name text"><?php echo $teacher['name']?></div>
                    <div class="teaching-year text">Teacher Years : <?php echo $teacher['teaching_year']?></div>
                    <div class="birthday text">Birth day : <?php echo $teacher['birthday']?></div>
                    <div class="gender text">Gender: <?php echo $teacher['gender']== 'F' ? 'Female' : 'Male'; ?></div>
                    <div class="major text"><?php echo $teacher['major']?></div>
                    <div class="greeting text"><?php echo trim_greeting($teacher['greeting'])?></div>
                    <?php echo youtube_tag($teacher['url_youtube'])?>
                </div>
            <?php }} ?>
        </div>
    </div>
</section>


<script>

    window.addEventListener( 'load', function() {
        $(".youtube").each(function() {
            // Based on the YouTube ID, we can easily find the thumbnail image
            $(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/mqdefault.jpg)');

            // Overlay the Play icon to make it look like a video player
            $(this).append($('<div/>', {'class': 'play'}));

            $(document).delegate('#'+this.id, 'click', function() {
                // Create an iFrame with autoplay set to true
                var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1&controls=0&border=0&scrolling=no";
                //if ($(this).data('params')) iframe_url+='&'+$(this).data('params');

                // The height and width of the iFrame should be the same as parent
                var iframe = $('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': $(this).width(), 'height': $(this).height() })

                // Replace the YouTube thumbnail with YouTube HTML5 Player
                $(this).replaceWith(iframe);
            });
        });
    });

</script>