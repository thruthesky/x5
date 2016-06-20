<?php
include_once 'forum-job-maid.php';
get_header();
wp_enqueue_style( 'forum-edit-basic', FORUM_URL . 'css/forum-edit-basic.css' );
//wp_enqueue_script( 'forum-edit-basic', FORUM_URL . 'js/forum-edit-basic.js' );

$category = forum()->getCategory( seg(1) );
$category_id = $category->term_id;
$post = forum()->getPost( seg(1) );

?>


    <script>
        var url_endpoint = "<?php echo home_url("forum/submit")?>";
        var max_upload_size = <?php echo wp_max_upload_size();?>;
    </script>

    <main id="post-new" class="forum">

        <div class="post-edit-meta">
            <div class="top">
                <h1 class="forum-title"><?php echo $category->name?></h1>
                <div class="forum-description"><?php echo $category->description?></div>
            </div>
        </div>

        <form action="<?php echo home_url("forum/submit")?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="do" value="post_create">
            <?php if ( $post ) : ?>
                <input type="hidden" name="id" value="<?php echo $post->ID?>">
            <?php endif; ?>
            <input type="hidden" name="category_id" value="<?php echo $category_id?>">
            <input type="hidden" name="file_ids" value="">



            <div class="col-xs-12"><h3>Application of Job Position</h3></div>
            <div class="col-xs-12 col-md-12 line">
                <div class="text">
                    <div class="position">
                        <input type="radio" id="position-housemaid" name="position" value="housemaid" <?php if ( maid()->position() == 'housemaid' ) echo 'checked=1'; ?>>
                        <label for="position-housemaid">
                            House Maid - All around housemaid ( Ate )
                        </label>
                    </div>

                    <div class="position">
                        <input type="radio" id="position-cook" name="position" value="cook" <?php if ( maid()->position() == 'cook' ) echo 'checked=1'; ?>>
                        <label for="position-cook">
                            Cook
                        </label>
                    </div>

                    <div class="position">
                        <input type="radio" id="position-yaya" name="position" value="yaya" <?php if ( maid()->position() == 'yaya' ) echo 'checked=1'; ?>>
                        <label for="position-yaya">
                            Yaya ( Babysitter )
                        </label>
                    </div>

                    <div class="position">
                        <input type="radio" id="position-caregiver" name="position" value="caregiver" <?php if ( maid()->position() == 'caregiver' ) echo 'checked=1'; ?>>
                        <label for="position-caregiver">
                            Caregiver ( Old sitter )
                        </label>
                    </div>

                    <div class="position">
                        <input type="radio" id="position-cleaner" name="position" value="cleaner" <?php if ( maid()->position() == 'cleaner' ) echo 'checked=1'; ?>>
                        <label for="position-cleaner">
                            Cleaner ( All around about cleaning, washing )
                        </label>
                    </div>

                </div>
            </div>


            <div class="line">
                <div class="caption">
                    Languages you can speak
                </div>
                <div class="col-xs-12 col-md-6 text">
                    English
                    <div class="form-group">
                        <input type="radio" id="english-speak-1" name="english_speak" value="no" <?php if ( maid()->english_speak() == 'no' ) echo 'checked=1'; ?>>
                        <label for="english-speak-1">No. I don't speak English.</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="english-speak-2" name="english_speak" value="little" <?php if ( maid()->english_speak() == 'little' ) echo 'checked=1'; ?>>
                        <label for="english-speak-2">I speak English a little.</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="english-speak-3" name="english_speak" value="good" <?php if ( maid()->english_speak() == 'good' ) echo 'checked=1'; ?>>
                        <label for="english-speak-3">I am fluent in English.</label>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                        Korean
                    <div class="form-group">
                        <input type="radio" id="korean-speak-1" name="korean_speak" value="no" <?php if ( maid()->korean_speak() == 'no' ) echo 'checked=1'; ?>>
                        <label for="korean-speak-1">No. I don't speak Korean.</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="korean-speak-2" name="korean_speak" value="little" <?php if ( maid()->korean_speak() == 'little' ) echo 'checked=1'; ?>>
                        <label for="korean-speak-2">I speak Korean a little.</label>
                    </div>
                    <div class="form-group">
                        <input type="radio" id="korean-speak-3" name="korean_speak" value="good" <?php if ( maid()->korean_speak() == 'good' ) echo 'checked=1'; ?>>
                        <label for="korean-speak-3">I am fluent in Korean.</label>
                    </div>
                </div>
            </div>



            <div class="line">
                <div class="caption">Stay in</div>
                <div class="text">
                    <input type="radio" id="stay-in" name="stay_in" value="yes" <?php if ( maid()->stay_in() == 'yes' ) echo 'checked=1'; ?>>
                    <label for="stay-in" class="btn">Yes, I stay in.</label>
                    <input type="radio" id="stay-out" name="stay_in" value="no" <?php if ( maid()->stay_in() == 'no' ) echo 'checked=1'; ?>>
                    <label for="stay-out" class="btn">No, I stay out.</label>
                </div>
            </div>


            <div class="col-md-8 line">
                <div class="caption">
                    <label for="name">Name</label>
                </div>
                <div class="text">
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo maid()->name()?>" placeholder="<?php _e('Please input your full name', 'k-forum')?>">
                </div>
            </div>


            <div class="col-md-6 line">
                <div class="caption">
                    <label for="number">Phone number</label>
                </div>
                <div class="text">
                    <input type="text" id="number" name="mobile" class="form-control" value="<?php echo maid()->mobile()?>" placeholder="<?php _e('Please input your phone number', 'k-forum')?>">
                </div>
            </div>




            <div class="col-md-6 line">
                <div class="caption">
                    <label for="email">Email</label>
                </div>
                <div class="text">
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo maid()->email()?>" placeholder="<?php _e('Please input your email', 'k-forum')?>">
                </div>
            </div>


            <div class="col-md-6 line">
                <div class="caption">Location</div>
                <div class="text">
                    <select name="province" class="btn btn-secondary">
                        <option value="">Select Province</option>
                    </select>
                    <select name="city" class="btn btn-secondary">
                        <option value="">Select City</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6 line">
                <div class="caption">Gender</div>
                <div class="text">
                    <input type="radio" id="gender-male" name="gender" value="M" <?php if ( maid()->gender() == 'M' ) echo 'checked=1'; ?>> <label for="gender-male">Male</label>,
                    <input type="radio" id="gender-female" name="gender" value="F" <?php if ( maid()->gender() == 'F' ) echo 'checked=1'; ?>> <label for="gender-female">Female</label>
                </div>
            </div>


            <div class="col-md-8 line">
                <div class="caption">
                    <label for="birthday">Birth Day</label>
                </div>
                <div class="text">
                    <input type="date" id="birthday" name="birthday" class="btn btn-secondary" value="<?php echo maid()->birthday()?>">
                </div>
            </div>



            <div class="col-md-6 line">
                <div class="caption">
                    <label for="no-of-children">No. of children</label>
                </div>
                <div class="text">
                    <input type="number" id="no-of-children" name="no_of_children" class="form-control" value="<?php echo maid()->no_of_children()?>" placeholder="">
                </div>
            </div>


            <div class="col-md-6 line">
                <div class="caption">
                    <label for="year-of-experience">Year of experience</label>
                </div>
                <div class="text">
                    <input type="number" id="year_of_experience" name="year_of_experience" class="form-control" value="<?php echo maid()->year_of_experience()?>" >
                </div>
            </div>


            <div class="col-md-8 line">
                <div class="caption">
                    <label for="education-attainment">Education Attainment </label>
                </div>
                <div class="text">
                    <select id="education-attainment" name="education_attainment" class="btn btn-secondary">
                        <option value="">Select</option>
                        <option value="elementary" <?php if ( maid()->education() == 'elementary' ) echo 'checked=1'; ?>>Elementary</option>
                        <option value="under_graduate_of_high_school" <?php if ( maid()->education() == 'highschool_undergraduate' ) echo 'checked=1'; ?>>Under graduate of High school</option>
                        <option value="high_school" <?php if ( maid()->education() == 'highschool' ) echo 'checked=1'; ?>>High  school</option>
                        <option value="under_graduate_of_college" <?php if ( maid()->education() == 'college_undergraduate' ) echo 'checked=1'; ?>>Under graduate of College</option>
                        <option value="college" <?php if ( maid()->education() == 'college' ) echo 'checked=1'; ?>>College</option>
                    </select>

                </div>
            </div>


            <div class="col-md-6 line">
                <div class="caption">
                    <label for="title">Short Description</label>
                </div>
                <div class="text">
                    <textarea type="text" id="title" name="title" class="form-control" rows="3" value="<?php echo $post ? esc_attr($post->post_title) : ''?>" placeholder="<?php _e('Please input short description', 'k-forum')?>"></textarea> 
                </div>
            </div>


            <?php
            /** @var for edition only  $attachments */
            $attachments = forum()->markupEditAttachments( get_the_ID() );
            ?>
            <div class="col-md-12">
                <div class="photos"><?php echo $attachments['images']?></div>
                <div class="files"><?php echo $attachments['attachments']?></div>

                <div class="buttons">
                    <div class="file-upload">
                        <i class="fa fa-camera"></i>
                        <span class="text"><?php _e('Choose File', 'k-forum')?></span>
                        <input type="file" name="file" class="btn btn-default" onchange="forum.on_change_file_upload(this);" style="opacity: .001;">
                    </div>
                    <div class="right">
                        <label for="post-submit-button"><input id="post-submit-button" class="btn btn-primary btn-sm" type="submit" value="<?php _e('POST SUBMIT', 'k-forum')?>"></label>
                        <label for="post-cancel-button"><a href="<?php echo forum()->listURL( $category->slug )?>" id="post-cancel-button" class="btn btn-secondary-outline btn-sm"><?php _e('Cancel', 'k-forum')?></a></label>
                    </div>
                </div>

                <div class="loader">
                    <img src="<?php echo FORUM_URL ?>/img/loader14.gif">
                    File upload is in progress. Please wait.
                </div>
            </div>
        </form>


    </main>


<?php
get_footer();
?>