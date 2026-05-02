<?php get_header(); ?>

<section>
    <div class="container">

        <div class="article-header">
            <h1>
                <?php if (get_search_query()): ?>
                    Search results for: "<?php echo get_search_query(); ?>"
                <?php else: ?>

                <?php endif; ?>
            </h1>
        </div>

        <!-- Search results using the same article card layout -->
        <?php if (have_posts()): ?>
            <div class="articles">
                <?php while (have_posts()):
                    the_post(); ?>

                    <div class="article-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>

                        <div class="info">
                            <div class="badge"><?php the_category(); ?></div>
                            <p class="date"><?php echo get_the_date(); ?></p>
                        </div>

                        <h5 class="post-title"><?php the_title(); ?></h5>

                        <div class="author">
                            <img src="https://img.magnific.com/premium-vector/user-profile-icon-circle_1256048-12499.jpg"
                                class="author-img">
                            <p><?php the_author(); ?></p>
                        </div>

                    </div>

                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php
                echo paginate_links([
                    'base' => add_query_arg('paged', '%#%'),
                    'format' => '',
                    'current' => max(1, $paged),
                    'total' => $wp_query->max_num_pages,
                    'prev_text' => '←',
                    'next_text' => '→',
                ]);
                ?>
            </div>

        <?php else: ?>
            <h3>No posts found.</h3>
        <?php endif; ?>

        <!-- Subscription section -->
        <?= do_shortcode('[contact_section]') ?>

    </div>
</section>

<?php get_footer(); ?>