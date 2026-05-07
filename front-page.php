<?php get_header(); ?>

<div class="page-builder">
    <?php if (have_rows('page_sections')):

        while (have_rows('page_sections')):
            the_row();

            // <!-- debug: show current layout -->
            //  <div style="background:#000; color:#0f0; padding:5px; font-size:12px;">
            // Current Layout:  echo get_row_layout();
            // </div> 
    
            if (get_row_layout() == 'video_banner'):

                get_template_part('template-parts/homepage-sections/video-banner');

            elseif (get_row_layout() == 'hero'):

                get_template_part('template-parts/homepage-sections/hero-section');

            elseif (get_row_layout() == 'award_banner'):

                get_template_part('template-parts/homepage-sections/awardbanner-section');

            elseif (get_row_layout() == 'featured_brands'):

                get_template_part('template-parts/homepage-sections/featured-section');

            elseif (get_row_layout() == 'post_feature'):

                get_template_part('template-parts/homepage-sections/articles-section');

            elseif (get_row_layout() == 'benefits_sections'):

                get_template_part('template-parts/homepage-sections/benifits-section');

            elseif (get_row_layout() == 'cta__process'):

                get_template_part('template-parts/homepage-sections/process');

            elseif (get_row_layout() == 'ad_section'):

                get_template_part('template-parts/homepage-sections/ad');

            elseif (get_row_layout() == 'faq_section'):

                get_template_part('template-parts/homepage-sections/faq-section');

            else: ?>

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


</div>
<?php get_footer(); ?>