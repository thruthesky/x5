<?php

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

        <!-- SEARCH FORM -->
        <div class="col-md-12">

            <!-- Search by Name -->
            <form method="get" action="<?php echo home_url( '/forum/maid' ); ?>">
                <div class="col-md-2 form-group">
                    <input name="name" value="" placeholder="Input name like 'Mari*'">
                </div>
                <!-- Search by post date -->
                <div class="col-md-6">
                    <input name="date_from">~<input name="date_to">
                </div>
                <div class="col-md-2">
                    <input name="no_of_children" value="<?php echo $_REQUEST['no_of_children']?>" placeholder="No. of Children">
                </div>
                <input type="submit">
            </form>
            <!-- Search by Age -->
            <div class="col-md-2">
            </div>
            <!-- Search by Year of Experience -->
            <div class="col-md-2">
            </div>
        </div>
        <!-- END OF SEARCH FORM -->

        <div class="container post-list-container">
            <div class="row header">
                <div class="col-xs-12 col-sm-2 col-lg-2">
                    <?php _e('Photo', 'k-forum')?>
                </div>
                <div class="col-xs-12 col-sm-4 col-lg-6"><?php _e('Description', 'k-forum')?></div>
                <div class="col-xs-4 col-sm-2 col-lg-2 author"><?php _e('글쓴이', 'k-forum')?></div>
                <div class="col-xs-4 col-sm-2 col-lg-1 date"><?php _e('Date', 'k-forum')?></div>
                <div class="col-xs-4 col-sm-2 col-lg-1 no-of-view" title="<?php _e('No. of Views', 'k-forum')?>"><?php _e('Views', 'k-forum')?></div>
            </div>
            <?php
            if(!empty($_POST['name'])){
                 $id = (int) $_POST['name'];
            }else if(!empty($_POST['date'])){
                $id = (int) $_POST['date'];
            }
           
            if(!empty($id)){ ?>
                <!-- IF YOU CHOSE APPLICANT/DATE ON SELECT -->
                <div class="row post" data-post-id="<?php echo $id;?>">
                    <div class="col-xs-12 col-sm-2 col-lg-2">
                        <img src="<?php echo forum()->get_first_image($id);?>" style="height:100px;width:100px;">
                    </div>
                    <div class="col-xs-12 col-sm-4 col-lg-6  title">
                        <h2>
                            <a href="<?php echo esc_url( get_permalink($id) )?>">
                                <?php
                                $content = get_the_title($id);
                                if ( strlen( $content ) > 100 ) {
                                    $content = mb_strcut( $content, 0, 100 );
                                }
                                echo $content;
                                ?>
                                <span class="title-no-of-view"><?php
                                    $count = wp_count_comments( $id );
                                    if ( $count->approved )  echo "({$count->approved})";
                                    ?></span>
                                <?php
                                if ( post()->getNoOfImg( get_the_content() ) ) {
                                    echo '<span class="dashicons dashicons-format-gallery"></span>';
                                }
                                ?>
                            </a>
                        </h2>
                    </div>
                    <div class="col-xs-4 col-sm-2 col-lg-2 author"><?php the_author()?></div>
                    <div class="col-xs-4 col-sm-2 col-lg-1 date" title="<?php echo get_the_date($id)?>"><?php post()->the_date()?></div>
                    <div class="col-xs-4 col-sm-2 col-lg-1 no-of-view"><?php echo number_format(post()->getNoOfView( $id ) )?></div>
                </div>
            <?php
            }else{




                $the_query = new WP_Query( array( 'meta_key' => 'no_of_children', 'meta_value' => $_REQUEST['no_of_children'] ) );

                // The Loop
                if ( $the_query->have_posts() ) {
                    echo '<ul>';
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        $url = get_permalink();
                        echo "<li><a href='$url'>" . get_the_title() . '</a></li>';
                    }
                    echo '</ul>';
                }



                            }
            ?>
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
<?php

get_footer();
