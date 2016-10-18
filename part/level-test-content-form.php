<?php
wp_enqueue_style( 'jquery-ui', td() . '/css/jquery-ui/css/jquery-ui.min.css' );
wp_enqueue_script( 'jquery-ui', td() . '/css/jquery-ui/js/jquery-ui.min.js' );
wp_enqueue_style('level-test-content-form', td() . '/css/level-test-content-form.css');


$category = forum()->getCategory( 'level-test-inquiry' );
$category_id = $category->term_id;

?>
<script>
    window.addEventListener('load',function(){
        $( function() {
            var dateFormat = "mm/dd/yy",
                from = $( "#from" )
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1
                    })
                    .on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#to" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
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
        } );
    });
</script>

<section class="level-test content-form">
    <div>
        <h2><?php _text('Lv:Frm:Level Test Form')?></h2>
        <div class="container">
            <form action="<?php echo home_url("forum/submit")?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="do" value="post_create">
                <input type="hidden" name="category_id" value="<?php echo $category_id?>">
                <input type="hidden" name="title" value="post_inquiry">

                <div class="line">
                    <label for="from"><?php _text('Select Date')?><span>*</span></label>
                    <div class="text">
                        <input type="text" name="from" id="from" maxlength="64"  tabindex="101" placeholder="<?php _text('Select Date...')?>">
                    </div>
                </div>
                <div class="line">
                    <label for="time"><?php _text('Time')?><span>*</span></label>
                    <div class="text">
                        <select name="time">
                            <?php
                            for($x=2;$x<=11;$x++) {
                                echo "<option value='$x:30pm'>$x:30pm</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="line">
                    <label for="user_login"><?php _text('Phone')?></label>
                    <div class="text">
                        <input type="text" name="phone" maxlength="64" id="phone" tabindex="101" placeholder="<?php _text('Phone Number...')?>">
                    </div>
                </div>
                <div class="line">
                    <label for="user_login"><?php _text('Message')?><span>*</span></label>
                    <div class="text">
                        <textarea name="message" id="message" tabindex="101" rows="5" placeholder="<?php _text('Your comment here...')?>"></textarea>
                    </div>
                </div>
                <div id="content-four"></div>
                <div class="line submit">
                    <input type="submit" tabindex="121" value="<?php _text('Submit')?>">
                </div>
            </form>
        </div>
    </div>
</section>