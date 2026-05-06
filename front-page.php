<?php get_header(); ?>

<div class="page-builder">
    <?php if (have_rows('page_sections')): ?>

        <?php while (have_rows('page_sections')):
            the_row(); ?>

            <!-- debug: show current layout -->
            <!-- <div style="background:#000; color:#0f0; padding:5px; font-size:12px;">
                Current Layout: <?php echo get_row_layout(); ?>
            </div> -->

            <?php if (get_row_layout() == 'hero'): ?>

                <?php get_template_part('template-parts/homepage-sections/hero-section'); ?>

            <?php elseif (get_row_layout() == 'award_banner'): ?>

                <?php get_template_part('template-parts/homepage-sections/awardbanner-section'); ?>

            <?php elseif (get_row_layout() == 'featured_brands'): ?>

                <?php get_template_part('template-parts/homepage-sections/featured-section'); ?>

            <?php elseif (get_row_layout() == 'post_feature'): ?>

                <?php get_template_part('template-parts/homepage-sections/articles-section'); ?>

            <?php elseif (get_row_layout() == 'benefits_sections'): ?>

                <?php get_template_part('template-parts/homepage-sections/benifits-section'); ?>

            <?php elseif (get_row_layout() == 'cta__process'): ?>

                <?php get_template_part('template-parts/homepage-sections/process'); ?>

            <?php elseif (get_row_layout() == 'ad_section'): ?>

                <?php get_template_part('template-parts/homepage-sections/ad'); ?>

            <?php else: ?>

                <!-- debug: unknown layout -->
                <div style="background:red; color:white; padding:10px;">
                    Unknown layout: <?php echo get_row_layout(); ?>
                </div>

            <?php endif; ?>
        <?php endwhile; ?>
    <?php else: ?>

        <!-- debug: no flexible content found -->
        <div style="background:red; color:white; padding:10px;">
            No rows found in 'page_sections'
        </div>

    <?php endif; ?>

    <?php get_template_part('template-parts/homepage-sections/articles-section'); ?>

</div>
<?php get_footer(); ?>