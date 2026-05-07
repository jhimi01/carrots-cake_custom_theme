<?php
$title = get_sub_field('title');
$posts = get_sub_field('selected_articles');
$terms = get_sub_field('categories');
$postobject = get_sub_field('post_object');
?>

<!-- <?php

// echo '<pre>';
// var_dump($postobject);
// echo '</pre>';
?> -->

<section class="home-article">

    <h2><?php echo $title; ?></h2>
    <div class="articles container">

        <?php if ($posts): ?>
            <?php foreach ($posts as $post):
                setup_postdata($post); ?>

                <?php get_template_part('template-parts/article', 'card'); ?>

            <?php endforeach; ?>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </div>



    <!-- learning & practicing -->

    <!-- <?php if ($terms): ?>
        <?php foreach ($terms as $term): ?>

            <h3><?php echo $term->name; ?></h3>

        <?php endforeach; ?>
    <?php endif; ?> -->

    <!-- <?php if ($postobject): ?>

    <?php foreach ($postobject as $post):
        setup_postdata($post); ?>

        <h3><?php the_title(); ?></h3>

    <?php endforeach; ?>

    <?php wp_reset_postdata(); ?>

<?php endif; ?> -->





</section>