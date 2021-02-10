<?php
/**
 * Author: Srdjan Margetic
 *
 * Srdjan functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package blog_child
 */

 /**
 * Load theme styles and js.
 */
function srdjan_enqueue_styles() {
    wp_dequeue_style( 'style-bootstrap' );

    wp_enqueue_style(
        'bootstrap-css',
        get_template_directory_uri() . '/dist/css/bootstrap.min.css',
        array(),
        wp_get_theme()->get( 'Version' )
    );

    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'style' ),
        wp_get_theme()->get( 'Version' )
    );
}
add_action( 'wp_enqueue_scripts', 'srdjan_enqueue_styles', 999 );

 /**
 * Load fa scripts
 */
function srdjan_enqueue_fa_script() {
	wp_enqueue_script( 'fa_script', 'https://kit.fontawesome.com/a95e2861b8.js' );
}
add_action( 'wp_enqueue_scripts', 'srdjan_enqueue_fa_script' );

/**
 * Add theme support
 */
function srdjan_theme_support() {
    $defaults = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => 0,
        'height'                 => 0,
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
        'video'                  => false,
        'video-active-callback'  => 'is_front_page',
    );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
      )
    );
    add_theme_support( 'custom-header', $defaults );

    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Header Navigation', 'srdjan' ),
        )
    );

    require_once 'class-wp-bootstrap-navwalker.php';
}

add_action( 'after_setup_theme', 'srdjan_theme_support' );

/**
 * Register Custom Post Type: Customer stories.
 */
function srdjan_custom_post_type() {

    $labels = array(
        'name'          => __( 'News', 'blog_child' ),
        'singular_name' => __( 'news', 'blog_child' ),
        'all_items'     => __( 'All News', 'blog_child' ),
    );

    $args = array(
				'labels'              => $labels,
				'menu_position'				=> 5,
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'rest_base'           => '',
        'has_archive'         => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => true,
        'query_var'           => true,
        'supports'            => array( 'title', 'editor', 'author', 'revisions', 'excerpt', 'thumbnail' ),
        'taxonomies'          => array( 'category', 'post_tag', 'tag', ),
    );

    register_post_type( 'news', $args );
}
add_action( 'init', 'srdjan_custom_post_type' );

/**
 * Register sidebar.
 */
function srdjan_widget_setup() {

    register_sidebar(
        array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar-main',
            'class'         => 'custom',
            'description'   => 'Standard Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>',
        )
    );
}

add_action( 'widgets_init', 'srdjan_widget_setup' );

/**
 * Add excerpt read more.
 *
 * @param string $more Read more.
 */
function wpdocs_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( ' Read More', 'textdomain' )
        );
    }

    return $more;
}

add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
 * Add excerpt length
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 50;
}

add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length' );
