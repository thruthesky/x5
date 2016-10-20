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
print_r($posts);
?>

<section>
    <div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Time</th>
                <th>Phone</th>
                <th>Telephone</th>
                <th>Message</th>
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