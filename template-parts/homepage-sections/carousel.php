<?php
$title = get_sub_field('title');
$carouselItems = get_sub_field('carousel_items');

?>
<!-- 
<pre>
    <?php print_r($carouselItems) ?>
</pre> -->


<div class=" carousel-section">
    <h2>
        <?php echo $title ?>
    </h2>
    <div class="carousel-wrapper-outer container">
        <div class="swiper-button-next">
            <i class="fa-solid fa-arrow-left"></i>
        </div>
        <div class="swiper mySwiper container">
            <div class="swiper-wrapper">
                <?php foreach ($carouselItems as $items): ?>
                    <div class="swiper-slide">
                        <div class="carousel-card" style="background-image: url('<?php echo $items['bg_img']['url'] ?>');">
                            <div class="carousel-overlap"></div>
                            <div class="carousel-contents">

                                <img src="<?php echo $items['img']['url'] ?>" alt="<?php echo $items['img']['alt'] ?>">
                                <div class="carousel-content-text">
                                    <div class="text-content-caro">
                                        <span class="category-badge"><?php echo $items['categories'] ?></span>
                                        <h4><?php echo $items['title'] ?></h4>
                                        <p><?php echo $items['excerpt_'] ?></p>
                                    </div>
                                    <a class="carousel-btn"
                                        href="<?php echo $items['buttom']['url'] ?>"><?php echo $items['buttom']['title'] ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="swiper-button-prev">
            <i class="fa-solid fa-arrow-right"></i>
        </div>
    </div>


</div>