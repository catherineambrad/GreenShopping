<?php
/**
 * greenshop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package greenshop
 */


require_once "acf-setup/acf-init.php";
require_once "acf-setup/acf-save-fields.php";

define("CSS_DIR", get_template_directory_uri() . '/assets/css');
define('JS_DIR', get_template_directory_uri() . '/assets/js');
define('IMG_DIR', get_template_directory_uri() . '/assets/images');


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
function greenshop_setup()
{
    /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on greenshop, use a find and replace
        * to change 'greenshop' to the name of your theme in all the template files.
        */
    load_theme_textdomain('greenshop', get_template_directory() . '/languages');

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
            'menu-1' => esc_html__('Primary', 'greenshop'),
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
            'greenshop_custom_background_args',
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

add_action('after_setup_theme', 'greenshop_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function greenshop_content_width()
{
    $GLOBALS['content_width'] = apply_filters('greenshop_content_width', 640);
}

add_action('after_setup_theme', 'greenshop_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function greenshop_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'greenshop'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'greenshop'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'greenshop_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function greenshop_scripts()
{
    wp_enqueue_style('greenshop-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('greenshop-style', 'rtl', 'replace');

    wp_enqueue_script('greenshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);


    wp_enqueue_style('greenshop-swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), _S_VERSION);
    wp_enqueue_script('greenshop-swiper-script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('greenshop-swiper-slide', get_template_directory_uri() . '/assets/js/swiper-hero-slide.js', array('greenshop-swiper-script'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'greenshop_scripts');


function enable_svg_uploads($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'enable_svg_uploads');


function register_footer_menu()
{
    register_nav_menus(
        array(
            'my-account-menu' => __('My Account Menu'),
            'help-guide-menu' => __('Help & Guide Menu'),
            'categories-menu' => __('Categories Menu')
        )
    );
}

add_action('init', 'register_footer_menu');

//add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}
