<?php 

add_shortcode('articles', 'function_articles');
function function_articles($atts)
{

    // it can overide post numbers for per page
    $atts = shortcode_atts([
        'posts_per_page' => 7,
    ], $atts);

    // pagination handler (it finds the current page number)
    $paged = max(
        1,
        get_query_var('paged'),
        get_query_var('page') // for static page (with shortcode)
    );

    $search = isset($_GET['art_search']) ? sanitize_text_field($_GET['art_search']) : '';

    $args = [
        'post_type' => 'post',
        'posts_per_page' => $atts['posts_per_page'],
        'paged' => $paged,
    ];

    // search when it not empty
    if (trim($search) !== '') {
        $args['s'] = $search;
    }

    // category filter
    if (is_category()) {
        $args['cat'] = get_queried_object_id();
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()):
        ?>
        <div class="articles container">

            <?php while ($query->have_posts()):
                $query->the_post(); ?>
                <?php get_template_part('template-parts/article', 'card'); ?>

            <?php endwhile; ?>
        </div>


        <div class="pagination">
            <?php
            echo paginate_links([
                'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))), //create url
                'format' => '',
                'current' => max(1, $paged), //Current page number
                'total' => $query->max_num_pages, //total pages
                'prev_text' => '←',
                'next_text' => '→',
            ]);
            ?>
        </div>

        <?php
        wp_reset_postdata();

    else:
        echo "<h3>No posts found.</h3>";
    endif;

    return ob_get_clean();
}