<?php
$awardBanner = get_sub_field('banner_image')
?>
<div class="award-banner container">
    <?php if (!empty($awardBanner)): ?>
        <img src="<?php echo $awardBanner['url']; ?>" alt="<?php echo $awardBanner['alt']; ?>">
    <?php endif; ?>
</div>