<?php
$adSection = get_sub_field('ad_content');
$ad_title = $adSection['title'];
$ad_sub_title = $adSection['subtitle'];
$app_store_btn_url = $adSection['button_link']['url'];
$app_store_btn_text = $adSection['button_text']['url'];
$app_store_btn_target = $adSection['button_link']['target'];
$app_store_btn_alt = $adSection['button_text']['alt'];
$ad_img_url = $adSection['image']['url'];
$ad_img_alt = $adSection['image']['alt'];
?>

<!-- 
<pre>
<?php print_r($app_store_btn_target) ?>
</pre> -->

<div class="ad-section container ">
    <div class="ad bg-orange">
        <div>
            <h4><?php echo $ad_title ?></h4>
            <h5><?php echo $ad_sub_title ?></h5>
            <a href="<?php echo $app_store_btn_url ?>" target="<?php echo $app_store_btn_target ?>">
                <img src="<?php echo $app_store_btn_text ?>" alt="<?php echo $app_store_btn_alt ?>">
            </a>
        </div>

        <div class="ad-content-img">
            <img src="<?php echo $ad_img_url ?>" alt="<?php echo $ad_img_alt ?>">
        </div>
    </div>
</div>