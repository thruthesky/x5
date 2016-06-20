<?php
include_once 'forum-job-maid.php';


/**
 * The template for displaying all single posts and attachments
 *
 *
 */

get_header();
wp_enqueue_style( 'forum-view-basic', FORUM_URL . 'css/forum-view-basic.css' );
wp_enqueue_style('view-maid', td() . '/css/forum/view-maid.css');

if ( ! have_posts() ) {
    // If it comes here, it is an error.
}
the_post();


$category = current(get_the_category());


?>


<div id="primary" class="content-area forum">

    <main id="main" class="site-main" role="main">

        <?php include FORUM_PATH . '/template/social-buttons.php';?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!--  <div class="title">
                <?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </div> -->

             <div class="forum-title">
                <a href="<?php echo home_url()?>/forum/<?php echo $category->slug?>">
                    <?php echo $category->name?>
                </a>
            </div>
            <div class="meta container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <?php printf(__('By %s', 'k-forum'), get_the_author())?>
                        /
                        <?php printf( __('No. : %s', 'k-forum'), get_the_ID()); ?>
                        Count of Viewers : <?php  echo post()->increaseNoOfView( get_the_ID() )?>
                    </div>
                    <div class="buttons col-xs-12 col-sm-6">
                        <a class="btn btn-secondary btn-sm" href="<?php echo forum()->editURL( get_the_ID() ) ?>">글 수정</a>
                        <a class="btn btn-secondary btn-sm" href="<?php echo home_url()?>/forum/<?php echo $category->slug?>">글 목록</a>
                        <a class="btn btn-secondary btn-sm" href="<?php echo forum()->doURL('post_delete&id=' . get_the_ID() )?>">글 삭제</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 maid-image">
                 <img src="<?php echo forum()->get_first_image(get_the_ID()); ?>">
            </div>

            <div class="col-md-6">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>Position</td>
                            <td><?php echo maid()->position();?></td>
                        </tr>

                        <tr>
                            <td>English Speak</td>
                            <td><?php echo maid()->english_speak();?></td>
                        </tr>

                        <tr>
                            <td>Korean Speak</td>
                            <td><?php echo maid()->korean_speak();?></td>
                        </tr>

                        <tr>
                            <td>Stay-in</td>
                            <td><?php echo maid()->stay_in();?></td>
                        </tr>

                        <tr>
                            <td>Name</td>
                            <td><?php echo maid()->name();?></td>
                        </tr>

                        <tr>
                            <td>Age</td>
                            <td><?php echo maid()->age();?></td>
                        </tr>

                        <tr>
                            <td>Mobile Number</td>
                            <td><?php echo maid()->mobile();?></td>
                        </tr>

                         <tr>
                            <td>Email Address</td>
                            <td><?php echo maid()->email();?></td>
                        </tr>

                         <tr>
                            <td>Number of Children</td>
                            <td><?php echo maid()->no_of_children();?></td>
                        </tr>

                        <tr>
                            <td>Educational Attainment</td>
                            <td><?php echo maid()->education();?></td>
                        </tr>

                    </tbody>
                </table>
                

                <?php
                the_content();

                //if ( '' !== get_the_author_meta( 'description' ) ) include 'biography.php';
                ?>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-md-12 col-lg-12 experience-text">
                    Year/s of Experience: <?php echo maid()->year_of_experience();?>
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 description-title">
                    Short Description:
                </div>
                <div class="col-xs-12 col-md-12 col-lg-12 description-content">
                    <?php the_title( '<p class="entry-title">', '</p>' ); ?>
                </div>
            </div>


    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>

