<?php
$title = get_sub_field('title');
$btn = get_sub_field('button');
$per_page_content = 3;
$contents = get_sub_field('contents'); // all repeater contents

$total_contents = count($contents);

?>

<!-- <pre>
    <?php print_r($contents); ?>
 </pre> -->


<section class="container">

    <div class="content-lists">
        <h2><?php echo $title ?></h2>
        <?php
        if ($contents): ?>
            <div class="contents">
                <?php
                $count = 0;
                foreach ($contents as $content):
                    if ($count >= $per_page_content) {
                        break;
                    }
                    ?>
                    <div class="content-card">
                        <img src="<?php echo $content['img']['url'] ?>" alt="<?php echo $content['img']['alt'] ?>">
                        <h4><?php echo $content['content_title'] ?></h4>
                    </div>
                    <?php
                    $count++;
                endforeach; ?>

            </div>

            <?php if ($total_contents > $per_page_content): ?>
                <div class="content-btn">
                    <button class="get-more-btn bg-orange" data-page="1" data-post-id="<?php echo get_the_ID() ?>"
                        data-contents-per-page="<?php echo $per_page_content; ?>">
                        <?php echo $btn ?>
                    </button>
                </div>
            <?php endif; ?>


        <?php endif; ?>
    </div>
</section>