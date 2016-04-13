<?php
abc()->header();



if ( abc()->route() ) echo abc()->getTemplate();
else if ( have_posts() ) {
    while ( have_posts() ) {
        the_post();
        get_template_part( 'content', get_post_format() );
    }
}
abc()->footer();