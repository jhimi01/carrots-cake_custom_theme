<?php
$title = get_sub_field('title');
$posts_per_page = get_sub_field('posts_per_page') ;
$btn = get_sub_field('button');
$inital_posts = 4;

$args = [
    'post_type' => 'post',
    'posts_per_page' => $inital_posts,
    'post_status' => 'publish',
];

$query = new WP_Query($args);

$categories = get_categories([
    'taxonomy' => 'category',
    'hide_empty' => true
])

    ?>

<section class="container">
    <div>
        <h2 class="post-list-title"><?php echo $title ?></h2>
        <div class="filter-container">
            <div class="search-field">
                <input type="text" placeholder="Search articles..." name="search" id="search-articles">
            </div>
            <div>

                <select name="category-filter" id="category-filter">
                    <option value="">All category</option>
                    <?php
                    foreach ($categories as $category):
                        if ($category->slug === 'uncategorized')
                            continue;
                        ?>
                        <option value="<?php echo $category->slug; ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="sort" id="sort">
                    <option value="">Sort By</option>
                    <option value="title_asc">A-Z</option>
                    <option value="title_desc">Z-A</option>
                    <option value="old">Oldest to Newest</option>
                    <option value="new">Newest to Oldest</option>
                </select>
            </div>
        </div>
    </div>
    <?php if ($query->have_posts()): ?>
        <div class="articles" id="article-container">
            <?php while ($query->have_posts()):
                $query->the_post();
                get_template_part('template-parts/article-card');
            endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>

        <!-- Hide button if only 1 page -->
        <div class="load-more-container">
            <button class="load-more-btn bg-orange" data-page="1" data-max-pages="<?php echo $query->max_num_pages; ?>"
                data-posts-per-page="<?php echo $posts_per_page; ?>" data-initial-posts="4">
                <?php echo $btn ?>
            </button>
        </div>

    <?php endif; ?>
</section>