<?php $hero = get_field('hero'); ?>
<?php $awardBanner = get_field('award_banner'); ?>
<?php $featuredtitle = get_field('feature_title'); ?>
<?php $featuredgallery = get_field('feature_brands'); ?>
<?php $benefits_sections = get_field('benefits_sections'); ?>


<!-- <pre>
<?php print_r($featuredgallery); ?>
</pre> -->

<?php get_header(); ?>
<div class="container">

    <div class="hero">
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

    <div class="award-banner">
        <?php if (!empty($awardBanner)): ?>
            <img src="<?php echo $awardBanner['url']; ?>" alt="<?php echo $awardBanner['alt']; ?>">
        <?php endif; ?>
    </div>

    <div class="featur-section">
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

            <section class="benefits-section <?php echo !empty($section['reverse_layout'] == 1) ? 'reverse' : ''; ?>">


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
</div>

<?php get_footer(); ?>