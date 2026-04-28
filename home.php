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
                    <input type="text">
                    <button>Search</button>
                </div>

            </div>
        </div>

        <div class="all-buttons ">
            <button class="active-btn">All</button>
            <button>App Recommendation</button>
            <button>Carrots&Cake Guides</button>
            <button>Child Online Safety</button>
            <button>Digital Parenting News</button>
            <button>Parenting Hacks</button>
            <button>Parenting Videos</button>
            <button>Quick Parenting Tips</button>
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

        <!-- articles -->
        <div class="articles">

            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();

                    ?>

                    <div class="article-card">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a>
                        <div class="info">
                            <div class="badge">Carrots&cake Guides</div>
                            <p class="date">September 28, 2025</p>
                        </div>
                        <h5 class="post-title">
                            <?php the_title(); ?>
                        </h5>
                        <div class="author">
                            <!-- <img src="" class="author-img" alt=""> -->
                            <p>Azahar Sulaiman</p>
                        </div>

                    </div>

                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
            <!-- <div class="pagination">
                <p>1</p>
                <p>2</p>
                <p>3</p>
                <p>...</p>
            </div> -->
        </div>



        <!-- subscription  -->
        <div class="subscription">
            <div class="subs-text">
                <h2>Halve your kids’ overall screen time in 7 days with Carrots&Cake</h2>
                <h4 class="subs-text-h4">Now you can encourage your little ones to use good educational apps without the
                    tantrums.</h4>
                <ul>
                    <li>
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/check-mark.webp" alt="check mark">
                        <div>
                            <h4>Increase educational app usage by 200%</h4>
                            <h6>To unblock their games, kids must complete educational apps</h6>
                        </div>
                    </li>
                    <li>
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/check-mark.webp" alt="check mark">
                        <div>
                            <h4>Cut overall screen time in half</h4>
                            <h6>Enhance your family's digital well-being by setting personalized screen time limits.
                            </h6>
                        </div>
                    </li>
                    <li>
                        <img src="<?= get_template_directory_uri(); ?>/assets/images/check-mark.webp" alt="check mark">
                        <div>
                            <h4>Enjoy your first 7 days absolutely free</h4>
                            <h6>Enjoy all the premium features of Carrots&Cake without spending a penny. No credit card
                                required.</h6>
                        </div>
                    </li>
                </ul>
                <img class="app-store" src="<?= get_template_directory_uri(); ?>/assets/images/app-store.webp"
                    alt="app-store">
            </div>
            <div class="subs-img">
                <img src="<?= get_template_directory_uri(); ?>/assets/images/roblox-rain.webp" alt="">
                <form action="">
                    <input type="text" placeholder="Name" name="name">
                    <input type="email" placeholder="Email" name="email">
                    <button>Get a 7-day free trial</button>
                </form>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>