<?php get_header(); ?>

<section>
    <!------ article page header ------>

    <div class="bg-beige"></div>
    <div class="container">


        <div class="article-header">
            <h1>Articles</h1>
            <div class="quick-links-search">
                <div class="quick-link">
                    <p>Quick links:</p>
                    <a href="/">Screen time</a>
                    <a href="/">Parenting Tips</a>
                    <a href="/">Parental Controls</a>
                    <a href="/">Platform Comparison</a>
                </div>

                <div class="quick-search">
                    <form method="get" action="">
                        <input type="text" name="art_search"
                            value="<?php echo isset($_GET['art_search']) ? esc_attr($_GET['art_search']) : ''; ?>"
                            placeholder="Search articles...">
                        <button type="submit">Search</button>
                    </form>
                </div>

            </div>
        </div>

        <div class="all-buttons ">


            <a href="<?= get_permalink(get_option('page_for_posts')); ?>">
                <button class="active-btn">All</button>
            </a>

            <?php $categories = get_categories([
                'hide_empty' => false,
            ]);

            foreach ($categories as $category):
                if ($category->slug === 'uncategorized')
                    continue;
                ?>

                <a href="<?= get_category_link($category->term_id); ?>">
                    <button><?= $category->name; ?></button>
                </a>
            <?php endforeach; ?>
        </div>

        <div class="small-banner">
            <div class="small-banner-text-content">
                <h3>Games That Give Out Free Robux: Real or Scam?</h3>
                <p>
                    The ultimate truth about Robux-giving games and what actually works Seen those games that give out
                    free Robux advertised everywhere? YouTube ads promising "1000 Robux for playing 5 minutes," TikTok
                    videos showing kids getting "unlimited Robux" from mystery games, or Discord servers claiming you
                    can earn hundreds of Robux just by clicking buttons? Here's the […]
                </p>
            </div>
            <a class="feature-img" href="/">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/roblox-rain.webp" alt="banner">
            </a>
        </div>

        <!----------------- articles ------------------->
        <?= do_shortcode('[articles]'); ?>



        <!-- subscription  -->
        <?= do_shortcode('[contact_section]') ?>


    </div>
</section>

<?php get_footer(); ?>