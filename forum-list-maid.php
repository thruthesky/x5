<?php
 // include_once 'forum-maid-generate-post.php';

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

?>

    <main id="post-list" class="forum" xmlns="http://www.w3.org/1999/html">
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
        <div class="col-lg-12" id="content">

            <form method="post" action="<?php echo home_url( '/forum/maid' ); ?>">
                <!-- Search by position -->
                <div class="col-lg-4">
                    <label for="position">Position</label>
                    <input type="text" name="position" id="position" value="" class="form-control" placeholder="Position"/>
                </div>
                <!-- Search by Name -->
                <div class="col-lg-4">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="" class="form-control" placeholder="Name"/>
                </div>
                <!-- Search by number of children -->
                <div class="col-lg-4">
                    <label for="children_number">Number of Children</label>
                    <input type="text" name="children_number" id="children_number" value="" class="form-control" placeholder="Children"/>
                </div>
                <!-- Search by Age -->
                <div class="col-lg-4">
                    <label for="age">Age</label>
                    <input type="text" name="age" id="age" value="" class="form-control" placeholder="Age"/>
                </div>
                <!-- Search by Year of Experience -->
                <div class="col-lg-4">
                    <label for="experience">Experience</label>
                    <input type="text" name="experience" id="experience" value="" class="form-control" placeholder="Experience"/>
                </div>


                <!-- Search by Gender -->
                <div class="col-lg-4">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="col-lg-12 c-select">
                        <option selected disabled="">Gender:</option>
                        <option value="M">Male </option>
                        <option value="F">Female</option>
                    </select>
                </div>

                <!-- Search by With/Without Photo-->
                <div class="col-lg-4">
                    <label for="photo">Image</label>
                    <select name="photo" id="photo" class="col-lg-12 c-select">
                        <option selected disabled>Image: </option>
                        <option value="yes">With Photo</option>
                        <option value="no">Without Photo</option>
                    </select>
                </div>

                <!-- Search by Stay-in/out  -->
                <div class="col-lg-4">
                    <label for="stay-in">House Staying</label>
                    <select name="stay-in" id="stay-in" class="col-lg-12 c-select">
                        <option selected disabled>House Staying:</option>
                        <option value="yes">Stay-In </option>
                        <option value="no">Stay-Out</option>
                    </select> 
                </div>

                <!-- Search by Korean Speaking -->
                <div class="col-lg-4">
                    <label for="korean-speak">Korean Speaking</label>
                    <select name="korean-speak" id="korean-speak" class="col-lg-12 c-select">
                        <option selected disabled>Korean Speaking:</option>
                        <option value="no"> Can't Speak Korean </option>
                        <option value="little">Can Speak Korean a little</option>
                        <option value="good">Can Speak Korean fluently</option>
                    </select> 
                </div>

                 <!-- Search by English Speaking -->
                <div class="col-lg-4">
                    <label for="english-speak">English Speaking</label>
                    <select name="english-speak" id="english-speak" class="col-lg-12 c-select">
                        <option selected disabled>English Speaking:</option>
                        <option value="no"> Can't Speak English </option>
                        <option value="little">Can Speak English a little</option>
                        <option value="good">Can Speak English fluently</option>
                    </select> 
                </div>

                <!-- Search by Post Date -->
                <label for="post-date">Post Date Range:</label>
                <div id="post-date">
                    <div class="col-lg-4">
                        <input type="date" id="date-start" name="date-start" class="form-control" value=""/>
                    </div>
                    <div class="col-lg-4">
                        <input type="date" id="date-end" name="date-end" class="form-control" value=""/>
                    </div>
                </div>

                <div class="col-lg-12">
                    <input type="submit" value="Search!" class="btn btn-danger pull-lg-right btn-search" />
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
                $meta_query = array();
                // empty does not take an undefined value.
                if ( isset( $_REQUEST['name'] ) && ! empty( $_REQUEST['name']) ) {
                     $meta_query[] = array(
                        'key' => 'name',
                        'value' => $_REQUEST['name'],
                        'compare' => 'LIKE'
                    );
                }
                if( isset( $_REQUEST['children_number'] ) && ! empty( $_REQUEST['children_number']) ) {
                     $meta_query[] = array(
                        'key' => 'no_of_children',
                         'compare' => '=',
                        'value' => $_REQUEST['children_number']
                    );
                }
                if( isset( $_REQUEST['experience'] ) && ! empty( $_REQUEST['experience']) ){
                     $meta_query[] = array(
                        'key' => 'year_of_experience',
                         'compare' => '=',
                        'value' => $_REQUEST['experience']
                    );
                }
                if( isset( $_REQUEST['position'] ) && ! empty( $_REQUEST['position']) ){
                    $meta_query[] = array(
//                        's' => 'title',
//                         'compare' => 'LIKE',
                        'key' => 'position',
                        'compare' => 'LIKE',
                         'value' => $_REQUEST['position']
                    );
                }
                if( isset( $_REQUEST['age'] ) && ! empty( $_REQUEST['age']) ){
                    $meta_query[] = array(
                        'key' => 'age',
                        'value' => $_REQUEST['age']
                    );
                }
                 if( isset( $_REQUEST['email'] ) && ! empty( $_REQUEST['email']) ){
                      $meta_query[] = array(
                         'meta_key' => 'email',
                         'meta_value' => $_REQUEST['email']
                     );
                 }
                if( isset( $_REQUEST['photo'] ) && ! empty( $_REQUEST['photo']) ){
                    $image_args = array(
                        'post_type' => 'attachment',
                        'post_status' => 'inherit',
                        'post_mime_type' => 'image/jpeg',
                        'fields' => 'id=>parent'
                    );
                    if($_REQUEST['photo'] == yes){

                    // get all attachment IDs and their parent post IDs.
                        $images = new WP_Query( $image_args );
                        if ( $images->have_posts() ){
                            // get attachments parent post IDs
                            $parents = wp_list_pluck( $images->posts, 'post_parent' );
                            // remove duplicates and non attached images (zero values)
                            $parents = array_filter( array_unique( $parents ) );
                            // query for posts with images
                             $args = array(
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
                                'post__not_in' => $parents
                            );
                        }
                    }
                }
                if( isset( $_REQUEST['date-start'] ) && ! empty( $_REQUEST['date-start']) &&  isset( $_REQUEST['date-end'] ) && ! empty( $_REQUEST['date-end']) ){
                 $args = array(
                    'date_query' => array(
                        array(
                            'after'     => $_REQUEST['date-start'],
                            'before'    => $_REQUEST['date-end'],
                            'inclusive' => true
                        ),
                    ),
                );
                }
                if( isset( $_REQUEST['korean-speak'] ) && ! empty( $_REQUEST['korean-speak']) ){
                     $meta_query[] = array(
                        'key' => 'korean_speak',
                        'value' => $_REQUEST['korean-speak']
                    );
                }if( isset( $_REQUEST['english-speak'] ) && ! empty( $_REQUEST['english-speak']) ){
                     $meta_query[] = array(
                        'key' => 'english_speak',
                        'value' => $_REQUEST['english-speak']
                    );
                }if( isset( $_REQUEST['stay-in'] ) && ! empty( $_REQUEST['stay-in']) ){
                     $meta_query[] = array(
                        'key' => 'stay_in',
                        'value' => $_REQUEST['stay-in']
                    );
                }if( isset( $_REQUEST['gender'] ) && ! empty( $_REQUEST['gender']) ){
                     $meta_query[] = array(
                        'key' => 'gender',
                        'value' => $_REQUEST['gender']
                    );
                }


                /* If $args is not empty, it will execute the WP Query
                * Whereas, if the $meta_query is not empty, it will put the $meta_query to $args
                * then execute the WP Query.
                * I there's no $args/$meta_query sent, it will display all posts
                */
                if( isset($args) ){
                    $query = new WP_Query( $args );

                }else if( isset($meta_query) ){
                    $args = array(
                            'post_type' => 'post',
                            'relation' => 'AND',
                            'meta_query' => $meta_query
                    );
                }else{
                   $args = array(
                        'posts_per_page' => 10
                    );
                }

                $query = new WP_Query( $args );

                if ( $query->have_posts() )

                while ( $query->have_posts() ) : $query->the_post(); ?>

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