<?php
include_once 'forum-job-maid.php';

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
        <?php get_search_form(); ?> 

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
		    	if ( have_posts() ) : while( have_posts() ) : the_post();
        		// CALL THE CONTENT-SEARCH
	            get_template_part('content', 'search');
	            ?>
	                
	            <?php endwhile; else : ?>

	                <div class="no-post">

	                    <?php _e('There is no post under this forum.', 'k-forum')?>
	                </div>

	            <?php endif; 

		        ?>
			    

            
        </div>

    </main>
<?php

get_footer();
