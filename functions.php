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

	// wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'carrotscake_css_link_up');

// function carrotscake custom js
function carrotscake_js_link_up()
{
	wp_enqueue_script(
		'custom-js',
		get_template_directory_uri() . '/assets/js/script.js',
		['jquery'],
		'5.3.0',
		true
	);
}
add_action('wp_enqueue_scripts', 'carrotscake_js_link_up');




// this is for search.php file issue(only post shows not page in the cards)
add_action('pre_get_posts', function ($query) {
	if ($query->is_search() && $query->is_main_query() && !is_admin()) {
		$query->set('post_type', 'post');
	}
});


// load more posts with AJAX -------------
add_action('wp_ajax_load_more_posts', 'load_more_posts_handler'); //for loggedIn user access
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_handler'); // for visitors access

function load_more_posts_handler()
{
	// nonce is a temporary secret key generated by WordPress
	check_ajax_referer('load_more_nonce', 'nonce'); //for security

	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 3;

	$args = [
		'post_type' => 'post',
		'posts_per_page' => $posts_per_page,
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $page,
	];

	$query = new WP_Query($args);

	ob_start(); // capture HTML (store in memory)

	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			get_template_part('template-parts/article-card');
		}
	}

	$html = ob_get_clean(); // HTML stored

	wp_reset_postdata();

	$has_more = $page < $query->max_num_pages;

	// send response to js
	wp_send_json_success([
		'html' => $html,
		'has_more' => $has_more
	]);
}
;


// get more contents

add_action('wp_ajax_get_more_contents', 'get_more_contents_handler');
add_action('wp_ajax_nopriv_get_more_contents', 'get_more_contents_handler');

function get_more_contents_handler()
{

	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
	$contents_per_page = isset($_POST['per_page_content']) ? intval($_POST['per_page_content']) : 3;

	// get reapeter field
	$contents = get_field('contents', $post_id);

	if (!$contents) {
		wp_send_json_error([
			'message' => 'No contents found'
		]);
	}

	// offset pagination math
	$offset = ($page - 1) * $contents_per_page; //skip items according to the number

	//slice array
	$sliced_contents = array_slice(
		$contents,
		$offset,
		$contents_per_page
	);


	ob_start();
	foreach ($sliced_contents as $content): ?>
		<div class="content-card">
			<img src="<?php echo $content['img']['url'] ?>" alt="<?php echo $content['img']['alt'] ?>">
			<h4><?php echo $content['content_title'] ?></h4>
		</div>
	<?php endforeach;

	$html = ob_get_clean();

	$max_pages = ceil(count($contents) / $contents_per_page);

	$has_more = $page < $max_pages;

	wp_send_json_success([
		'html' => $html,
		'has_more' => $has_more,
	]);
}
;



// Localize script to pass AJAX URL and nonce (JS bridge for connecting php -> js)
add_action('wp_enqueue_scripts', function () {
	wp_localize_script('custom-js', 'ajax_params', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'nonce' => wp_create_nonce('load_more_nonce'),
	]);
});


// shortcode--------------------
require_once get_template_directory() . '/inc/shortcodes/shortcode.php';


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

