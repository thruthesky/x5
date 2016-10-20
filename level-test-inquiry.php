<?php
$args = [
    'category_name' => 'level-test-inquiry',
    'posts_per_page' => in('per_page', 200),
    'post_status' => 'private',
];
$_posts = get_posts($args);
foreach( $_posts as $post ) {
    $posts[] = jsonPost( $post );
}
/*print_r($posts);*/
?>

<style>
    .level-test-inquiry > div {
        padding: 30px 0;
    }
    .level-test-inquiry > div h2.title {
        padding: 20px 0;
    }
</style>
<section class="level-test-inquiry">
    <div>
        <h2 class="title"><?php _text("List of Inquiry"); ?></h2>
        <table class="table table-striped">
            <thead class="thead-inverse">
            <tr>
                <th><?php _text("#"); ?></th>
                <th><?php _text("Date"); ?></th>
                <th><?php _text("Time"); ?></th>
                <th><?php _text("Phone"); ?></th>
                <th><?php _text("Telephone"); ?></th>
                <th><?php _text("Message"); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ( $posts as $post ){ ?>
            <tr>
                <th scope="row"><?php echo $post->ID ?></th>
                <td><?php echo $post->date ?></td>
                <td><?php echo $post->time ?></td>
                <td><?php echo $post->phone ?></td>
                <td><?php echo $post->telephone ?></td>
                <td><?php echo $post->post_content ?></td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</section>