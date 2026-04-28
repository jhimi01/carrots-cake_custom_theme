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
                <h2>Games That Give Out Free Robux: Real or Scam?</h2>
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
            <div class="article-card">
                <img src="" alt="">
                <div class="badge">Carrots&cake Guides</div>
                <p class="date">September 28, 2025</p>
                <div class="author">
                    <img src="" class="author-img" alt="">
                    <p>Azahar Sulaiman</p>
                </div>
            </div>
            <div class="pagination">
                <p>1</p>
                <p>2</p>
                <p>3</p>
                <p>...</p>
            </div>
        </div>

    </div>
</section>

<?php get_footer(); ?>