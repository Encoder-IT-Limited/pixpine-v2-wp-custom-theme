<?php
/**
 * PixPine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package PixPine
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pixpine_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on PixPine, use a find and replace
		* to change 'pixpine' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'pixpine', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'pixpine' ),
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
			'pixpine_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'pixpine_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
// function pixpine_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'pixpine_content_width', 640 );
// }
// add_action( 'after_setup_theme', 'pixpine_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function pixpine_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'pixpine' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'pixpine' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'pixpine_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
// function pixpine_scripts() {
// 	wp_enqueue_style( 'pixpine-style', get_stylesheet_uri(), array(), _S_VERSION );
// 	wp_style_add_data( 'pixpine-style', 'rtl', 'replace' );

// 	wp_enqueue_script( 'pixpine-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

// 	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 		wp_enqueue_script( 'comment-reply' );
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'pixpine_scripts' );

// /**
//  * Implement the Custom Header feature.
//  */
// require get_template_directory() . '/inc/custom-header.php';

// /**
//  * Custom template tags for this theme.
//  */
// require get_template_directory() . '/inc/template-tags.php';

// /**
//  * Functions which enhance the theme by hooking into WordPress.
//  */
// require get_template_directory() . '/inc/template-functions.php';

// /**
//  * Customizer additions.
//  */
// require get_template_directory() . '/inc/customizer.php';

// /**
//  * Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Register Custom Post Type - Product
 */
function custom_product_post_type() {
    $labels = array(
        'name'                  => _x( 'Products', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Products', 'text_domain' ),
        'name_admin_bar'        => __( 'Product', 'text_domain' ),
        'archives'              => __( 'Product Archives', 'text_domain' ),
        'attributes'            => __( 'Product Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Product:', 'text_domain' ),
        'all_items'             => __( 'All Products', 'text_domain' ),
        'add_new_item'          => __( 'Add New Product', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Product', 'text_domain' ),
        'edit_item'             => __( 'Edit Product', 'text_domain' ),
        'update_item'           => __( 'Update Product', 'text_domain' ),
        'view_item'             => __( 'View Product', 'text_domain' ),
        'view_items'            => __( 'View Products', 'text_domain' ),
        'search_items'          => __( 'Search Product', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into product', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this product', 'text_domain' ),
        'items_list'            => __( 'Products list', 'text_domain' ),
        'items_list_navigation' => __( 'Products list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter products list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Product', 'text_domain' ),
        'description'           => __( 'Custom post type for products', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'tags' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-cart', // You can change the icon
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'product', $args );
}
add_action( 'init', 'custom_product_post_type', 0 );

/**
 * Register Custom Category For Product
 */
function custom_product_taxonomy() {
    $labels = array(
        'name'                       => _x( 'Product Categories', 'Taxonomy General Name', 'text_domain' ),
        'singular_name'              => _x( 'Product Category', 'Taxonomy Singular Name', 'text_domain' ),
        'menu_name'                  => __( 'Product Categories', 'text_domain' ),
        'all_items'                  => __( 'All Categories', 'text_domain' ),
        'parent_item'                => __( 'Parent Category', 'text_domain' ),
        'parent_item_colon'          => __( 'Parent Category:', 'text_domain' ),
        'new_item_name'              => __( 'New Category Name', 'text_domain' ),
        'add_new_item'               => __( 'Add New Category', 'text_domain' ),
        'edit_item'                  => __( 'Edit Category', 'text_domain' ),
        'update_item'                => __( 'Update Category', 'text_domain' ),
        'view_item'                  => __( 'View Category', 'text_domain' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
        'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
        'popular_items'              => __( 'Popular Categories', 'text_domain' ),
        'search_items'               => __( 'Search Categories', 'text_domain' ),
        'not_found'                  => __( 'Not Found', 'text_domain' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true, // Set to true to display in post editor
        'show_ui'                    => true, // Show the admin UI
        'show_admin_column'          => true, // Show the admin column
        'show_in_nav_menus'          => true, // Show in navigation menus
        'show_tagcloud'              => true, // Show in tag cloud widget
    );
    register_taxonomy( 'product_category', array( 'product' ), $args );
}
add_action( 'init', 'custom_product_taxonomy', 0 );



/**
 * Add gallery in the wp-admin panel
 */
// Add custom metabox for gallery images
function custom_product_gallery_metabox() {
    add_meta_box(
        'product_gallery',
        'Product Gallery',
        'render_product_gallery_metabox',
        'product',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'custom_product_gallery_metabox');

// Render the metabox content
function render_product_gallery_metabox($post) {
    wp_nonce_field('custom_product_gallery_nonce', 'custom_product_gallery_nonce');

    $gallery_images = get_post_meta($post->ID, '_custom_product_gallery', true);
    $gallery_images = !empty($gallery_images) ? explode(',', $gallery_images) : array();

    echo '<input type="button" class="button" value="Add Images" id="custom_product_gallery_button">';
    echo '<ul id="custom_product_gallery_container">';

    foreach ($gallery_images as $image_id) {
        echo '<li>' . wp_get_attachment_image($image_id, 'thumbnail') . '</li>';
    }

    echo '</ul>';
}


function custom_product_gallery_enqueue_scripts($hook) {
    if ('post.php' != $hook && 'post-new.php' != $hook) {
        return;
    }

    if ('product' != get_post_type()) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script('custom-product-gallery', get_template_directory_uri() . '/js/custom-product-gallery.js', array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts', 'custom_product_gallery_enqueue_scripts');


function save_custom_product_gallery() {
	update_option('test11', 'working');
    check_ajax_referer('custom_product_gallery_nonce', 'nonce');

    $image_ids = !empty($_POST['imageIds']) ? $_POST['imageIds'] : array();
    $image_ids_str = implode(',', $image_ids);

    // Debug: Check if AJAX action is triggered
    error_log('AJAX action triggered');

    echo '<ul>';
    foreach ($image_ids as $image_id) {
        echo '<li>' . wp_get_attachment_image($image_id, 'thumbnail') . '</li>';
    }
    echo '</ul>';

    die();
}
add_action('wp_ajax_save_custom_product_gallery', 'save_custom_product_gallery');

