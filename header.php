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

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="masthead" class="">
		<nav>
			<div>
				<img src="<?= get_template_directory_uri(); ?>/assets/images/logo.webp" alt="logo">
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
						<svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round">
							<circle cx="11" cy="11" r="8" />
							<line x1="21" y1="21" x2="16.65" y2="16.65" />
						</svg>
						<input type="search" name="s" placeholder="Search articles…" value="<?= get_search_query() ?>">
						<button type="submit"><svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round">
							<circle cx="11" cy="11" r="8" />
							<line x1="21" y1="21" x2="16.65" y2="16.65" />
						</svg></button>
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