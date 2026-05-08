<?php
$title = get_sub_field('title');
$postposts_per_page = get_sub_field('postposts_per_page') ?: 4;
$btn = get_sub_field('button');

$args = [
    'post_type' => 'post',
    'posts_per_page' => $postposts_per_page,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
];

$query = new WP_Query($args);
?>

<section class="container">
    <h2 class="post-list-title"><?php echo $title ?></h2>

    <?php if ($query->have_posts()): ?>
        <div class="articles">
            <?php while ($query->have_posts()):
                $query->the_post();
                get_template_part('template-parts/article-card');
            endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>

        <!-- Hide button if only 1 page -->
        <div class="load-more-container">
            <button class="load-more-btn bg-orange" data-page="1" data-max-pages="<?php echo $query->max_num_pages; ?>"
                data-posts-per-page="<?php echo $postposts_per_page; ?>">
                <?php echo $btn ?>
            </button>
        </div>

    <?php endif; ?>
</section>