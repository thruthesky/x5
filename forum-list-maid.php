<?php
 include_once 'forum-maid-generate-post.php';

get_header();
wp_enqueue_style( 'forum-list-basic', FORUM_URL . 'css/forum-list-basic.css' );
$categories = get_the_category();
if ( empty($categories) ) {
    $category = get_category_by_slug( seg(1) );
}
else {
    $category = current($categories);
}

if ( empty($category) ) {
    _e("Forum does not exists.", 'k-forum');
    get_footer();
    return;

}

$category_id = $category->term_id;
$paged = isset($GLOBALS['wp_query']->query['paged']) ? $GLOBALS['wp_query']->query['paged'] : 1;

?>
<?php
/* Custom CSS*/
wp_enqueue_style('list-basic', td() . '/css/forum/list-basic.css');
wp_enqueue_style('list-maid', td() . '/css/forum/list-maid.css');
// Custom JS for Drop Down
wp_enqueue_script('list-maid', td() . '/js/list-maid.js', array('jquery'));

?>

    <main id="post-list" class="forum">
        <div class="post-list-meta">
            <div class="top">
                <!--h1 class="forum-title"><?php echo $category->name?></h1-->
                <div class="forum-description"><?php echo $category->description?></div>
            </div>
            <div class="bottom">
                <div class="post-count"><?php printf( __('Page: %1$d / No. of Post: %2$d', 'k-forum'), $paged, $category->count ); ?></div>
                <div class="post-new-button">
                    <a href="<?php echo home_url()?>/forum/<?php echo seg('1')?>/edit">
                    <span class="dashicons dashicons-welcome-write-blog"></span>
                    <?php _e('Post', 'k-forum')?></a>
                </div>
            </div>
        </div>

        <!-- SEARCH FORM TEXTBOXES-->
        <div class="col-lg-10 inline" id="content">
            <!-- DROPDOWN BOX -->
            <div class="col-lg-6">
                <select name="filter" id="filter" class="btn btn-secondary">
                    <option selected>Search Filters</option>
                    <option value="1">Search by Title/Content</option>
                    <option value="2">Search by Name</option>
                    <option value="3">Search by Number of Children</option>
                    <option value="4">Search by Age</option>
                    <option value="5">Search by Years of Experience</option>
                    <option value="6">Search by Location</option>
                    <option value="7">Search by Birthday</option>
                    <option value="8">Search by Email Address</option>
                    <option value="9">Search by Post Date</option>
                    <option value="10">With/Without Photo</option>
                    <option value="11">Search by Gender</option>
                    <option value="12">Stay In/ Stay Out</option>
                    <option value="13">Korean Speaking</option>
                    <option value="14">English Speaking</option>
                </select>
            </div>

            <form method="post" action="<?php echo home_url( '/forum/maid' ); ?>">
                <!-- Search by title/content -->
                <div class="col-lg-4 hideable" id="div1">
                    <div class="input-group">
                        <input type="text" name="title" id="title" value="" class="form-control" placeholder="Title/Content"/>
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div>
                <!-- Search by Name -->
                <div class="col-lg-4 hideable" id="div2">
                    <div class="input-group">
                        <input type="text" name="name" id="name" value="" class="form-control" placeholder="Name"/>
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div>
                <!-- Search by date -->
                <!-- <div class="col-md-2">
                    <div class="input-group">
                        <input type="text" name="start-date" id="start-date" value="" class="form-control" placeholder="Start Date"/>
                        -
                        <input type="text" name="end-date" id="end-date" value="" class="form-control" placeholder="End Date"/>
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div> -->
                <!-- Search by number of children -->
                <div class="col-lg-4 hideable" id="div3">
                    <div class="input-group">
                        <input type="text" name="children_number" id="children_number" value="" class="form-control" placeholder="Children"/>
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div>
                <!-- Search by Age -->
                <div class="col-lg-4 hideable" id="div4">
                    <div class="input-group">
                        <input type="text" name="age" id="age" value="" class="form-control" placeholder="Age"/>
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div>
                <!-- Search by Year of Experience -->
                <div class="col-lg-4 hideable" id="div5">
                    <div class="input-group">
                        <input type="text" name="experience" id="experience" value="" class="form-control" placeholder="Experience"/>
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div>
                <!-- Search by Location -->
                <div class="col-lg-4 hideable" id="div6">
                    <div class="input-group">
                        <input type="text" name="location" id="location" value="" class="form-control" placeholder="Location"/>
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div>
                <!-- Search by Birthday -->
                <div class="col-lg-4 hideable" id="div7">
                    <div class="input-group">
                    <input type="date" id="birthday" name="birthday" class="btn btn-secondary" value="">
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div>

                <!-- Search by Email -->
                <div class="col-lg-4 hideable" id="div8">
                    <div class="input-group">
                        <input type="text" id="email" name="email" class="form-control" value="" placeholder="Email Address" />
                        <span class="input-group-btn">
                            <input type="submit" value="Go!" class="btn btn-danger" />
                        </span>
                    </div>
                </div>
                
                 <!-- Search by Post Date -->
                <div class="col-lg-10 hideable inline" id="div9">
                    <div class="col-lg-4">
                        <input type="date" id="date-start" name="date-start" class="form-control" value=""/>
                        </div>
                    <div class="col-lg-4">
                        <input type="date" id="date-end" name="date-end" class="form-control" value=""/>
                        </div>
                    <div class="col-lg-2">
                        <input type="submit" value="Go!" class="btn btn-danger" />
                    </div>
                </div>

                <!-- Search by With/Without Photo-->
                <div class="col-lg-4 hideable" id="div10">
                    <select name="photo" onchange='this.form.submit()' class="btn btn-secondary">
                        <option value="" selected="selected">Image: </option>
                        <option value="yes">With Photo</option>
                        <option value="no">Without Photo</option>
                    </select> 
                </div>                
                
                <!-- Search by Gender -->
                <div class="col-lg-4 hideable" id="div11">
                    <select name="gender" onchange='this.form.submit()' class="btn btn-secondary">
                        <option selected disabled="">Gender:</option>
                        <option value="M">Male </option>
                        <option value="F">Female</option>
                    </select> 
                </div>

                <!-- Search by Stay-in/out  -->
                <div class="col-lg-4 hideable" id="div12">
                    <select name="stay-in" onchange='this.form.submit()' class="btn btn-secondary">
                        <option selected disabled="">House Staying:</option>
                        <option value="yes">Stay-In </option>
                        <option value="no">Stay-Out</option>
                    </select> 
                </div>

                <!-- Search by Korean Speaking -->
                <div class="col-lg-4 hideable" id="div13">
                    <select name="korean-speak" onchange='this.form.submit()' class="btn btn-secondary">
                        <option selected disabled="">Korean Speaking:</option>
                        <option value="no"> Can't Speak Korean </option>
                        <option value="little">Can Speak Korean a little</option>
                        <option value="good">Can Speak Korean fluently</option>
                    </select> 
                </div>

                 <!-- Search by English Speaking -->
                <div class="col-lg-4 hideable" id="div14">
                    <select name="english-speak" onchange='this.form.submit()' class="btn btn-secondary">
                        <option selected disabled="">English Speaking:</option>
                        <option value="no"> Can't Speak English </option>
                        <option value="little">Can Speak English a little</option>
                        <option value="good">Can Speak English fluently</option>
                    </select> 
                </div>

            </form>
        </div>
        <!-- END OF SEARCH FORM -->

        <div class="container post-list-container">
            <div class="row header">
                <div class="col-xs-12 col-sm-2 col-lg-3 text-center">
                    <?php _e('Photo', 'k-forum')?>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-5"><?php _e('Description', 'k-forum')?></div>
                <div class="col-xs-4 col-sm-2 col-lg-2 author"><?php _e('글쓴이', 'k-forum')?></div>
                <div class="col-xs-4 col-sm-2 col-lg-1 date"><?php _e('Date', 'k-forum')?></div>
                <div class="col-xs-4 col-sm-2 col-lg-1 no-of-view" title="<?php _e('No. of Views', 'k-forum')?>"><?php _e('Views', 'k-forum')?></div>
            </div>

                <?php

                $args = [];



                // create a script that automatically insert posts into housemaid forum.
/*

                // empty does not take an undefined value.
                if ( isset( $_REQUEST['name'] ) && ! empty( $_REQUEST['name']) ) {
                    $args = array(
                        'meta_key' => 'name',
                        'meta_value' => $_REQUEST['name']
                    );
                }
                else if( ! empty($children = $_REQUEST['children_number']) ) {
                    $args = array(
                        'meta_key' => 'no_of_children',
                        'meta_value' => $children
                    );
                }
                else if(!empty($experience = $_REQUEST['experience'])){
                    $args = array(
                        'meta_key' => 'year_of_experience',
                        'meta_value' => $experience
                    );
                }
                else if(!empty($birthday = $_REQUEST['birthday'])){
                    $args = array(
                        'meta_key' => 'birthday',
                        'meta_value' => $birthday
                    );
                }
                else if(!empty($title = $_REQUEST['title'])){
                    $args = array(
                        's' => $title
                    );
                }
                else if(!empty($age = $_REQUEST['age'])){
                    $args = array(
                        'meta_key' => 'age',
                        'meta_value' => $age
                    );
                }
                else if(!empty($email = $_REQUEST['email'])){
                    $args = array(
                        'meta_key' => 'email',
                        'meta_value' => $email
                    );
                }
                else if(!empty($photo = $_REQUEST['photo'])){
                    $image_args = array(
                        'post_type' => 'attachment',
                        'post_status' => 'inherit',
                        'post_mime_type' => 'image/jpeg',
                        'fields' => 'id=>parent'
                    );
                    if($photo == yes){

                    // get all attachment IDs and their parent post IDs.
                        $images = new WP_Query( $image_args );
                        if ( $images->have_posts() ){
                            // get attachments parent post IDs
                            $parents = wp_list_pluck( $images->posts, 'post_parent' );
                            // remove duplicates and non attached images (zero values)
                            $parents = array_filter( array_unique( $parents ) ); 
                            // query for posts with images
                            $args = array(
//                                'posts_per_page' => -1,
                                'post__in' => $parents
                            );
                        }

                    }
                    else{
                    // get all attachment IDs and their parent post IDs.
                        $images = new WP_Query( $image_args );
                        if ( $images->have_posts() ){
                            // get attachments parent post IDs: wp_list_pluck(list,field);
                            $parents = wp_list_pluck( $images->posts, 'post_parent' );
                            // remove duplicates and non attached images (parent == 0)
                            $parents = array_filter( array_unique( $parents ) );
                            // query for posts without images
                            $args = array(
//                                'posts_per_page' => -1,
                                'post__not_in' => $parents
                            );
                        }
                    }

                }else if(!empty( $start = $_REQUEST['date-start']) && !empty($end = $_REQUEST['date-end'])){
                    $args = array(
                        'date_query' => array(
                            array(
                                'after'     => $start,
                                'before'    => $end,
                                'inclusive' => true,
                            ),
                        ),
                    );
                }else if(!empty($korean_speak = $_REQUEST['korean-speak'])){
                    $args = array(
                        'meta_key' => 'korean_speak',
                        'meta_value' => $korean_speak
                    );
                }else if(!empty($english_speak = $_REQUEST['english-speak'])){
                    $args = array(
                        'meta_key' => 'english_speak',
                        'meta_value' => $english_speak
                    );
                }else if(!empty($stay = $_REQUEST['stay-in'])){
                    $args = array(
                        'meta_key' => 'stay_in',
                        'meta_value' => $stay
                    );
                }else if(!empty($gender = $_REQUEST['gender'])){
                    $args = array(
                        'meta_key' => 'gender',
                        'meta_value' => $gender
                    );
                }
                else{ //If there's no value/data received from any textbox
                    $args = array(
                        'posts_per_page' => 10
                    );
                }

*/

                $args = array(
                    'posts_per_page' => 10,

                );
                $query = new WP_Query( $args );
                if ( have_posts() )

                while ( have_posts() ) : the_post(); ?>

                  <div class="row post" data-post-id="<?php the_ID()?>">
                        <div class="col-xs-12 col-sm-2 col-lg-2 img-list">
                            <img src="<?php echo forum()->get_first_image(get_the_ID()); ?>">
                        </div>
                        <div class="col-xs-12 col-sm-4 col-lg-5 content-info">
                            <div class="name-text text-capitalize">
                                <h1><?php echo get_post_meta( get_the_ID(), 'name', true ); ?></h1>
                            </div>
                            <div class="position-text text-capitalize">
                                Application Field:
                                <?php echo get_post_meta( get_the_ID(), 'position', true ); ?> 
                            </div>
                            <div class="inline-text text-capitalize">
                                <?php $gender = get_post_meta( get_the_ID(), 'gender', true );
                                    if($gender == 'F'){echo "Female";}
                                    else{ echo "Male"; }
                                ?> |
                                <?php echo get_post_meta( get_the_ID(), 'age', true ); ?> years old |
                                Lives in: <?php echo get_post_meta( get_the_ID(), 'location', true ); ?> |
                            </div>
                            <div class="text-capitalize">
                                Education:
                                <?php
                                $education = get_post_meta( get_the_ID(), 'education_attainment', true ); 
                                echo str_replace("_"," ", $education); ?>
                            </div>
                            <div class="description-text ">
                                <?php                                  
                                $content = get_the_title();
                                if ( strlen( $content ) > 100 ) {
                                    $content = mb_strcut( $content, 0, 100 );
                                }
                                echo $content;
                                ?>
                            </div>
                            <div class="col-lg-12 col-md-12 col-xs-12 btn-group padding-top">
                                <div class="pull-left">
                                <button type="button" class="btn btn-primary">Send SMS Message</button>
                                </div>
                                <div class="pull-right">
                                <a type="button" href="<?php echo esc_url( get_permalink() )?>"> View Profile </a> 
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-4 col-sm-2 col-lg-2 author text-center"><?php the_author()?></div>
                        <div class="col-xs-4 col-sm-2 col-lg-1 date text-center" title="<?php echo get_the_date()?>"><?php echo get_the_date('Y/m/d')?></div>
                        <div class="col-xs-4 col-sm-2 col-lg-1 no-of-view text-center"><?php echo number_format(post()->getNoOfView( get_the_ID() ) )?></div>

                    </div>
                <?php endwhile; ?>

        </div>


        <?php
        // Previous/next page navigation.
        $links = paginate_links( array(
            'mid_size'              => 5, // 현재 글 양 옆으로 보여 줄 글 개수
            'prev_text'             => __('<<', 'k-forum'),
            'next_text'             => __('>>', 'k-forum'),
            'before_page_number'    => '', // 글 번호 앞에 추가할 markup
            'after_page_number'     => '', // 글 번호 뒤에 추가 할 markup
            'end_size' => 0, //
            'type' => 'array',
        ) );
        if ( $links ) {
            $r = "<div class='pagination'><ul>\n\t<li>";
            $r .= join("</li>\n\t<li>", $links);
            $r .= "</li>\n</ul>\n</div>\n";
            echo $r;
        }
        ?>
    </main>
<?php get_footer(); ?>