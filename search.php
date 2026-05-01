<?php get_header(); ?>

<section class="container">

    <h1>
        Search results for: "<?php echo get_search_query(); ?>"
    </h1>

    <?php if (have_posts()) : ?>
        <div class="articles">

            <?php while (have_posts()) : the_post(); ?>

                <div class="article-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>

                    <h5><?php the_title(); ?></h5>
                    <p><?php echo get_the_date(); ?></p>

                </div>

            <?php endwhile; ?>

        </div>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>

</section>

<?php get_footer(); ?>