<?php
/**
 * Carrots&Cake functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Carrots&Cake
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function carrotscake_setup()
{
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Carrots&Cake, use a find and replace
	 * to change 'carrotscake' to the name of your theme in all the template files.
	 */
	load_theme_textdomain('carrotscake', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'carrotscake'),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'carrotscake_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'carrotscake_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carrotscake_content_width()
{
	$GLOBALS['content_width'] = apply_filters('carrotscake_content_width', 640);
}
add_action('after_setup_theme', 'carrotscake_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carrotscake_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Sidebar', 'carrotscake'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Add widgets here.', 'carrotscake'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h2 class="widget-title">',
			'after_title' => '</h2>',
		)
	);
}
add_action('widgets_init', 'carrotscake_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function carrotscake_scripts()
{
	wp_enqueue_style('carrotscake-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('carrotscake-style', 'rtl', 'replace');

	wp_enqueue_script('carrotscake-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'carrotscake_scripts');

function carrotscake_css_link_up()
{
	wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), '5.3.0', 'all');

	wp_register_style('google-font', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), '5.3.0', 'all');

	wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'carrotscake_css_link_up');

// function carrotscake custom js
function carrotscake_js_link_up()
{
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/script.js', array(), '5.3.0', true);
}
add_action('wp_enqueue_scripts', 'carrotscake_js_link_up');




// shortcode--------------------

// this is for search.php file issue(only post shows not page in the cards)
add_action('pre_get_posts', function ($query) {
	if ($query->is_search() && $query->is_main_query() && !is_admin()) {
		$query->set('post_type', 'post');
	}
});

add_shortcode('articles', 'function_articles');
function function_articles($atts)
{

	// it can overide post numbers for per page
	$atts = shortcode_atts([
		'posts_per_page' => 6,
	], $atts);

	// pagination handler (it finds the current page number)
	$paged = max(
		1,
		get_query_var('paged'),
		get_query_var('page') // for static page (with shortcode)
	);

	$search = isset($_GET['art_search']) ? sanitize_text_field($_GET['art_search']) : '';

	$args = [
		'post_type' => 'post',
		'posts_per_page' => $atts['posts_per_page'],
		'paged' => $paged,
	];

	// search when it not empty
	if (trim($search) !== '') {
		$args['s'] = $search;
	}

	// category filter
	if (is_category()) {
		$args['cat'] = get_queried_object_id();
	}

	$query = new WP_Query($args);

	ob_start();

	if ($query->have_posts()):
		?>
		<div class="articles">

			<?php while ($query->have_posts()):
				$query->the_post(); ?>

				<div class="article-card">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>

					<div class="info">
						<div class="badge"><?php the_category(); ?></div>
						<p class="date"><?php echo get_the_date(); ?></p>
					</div>

					<h5 class="post-title"><?php the_title(); ?></h5>

					<div class="author">
						<img src="https://img.magnific.com/premium-vector/user-profile-icon-circle_1256048-12499.jpg"
							class="author-img" alt="">
						<p><?php the_author(); ?></p>
					</div>
				</div>

			<?php endwhile; ?>

		</div>

		<div class="pagination">
			<?php
			echo paginate_links([
				'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))), //create url
				'format' => '',
				'current' => max(1, $paged), //Current page number
				'total' => $query->max_num_pages, //total pages
				'prev_text' => '←',
				'next_text' => '→',
			]);
			?>
		</div>

		<?php
		wp_reset_postdata();

	else:
		echo "<h3>No posts found.</h3>";
	endif;

	return ob_get_clean();
}


add_shortcode('contact_section', 'contact');
function contact()
{
	ob_start();
	?>
	<div class="subscription">
		<div class="subs-text">
			<h2>Halve your kids’ overall screen time in 7 days with Carrots&Cake</h2>
			<h4 class="subs-text-h4">Now you can encourage your little ones to use good educational apps without the
				tantrums.</h4>
			<ul>
				<li>
					<img src="<?= get_template_directory_uri(); ?>/assets/images/check-mark.webp" alt="check mark">
					<div>
						<h4>Increase educational app usage by 200%</h4>
						<h6>To unblock their games, kids must complete educational apps</h6>
					</div>
				</li>
				<li>
					<img src="<?= get_template_directory_uri(); ?>/assets/images/check-mark.webp" alt="check mark">
					<div>
						<h4>Cut overall screen time in half</h4>
						<h6>Enhance your family's digital well-being by setting personalized screen time limits.
						</h6>
					</div>
				</li>
				<li>
					<img src="<?= get_template_directory_uri(); ?>/assets/images/check-mark.webp" alt="check mark">
					<div>
						<h4>Enjoy your first 7 days absolutely free</h4>
						<h6>Enjoy all the premium features of Carrots&Cake without spending a penny. No credit card
							required.</h6>
					</div>
				</li>
			</ul>
			<img class="app-store" src="<?= get_template_directory_uri(); ?>/assets/images/app-store.webp" alt="app-store">
		</div>
		<div class="subs-img">
			<img src="<?= get_template_directory_uri(); ?>/assets/images/roblox-rain.webp" alt="">
			<form action="">
				<input type="text" placeholder="Name" name="name">
				<input type="email" placeholder="Email" name="email">
				<button>Get a 7-day free trial</button>
			</form>
		</div>
	</div>

	<?php

	return ob_get_clean();
}




/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

