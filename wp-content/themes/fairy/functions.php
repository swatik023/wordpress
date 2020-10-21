<?php
/**
 * fairy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fairy
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'fairy_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fairy_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fairy, use a find and replace
		 * to change 'fairy' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fairy' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size('fairy-large', 1170, 606, true);
		add_image_size('fairy-medium', 800, 600, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary Menu', 'fairy' ),
				'top-menu' => esc_html__( 'Top Menu', 'fairy' ),
                'social-menu' => esc_html__('Social Menu', 'fairy'),
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
				'fairy_custom_background_args',
				array(
					'default-color' => 'e5ece9',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for default block styles.
		add_theme_support( 'wp-block-styles' );

		/*
		 * Add support custom font sizes.
		 *
		 * Add the line below to disable the custom color picker in the editor.
		 * add_theme_support( 'disable-custom-font-sizes' );
		 */
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => __( 'Small', 'fairy' ),
					'shortName' => __( 'S', 'fairy' ),
					'size'      => 16,
					'slug'      => 'small',
				),
				array(
					'name'      => __( 'Medium', 'fairy' ),
					'shortName' => __( 'M', 'fairy' ),
					'size'      => 20,
					'slug'      => 'medium',
				),
				array(
					'name'      => __( 'Large', 'fairy' ),
					'shortName' => __( 'L', 'fairy' ),
					'size'      => 25,
					'slug'      => 'large',
				),
				array(
					'name'      => __( 'Larger', 'fairy' ),
					'shortName' => __( 'XL', 'fairy' ),
					'size'      => 35,
					'slug'      => 'larger',
				),
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'fairy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fairy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fairy_content_width', 640 );
}
add_action( 'after_setup_theme', 'fairy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fairy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fairy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fairy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 1', 'fairy' ),
            'id'            => 'footer-1',
            'description'   => esc_html__( 'Add widgets here.', 'fairy' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 2', 'fairy' ),
            'id'            => 'footer-2',
            'description'   => esc_html__( 'Add widgets here.', 'fairy' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer 3', 'fairy' ),
            'id'            => 'footer-3',
            'description'   => esc_html__( 'Add widgets here.', 'fairy' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action( 'widgets_init', 'fairy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fairy_scripts() {
    global $fairy_theme_options;
    wp_enqueue_style('fairy-heading', '//fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
    wp_enqueue_style('fairy-font', '//fonts.googleapis.com/css2?family=Mulish&display=swap');
    /*Font-Awesome-master*/
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/candidthemes/assets/framework/Font-Awesome/css/font-awesome.min.css', array(), _S_VERSION );

    wp_enqueue_style( 'slick', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick.css', array(), _S_VERSION );

    wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick-theme.css', array(), _S_VERSION );
    wp_enqueue_style( 'fairy-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'fairy-style', 'rtl', 'replace' );

	wp_enqueue_script( 'fairy-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

    if( 1 == absint($fairy_theme_options['fairy-enable-sticky-sidebar'] )){
        wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/candidthemes/assets/custom/js/theia-sticky-sidebar.js', array('jquery'), _S_VERSION, true );
    }

	wp_enqueue_script( 'slick', get_template_directory_uri() . '/candidthemes/assets/framework/slick/slick.js',array('jquery'), _S_VERSION, true );

	wp_enqueue_script( 'masonry');

	wp_enqueue_script( 'fairy-custom-js', get_template_directory_uri() . '/candidthemes/assets/custom/js/custom.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fairy_scripts' );


/**
 * Enqueue fonts for the editor style
 */
function fairy_block_styles() {

	wp_enqueue_style( 'fairy-editor-styles', get_theme_file_uri( 'candidthemes/assets/custom/css/editor-styles.css' ) );

	wp_enqueue_style('fairy-heading', '//fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

    wp_enqueue_style('fairy-font', '//fonts.googleapis.com/css2?family=Mulish&display=swap');

    $fairy_custom_css = '
    .edit-post-visual-editor.editor-styles-wrapper{ 
    	font-family: Mulish;
    }

    .editor-post-title__block .editor-post-title__input,
    .editor-styles-wrapper h1,
    .editor-styles-wrapper h2,
    .editor-styles-wrapper h3,
    .editor-styles-wrapper h4,
    .editor-styles-wrapper h5,
    .editor-styles-wrapper h6{
    	font-family:Poppins;
    } 
    ';

    wp_add_inline_style( 'fairy-editor-styles', $fairy_custom_css );
}

add_action( 'enqueue_block_editor_assets', 'fairy_block_styles' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Core File
 */
require get_template_directory() . '/candidthemes/core.php';

/**
 * Load breadcrumb_trail File
 */
if (!function_exists('breadcrumb_trail')) {
    require get_template_directory() . '/candidthemes/assets/framework/breadcrumbs/breadcrumbs.php';
}

/**
 * For Admin Page
 */
if ( is_admin() ) {
	require get_template_directory() . '/candidthemes/notice/admin-notice.php';
}