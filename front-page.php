<?php $hero = get_field('hero'); ?>
<?php $awardBanner = get_field('award_banner'); ?>
<?php $featuredtitle = get_field('feature_title'); ?>
<?php $featuredgallery = get_field('feature_brands'); ?>
<?php $benefits_sections = get_field('benefits_sections'); ?>
<?php $ad_img = get_field('ad_img'); ?>
<?php $ad_title = get_field('ad_title'); ?>
<?php $ad_sub_title = get_field('ad_sub_title'); ?>
<?php $app_store_btn = get_field('ad_app_store_btn'); ?>
<?php $app_store_btn_img = get_field('ad_app_store_btn_img'); ?>
<?php $process = get_field('process'); ?>



<!-- <pre>
<?php print_r($process); ?>
</pre> -->

<?php get_header(); ?>
<div class="">

    <div class="hero container">
        <div class="hero-text">

            <h1><?php echo wp_kses_post($hero['title']); ?></h1>
            <h3><?php echo wp_kses_post($hero['sub-title']); ?></h3>
            <h5><?php echo $hero['desc']; ?></h5>
            <div class="btn-sec">
                <a href="<?php echo $hero['button_link'] ?>"> <button
                        class="bg-orange"><?php echo $hero['button_text']; ?></button></a>
            </div>
        </div>
        <div class="hero-img">
            <?php if (!empty($hero['image'])): ?>
                <img src="<?php echo $hero['image']['url']; ?>" alt="<?php echo $hero['image']['alt']; ?>">
            <?php endif; ?>
        </div>
    </div>

    <div class="award-banner container">
        <?php if (!empty($awardBanner)): ?>
            <img src="<?php echo $awardBanner['url']; ?>" alt="<?php echo $awardBanner['alt']; ?>">
        <?php endif; ?>
    </div>

    <div class="featur-section container">
        <h3><?php echo $featuredtitle ?></h3>
        <div class="brands-gallery">
            <?php if (!empty($featuredgallery)): ?>
                <?php foreach ($featuredgallery as $gallery): ?>
                    <div class="brand-container-img">
                        <img src="<?php echo $gallery['url'] ?>" alt="<?php echo $gallery['alt'] ?>">
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($benefits_sections): ?>
        <?php foreach ($benefits_sections as $section): ?>

            <section class="benefits-section container <?php echo !empty($section['reverse_layout'] == 1) ? 'reverse' : ''; ?>">


                <div class="benefits-image">
                    <?php if (!empty($section['img'])): ?>
                        <img src="<?php echo esc_url($section['img']['url']); ?>"
                            alt="<?php echo esc_attr($section['img']['alt']); ?>">
                    <?php endif; ?>
                </div>

                <div class="benefits-content">

                    <h3><?php echo esc_html($section['title']); ?></h3>

                    <?php if (!empty($section['list'])): ?>
                        <?php foreach ($section['list'] as $item): ?>
                            <div class="benefit-item">
                                <div class="list-circle"></div>
                                <div class="benefit-text">
                                    <h4><?php echo esc_html($item['list_title']); ?></h4>
                                    <h5><?php echo esc_html($item['list_desc']); ?></h5>
                                </div>

                            </div>

                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>

            </section>

        <?php endforeach; ?>
    <?php endif; ?>

    <?php echo do_shortcode('[articles posts_per_page="4"]'); ?>

    <?php get_template_part('template-parts/subscription', 'section'); ?>

    <div class="bg-orange process">
        <div class="container">
            <h2><?php echo $process['title'] ?></h2>
            <div class="icons"><?php foreach ($process['steps'] as $step): ?>
                    <h4><div>
                        <i class="fa-solid fa-check"></i>
                    </div>
                        <span>
                            <?php echo $step['step'] ?>
                    </span>
                    </h4>
                <?php endforeach; ?>
            </div>
            <a href="<?php echo $process['btn_link'] ?>">
                <button class="start-btn"><?php echo $process['btn_text'] ?></button>
            </a>
        </div>
    </div>

    <div class="ad-section container ">
        <div class="ad bg-orange">

            <div>
                <h4><?php echo $ad_title ?></h4>
                <h5><?php echo $ad_sub_title ?></h5>
                <a href="<?php echo $app_store_btn['url'] ?>" target="<?php echo $app_store_btn['target'] ?>">
                    <img src="<?php echo $app_store_btn_img['url'] ?>" alt="<?php echo $app_store_btn_img['alt'] ?>">
                </a>
            </div>
    
            <div class="ad-content-img">
                <img src="<?php echo $ad_img['url'] ?>" alt="<?php echo $ad_img['alt'] ?>">
            </div>
        </div>
    </div>



</div>

<?php get_footer(); ?>