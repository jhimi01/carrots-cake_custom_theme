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
        <?= do_shortcode('[articles]'); ?>


        <!-- Subscription section -->
        <?= do_shortcode('[contact_section]') ?>

    </div>
</section>

<?php get_footer(); ?>