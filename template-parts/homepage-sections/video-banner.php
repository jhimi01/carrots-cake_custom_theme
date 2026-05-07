<?php
$title = get_sub_field('title');
$button = get_sub_field('button');
$video = get_sub_field('hero_video');
?>

<!-- <pre>
    <?php
    print_r($video);
    ?>
</pre> -->

<section class="video-banner">

    <?php if ($video): ?>
        <video autoplay muted loop playsinline class="banner-video">
            <source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type'] ?>">
        </video>
    <?php endif; ?>

    <div class="video-overlay"></div>

    <div class="video-content">
        <h1><?php echo $title; ?></h1>

        <?php if ($button): ?>
            <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target'] ?>">
                <button>
                    <?php echo $button['title']; ?>
                </button>
            </a>
        <?php endif; ?>
    </div>

</section>