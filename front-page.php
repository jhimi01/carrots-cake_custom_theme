<?php get_header(); ?>
<div class="container">

    <div class="hero">
        <div class="hero-text">

            <h1>Chores & Learning First. <span class="text-orange">Robux</span> Later.</h1>
            <h3>Screentime that teaches <span class="text-orange">
                    responsibility
                </span>, not resistance.</h3>
            <h5>
                Put an end to screen time tantrums and hours wasted streaming and gaming. Now kids learn first and play
                later.
            </h5>
           <div class="btn-sec">
             <button class="bg-orange">Try it free</button>
           </div>
        </div>
        <div class="hero-img">
            <img src="<?= get_template_directory_uri(); ?>/assets/images/home_banner.webp" alt="hero img">
        </div>
    </div>
    <?php echo do_shortcode('[articles posts_per_page="6"]'); ?>

    <?= do_shortcode('[contact_section]') ?>
</div>

<?php get_footer(); ?>