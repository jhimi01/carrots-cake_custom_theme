<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Carrots&Cake
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
		integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="masthead" class="">
		<nav>
			<div>
				<a href="/"><img src="<?= get_template_directory_uri(); ?>/assets/images/logo.webp" alt="logo"></a>
			</div>
			<div class="nav-links ">
				<ul>
					<li><a href="/">Features</a></li>
					<li class="dropdown"><a style="display: flex; align-items: center;" href="/articles">Parenting Tips
							<img class="arrow" src="<?= get_template_directory_uri() ?>/assets/images/arrow.png"
								alt="arrow"></a>
						<ul class="navLinks-dropdown">
							<li><a href="/">Top Parental Control Apps</a></li>
							<li><a href="/">Learning App Recommendations</a></li>
							<li><a href="/">Screen Time Tips</a></li>
							<li><a href="/">Screen Time not Scream Time Webinar</a></li>
							<li><a href="/">Digital Parenting Cheat Sheet</a></li>
						</ul>
					</li>
					<li><a href="/">About</a></li>
					<li><a href="/">Contributors</a></li>
					<li><a href="/">FAQ</a></li>
				</ul>
			</div>

			<div class="menu-bar">
				<button class="download">Download the app</button>
				<img class="menu-icon" src="https://carrotsandcake.com/wp-content/uploads/2023/06/hum-burger.png"
					alt="">

				<div class="offens">
					<div class="close"><button class="close-btn">❌</button></div>
					<div class="nav-links-mb">
						<ul>
							<li><a href="/">Features</a></li>
							<li class="dropdown"><a href="/articles">Parenting Tips</a>
								<ul class="navLinks-dropdown-mobile">
									<li><a href="/">Top Parental Control Apps</a></li>
									<li><a href="/">Learning App Recommendations</a></li>
									<li><a href="/">Screen Time Tips</a></li>
									<li><a href="/">Screen Time not Scream Time Webinar</a></li>
									<li><a href="/">Digital Parenting Cheat Sheet</a></li>
								</ul>
							</li>
							<li><a href="/">About</a></li>
							<li><a href="/">Contributors</a></li>
							<li><a href="/">FAQ</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="nav-search">
				<form role="search" method="get" action="<?= home_url('/') ?>">
					<div class="search-wrapper">
						<!-- search icon SVG -->
						<i class="fa-solid fa-magnifying-glass"></i>
						<input type="search" name="s" placeholder="Search articles…" value="<?= get_search_query() ?>">
						<button type="submit" class="src-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
					</div>
				</form>
			</div>

		</nav>



	</header><!-- #masthead -->
	<!-- <div class="header-search">
		<?php
		get_search_form();
		?>
	</div> -->