<?php get_header(); ?>

<section>
	<!------ article page header ------>

	<div class="bg-beige"></div>
	<div class="container">


		<div class="article-header">
			<h1> <?php single_cat_title(); ?></h1>

			<div class="quick-links-search">
				<div class="quick-link">
					<p>Quick links:</p>
					<a href="/">Screen time</a>
					<a href="/">Parenting Tips</a>
					<a href="/">Parental Controls</a>
					<a href="/">Platform Comparison</a>
				</div>

				<div class="quick-search">
					<form method="get" action="">
						<input type="text" name="art_search"
							value="<?php echo isset($_GET['art_search']) ? esc_attr($_GET['art_search']) : ''; ?>"
							placeholder="Search articles...">

						<button type="submit">Search</button>
					</form>

				</div>

			</div>
		</div>

		<div class="all-buttons ">


			<a href="<?= get_permalink(get_option('page_for_posts')); ?>">
				<button class="<?= is_home() ? 'active-btn' : '' ?>">All</button>
			</a>

			<?php $categories = get_categories([
				'hide_empty' => false,
			]);

			foreach ($categories as $category):
				if ($category->slug === 'uncategorized')
					continue;
				?>

				<a href="<?= get_category_link($category->term_id); ?>">
					<button class="<?= is_category($category->term_id) ? 'active-btn' : '' ?>"><?= $category->name; ?>
					</button>
				</a>
			<?php endforeach; ?>
		</div>

		<!-- articles -->
		<?= do_shortcode('[articles]'); ?>


		<!-- subscription  -->
		<?= do_shortcode('[contact_section]') ?>
	</div>
</section>

<?php get_footer(); ?>