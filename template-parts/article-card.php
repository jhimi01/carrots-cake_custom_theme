<article class="article-card">
    <a class="feature-img" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail(); ?>
    </a>

    <div class="info">
        <div class="badge"><?php the_category(); ?></div>
        <p class="date"><?php echo get_the_date(); ?></p>
    </div>

    <div class="article-content">
        <a href="<?php the_permalink(); ?>">
            <h5 class="post-title"><?php the_title(); ?></h5>
        </a>

        <p class="excerpt">
            <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
        </p>
    </div>

    <div class="author">
        <p><?php the_author(); ?></p>
    </div>
</article>