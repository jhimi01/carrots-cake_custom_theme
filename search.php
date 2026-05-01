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
                            <div class="post-categories">
                                <?php
                                $post_cats = get_the_category();
                                foreach ($post_cats as $pc):
                                    ?>
                                    <span class="badge">
                                        <a href="<?= get_category_link($pc->term_id); ?>">
                                            <?= esc_html($pc->name); ?>
                                        </a>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                            <p class="date"><?php echo get_the_date(); ?></p>
                        </div>
                        <h5 class="post-title"><?php the_title(); ?></h5>
                        <div class="author">
                            <img src="https://img.magnific.com/premium-vector/user-profile-icon-circle_1256048-12499.jpg"
                                class="author-img" alt="">
                            <p><?php the_author(); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php
                the_posts_pagination([
                    'mid_size' => 2,
                    'prev_text' => '←',
                    'next_text' => '→',
                ]);
                ?>
            </div>

        <?php else: ?>
            <div style="text-align:center; padding: 80px 20px;">
                <h3 style="color: var(--gray); margin-bottom: 16px;">
                    No results found for "<?php echo get_search_query(); ?>"
                </h3>
                <p style="color: var(--gray); margin-bottom: 32px;">
                    Try different keywords or browse all articles below.
                </p>
                <a href="<?= get_permalink(get_option('page_for_posts')); ?>">
                    <button class="active-btn" style="padding: 12px 28px; font-size: 16px;">
                        Browse All Articles
                    </button>
                </a>
            </div>
        <?php endif; ?>

        <!-- Subscription section -->
        <?= do_shortcode('[contact_section]') ?>

    </div>
</section>

<?php get_footer(); ?>