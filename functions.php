<?php
/**
 * Adventure Time functions and definitions
 *
 * @package Adventure Time
 */

if ( ! function_exists( 'adventure_time_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adventure_time_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Adventure Time, use a find and replace
	 * to change 'adventure-time' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'adventure-time', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'adventure-time' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'adventure_time_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // adventure_time_setup
add_action( 'after_setup_theme', 'adventure_time_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adventure_time_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adventure_time_content_width', 640 );
}
add_action( 'after_setup_theme', 'adventure_time_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function adventure_time_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adventure-time' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adventure_time_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adventure_time_scripts() {
	wp_enqueue_style( 'adventure-time-style', get_stylesheet_uri() );

  wp_enqueue_script( 'jquery');

	wp_enqueue_script( 'adventure-time-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'adventure-time-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

  wp_enqueue_script( 'adventure-time-navbar', get_template_directory_uri() . '/js/navbar.js', array(), false, true );

  wp_enqueue_script( 'adventure-time-parallax', get_template_directory_uri() . '/js/parallax.min.js', array(), false, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adventure_time_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom field to add status
 */
add_action('customize_register', 'add_current_location');
function add_current_location($wp_customize) {

 $wp_customize->add_setting( 'current_location', array(
 'default' => '',
 'capability' => 'edit_theme_options'
 ) );

 $wp_customize->add_control( 'current_location', array(
 'label' => 'Current Location',
 'section' => 'title_tagline',
 'type' => 'text'
 ) );
}

function adventure_time_jetpack_support(){
    // Declaring site logo support
    add_image_size( 'site-logo', 250, 0 );
    add_theme_support( 'site-logo', array(
        'header-text' => array(
            'site-title',
            'site-description'
        ),
        'size' => 'site-logo',
    ));
}
add_action( 'after_setup_theme', 'adventure_time_jetpack_support' );

add_theme_support( 'post-thumbnails' );

function new_excerpt_more( $more ) {
  return '... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'your-text-domain' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );