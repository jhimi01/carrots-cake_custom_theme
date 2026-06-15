<?php get_header(); ?>

<main id="gsap-main">
    <section class="gsap-container">
        <div class="main-container">
            <div class="content">
                <h1>Hello, I'm JHIMI</h1>
            </div>
            <div class="portfolio-img">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/port.png" alt="portfolio">
            </div>
            <div class="small-text-msg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/msg3.png" alt="message">
            </div>
            <div class="bye-text-msg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/be.png" alt="message">
            </div>
            <!-- <div class="gradient-cericle"></div> -->
        </div>
        <div class="overlay">
            <h2>zz...</h2>
        </div>
    </section>

    <section class="scrollTriger-section">
        <div class="scroll-wrapper-horizontal">
            <div class="box box-1">1</div>
            <div class="box box-2">2</div>
            <div class="box">3</div>
            <div class="box">4</div>
            <div class="box">5</div>
            <div class="box">6</div>
            <div class="box">7</div>
            <div class="box">8</div>
        </div>
    </section>

    <!-- <section class="title">
        <h1>Good Bye 😊</h1>
    </section> -->
    <!-- <section class="title">
        <h1>Good Bye 😊</h1>
    </section>
    <section class="title">
        <h1>Good Bye 😊</h1>
    </section>
    <section class="title">
        <h1>Good Bye 😊</h1>
    </section>
    <section class="title">
        <h1>Good Bye 😊</h1>
    </section>
    <section class="title">
        <h1>Good Bye 😊</h1>
    </section> -->

    <div class="flower">
        <img src="<?php echo get_template_directory_uri() . '/assets/images/flw.png' ?>" alt="flower png">
    </div>
</main>

<?php get_footer(); ?>