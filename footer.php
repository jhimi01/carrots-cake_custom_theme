<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Carrots&Cake
 */

?>

<footer id="colophon" class="site-footer">
	<!-- <img src="<?= get_template_directory_uri(); ?>/assets/images/footer_bg_shape.webp" alt="footer-bg"> -->
	<div class="footer-content">
	<div class="footer-top">
			<div class="footer-logo">
			<img src="<?= get_template_directory_uri() ?>/assets/images/logo.webp" alt="footer logo">
		</div>
		<div>
			<p class="footer-text">
				<strong>We <img src="https://carrotsandcake.com/wp-content/uploads/2022/01/favorite_black_24dp-1.svg" alt="heart"> Educators</strong>
				<br>
				Thanks for reading. It makes a difference.
				<br>
				We donate 5% of profits to education related causes.
			</p>
		</div>

	</div>
	<div class="footer-bottom">
		<div class="privacy-links">
			<a href="/">All rights reserved</a>
			<a href="/">Copyright 2024</a>
		</div>
		<div>
			<a href="/">fb</a>
			<a href="/">ig</a>
			<a href="/">twitter</a>
			<a href="/">tiktok</a>
		</div>
	</div>
	</div>
</footer><!-- #colophon -->


<?php wp_footer(); ?>
</body>

</html>