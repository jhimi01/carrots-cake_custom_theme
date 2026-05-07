<?php
$title = get_sub_field('title');
$faq = get_sub_field('q_&_a');
?>


<!-- <pre>
<?php echo print_r($faq); ?>
</pre> -->


<?php if ($faq) : ?>
<section class="faq-section container">
 <h3 class="faq-heading"><?php echo $title ?></h3>
    <div class="faq-items">

        <?php foreach ($faq as $item) : ?>

            <div class="faq-item">

                <div class="faq-question">

                    <h3>
                        <?= $item['qns']; ?>
                    </h3>

                    <span class="faq-icon">+</span>

                </div>

                <div class="faq-answer">

                   <?= wpautop(wp_kses_post($item['ans'])); ?>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</section>
<?php endif; ?>