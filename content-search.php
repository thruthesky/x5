<!-- CONTENT OF SEARCH -->

    <div class="row post" data-post-id="<?php the_ID()?>">
        <div class="col-xs-12 col-sm-2 col-lg-2">
            <img src="<?php echo forum()->get_first_image(get_the_ID()); ?>" style="height:100px;width:100px;">
        </div>
        <div class="col-xs-12 col-sm-4 col-lg-6  title">
            <h2>
                <a href="<?php echo esc_url( get_permalink() )?>">
                    <?php
                    $content = get_the_title();
                    if ( strlen( $content ) > 100 ) {
                        $content = mb_strcut( $content, 0, 100 );
                    }
                    echo $content;
                    ?>
                    <span class="title-no-of-view"><?php
                        $count = wp_count_comments( get_the_ID() );
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
        <div class="col-xs-4 col-sm-2 col-lg-1 date" title="<?php echo get_the_date()?>"><?php post()->the_date()?></div>
        <div class="col-xs-4 col-sm-2 col-lg-1 no-of-view"><?php echo number_format(post()->getNoOfView( get_the_ID() ) )?></div>
    </div>
