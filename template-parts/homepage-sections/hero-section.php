<?php
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$desc = get_sub_field('desc'); 
$btn_text = get_sub_field('button_text');
$btn_link = get_sub_field('button_link');
$image = get_sub_field('hero_image');
?>

<section class="hero container">
    <div class="hero-text">

        <h1><?php echo wp_kses_post($title); ?></h1>
        <h3><?php echo wp_kses_post($subtitle); ?></h3>
        <h5><?php echo $desc; ?></h5>

        <div class="btn-sec">
            <a href="<?php echo $btn_link; ?>">
                <button class="bg-orange"><?php echo $btn_text; ?></button>
            </a>
        </div>

    </div>

    <div class="hero-img">
        <?php if (!empty($image)): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        <?php endif; ?>
    </div>
</section>