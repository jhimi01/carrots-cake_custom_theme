<?php
$title = get_sub_field('title');
$processSteps = get_sub_field('step');
$processbtnlink = get_sub_field('button_link')['url'];
$processbtnlinktarget = get_sub_field('button_link')['target'];
$processbtntext = get_sub_field('button_text');
?>

<!-- <pre>
<?php print_r($processbtnlink); ?>
</pre> -->


<div class="bg-orange process">
    <div class="container">
        <h2><?php echo $title ?></h2>
        <div class="icons"><?php foreach ($processSteps as $step): ?>
                <h4>
                    <div>
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <span>
                        <?php echo $step['step'] ?>
                    </span>
                </h4>
            <?php endforeach; ?>
        </div>
        <a href="<?php echo $processbtnlink ?>" target="<?php echo $processbtnlinktarget ?>">
            <button class="start-btn"><?php echo $processbtntext ?></button>
        </a>
    </div>
</div>