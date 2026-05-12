<?php
$title = get_sub_field('title');
$btn = get_sub_field('button');
$per_page_content = 3;
$total_rows = count(get_sub_field('contents'));
?>

<!-- <pre>
    <?php print_r($total_rows); ?>
 </pre> -->


<section class="container">

    <div class="content-lists">
        <h2><?php echo $title ?></h2>
        <?php
        if (have_rows('contents')): ?>
            <div class="contents">
                <?php
                $count = 0;
                while (have_rows('contents')):
                    the_row();
                    if ($count >= $per_page_content) {
                        break;
                    }

                    $img = get_sub_field('img');
                    $content_title = get_sub_field('content_title');
                    ?>

                    <div class="content-card">
                        <img src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
                        <h4><?php echo $content_title ?></h4>
                    </div>
                    <?php
                    $count++;
                endwhile; ?>

            </div>

            <?php if ($total_rows > $per_page_content): ?>
                <div class="content-btn">
                    <button style="display: none;" class="get-more-btn bg-orange" data-page="1" data-post-id="<?php echo get_the_ID() ?>"
                        data-contents-per-page="<?php echo $per_page_content; ?>">
                        <?php echo $btn ?>
                    </button>
                </div>
            <?php endif; ?>


        <?php endif; ?>
    </div>
</section>