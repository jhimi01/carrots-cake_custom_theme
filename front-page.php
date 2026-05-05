<?php $hero= get_field('hero'); ?>

<!-- <pre>
<?php print_r($hero); ?>
</pre> -->

<?php get_header(); ?>
<div class="container">

    <div class="hero">
        <div class="hero-text">

              <h1><?php echo wp_kses_post($hero['title']); ?></h1>
           <h3><?php echo wp_kses_post($hero['sub-title']); ?></h3>
            <h5><?php echo $hero['desc']; ?></h5>
            <div class="btn-sec">
               <a href="<?php echo $hero['button_link'] ?>"> <button class="bg-orange"><?php echo $hero['button_text']; ?></button></a>
            </div>
        </div>
        <div class="hero-img">
            <?php if(!empty($hero['image'])): ?>
            <img src="<?php echo $hero['image']['url']; ?>" alt="<?php echo $hero['image']['alt']; ?>">
        <?php endif; ?>
        </div>
    </div>
    <?php echo do_shortcode('[articles posts_per_page="4"]'); ?>

    <?php get_template_part( 'template-parts/subscription', 'section' ); ?>
</div>

<?php get_footer(); ?>