<?php 
$featuredtitle = get_sub_field('title');
$featuredgallery = get_sub_field('brands_img');
?>


<!-- <pre>
<?php echo($featuredgallery); ?>
</pre> -->

<div class="featured-section container">
        <h3><?php echo $featuredtitle ?></h3>
        <div class="brands-gallery">
            <?php if (!empty($featuredgallery)): ?>
                <?php foreach ($featuredgallery as $gallery): ?>
                    <div class="brand-container-img">
                        <img src="<?php echo $gallery['url'] ?>" alt="<?php echo $gallery['alt'] ?>">
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
