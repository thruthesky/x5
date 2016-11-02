<?php
wp_enqueue_style( 'jquery-ui', td() . '/css/jquery-ui/css/jquery-ui.min.css' );
wp_enqueue_script( 'jquery-ui', td() . '/css/jquery-ui/js/jquery-ui.min.js' );
wp_enqueue_style('level-test-content-form', td() . '/css/level-test-content-form.css');

?>
<script>
    window.addEventListener('load',function(){
        var $is_online = "<?php echo ( user()->login() ) ? true : false;  ?>";
        var $spinner = $('.line.spinner');
        var $submit = $('.line.submit');
        var $error = $('.line.error');

        $( function() {
            var dateFormat = "mm/dd/yy",
                date = $( "#date" )
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1
                    });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate( dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }

        });
        jQuery(document).ready(function($) {

            $('.wordpress-ajax-form').on('submit', function(e) {
                e.preventDefault();
                console.log('user is ' + $is_online);
                if( ! $is_online ) return alert('레벨테스트 신청은 로그인시에만 가능합니다');

                var $form = $(this);

                $.post($form.attr('action'), $form.serialize(), function(re) {
                    console.log(re);
                    on_result(re.data);
                }, 'json');
            });

        });

        function on_result(re) {
            setTimeout(function(){
                $spinner.hide();
                $error.hide();
                if ( re['code'] ) {
                    $submit.show();
                    $error.html( '<i class="fa fa-exclamation-triangle"></i> ' + re['message'] );
                    $error.show();
                }
                else {
                    //location.href = home_url;
                    //alert("User Profile Update Success !")
                    $submit.show();
                    $submit.after('<div class="alert alert-success" role="alert"><strong>Message</strong> Sent</div>');
                    $('#date').val("");
                    $('#phone').val("");
                    $('#kakao').val("");
                    $('#post_content').val("");
                }
            }, 500);
        }
    });

</script>

<section class="level-test content-form">
    <div>
        <h2><?php _text('Lv:Frm:Level Test Form')?></h2>
        <div class="container">
            <form id="form" class="wordpress-ajax-form" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
                <input type="hidden" name="action" value="level_test_inquiry"/>
                <input type="hidden" name="post_title" value="post_inquiry">
                <?php if ( ! user()->login() ) {
                    _text('* You must be logged-in to submit this form...');
                } ?>
                <div class="line">
                    <label for="student_id"><?php _text('Student ID')?></label>
                    <div class="text">
                        <input type="text" name="student_id" maxlength="64" id="student_id" tabindex="101" placeholder="<?php _text('Student ID')?>">
                    </div>
                </div>
                <div class="line">
                    <label for="student_name"><?php _text('Name')?></label>
                    <div class="text">
                        <input type="text" name="student_name" maxlength="64" id="student_name" tabindex="101" placeholder="<?php _text('Name')?>">
                    </div>
                </div>

                <div class="line">
                    <label for="date"><?php _text('Select Date')?><span>*</span></label>
                    <div class="text">
                        <input type="text" name="date" id="date" maxlength="64"  tabindex="101" placeholder="<?php _text('Select Date...')?>">
                    </div>
                </div>
                <div class="line">
                    <label for="time"><?php _text('Time')?><span>*</span></label>
                    <div class="text">
                        <select name="time" >
                            <?php
                            for($x=3;$x<=11;$x++) {
                                echo "<option value='$x:00pm'>$x:00 PM</option>";
                                echo "<option value='$x:30pm'>$x:30 PM</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="line">
                    <label for="phone"><?php _text('Phone')?></label>
                    <div class="text">
                        <input type="number" name="phone" maxlength="64" id="phone" tabindex="101" placeholder="<?php _text('Phone Number...')?>">
                    </div>
                </div>
                <div class="line">
                    <label for="kakao"><?php _text('Kakao')?></label>
                    <div class="text">
                        <input type="text" name="kakao" maxlength="64" id="kakao" tabindex="101" placeholder="<?php _text('Kakao ID')?>">
                    </div>
                </div>
                <div class="line">
                    <label for="post_content"><?php _text('Message')?><span>*</span></label>
                    <div class="text">
                        <textarea name="post_content" id="post_content" tabindex="101" rows="5" placeholder="<?php _text('Your comment here...')?>"></textarea>
                    </div>
                </div>
                <div class="line spinner" style="display:none;">
                    <i class="fa fa-spinner fa-spin"></i> <?php _text('Connecting to server ...') ?>
                </div>
                <div class="line error alert alert-warning" role="alert" style="display:none;"></div>
                <div class="line submit">
                    <input type="submit" tabindex="121" value="<?php _text('Submit')?>">
                </div>
            </form>
        </div>
    </div>
</section>