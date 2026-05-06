<?php
$benifitsContent = get_sub_field('benifits_content');
?>

<!-- 
<pre>
    <?php print_r($benifitsContent); ?>
</pre> -->

<?php if ($benifitsContent): ?>
    <?php foreach ($benifitsContent as $section): ?>
        <section
            class="benefits-section container <?php echo !empty($section['reverse_layout']) && $section['reverse_layout'] == 1 ? 'reverse' : ''; ?>">
            <div class="benefits-image">
                <?php if (!empty($section['image'])): ?>
                    <img src="<?php echo ($section['image']['url']); ?>" alt="<?php echo ($section['image']['alt']); ?>">
                <?php endif; ?>
            </div>
            <div class="benefits-content">
                <h3><?php echo ($section['title']); ?></h3>

                <?php if (!empty($section['list'])): ?>
                    <?php foreach ($section['list'] as $item): ?>
                        <div class="benefit-item">
                            <div class="list-circle"></div>
                            <div class="benefit-text">
                                <h4><?php echo ($item['list_title']); ?></h4>
                                <h5><?php echo ($item['list_desc']); ?></h5>
                            </div>

                        </div>

                    <?php endforeach; ?>
                <?php endif; ?>

            </div>

        </section>

    <?php endforeach; ?>
<?php endif; ?>