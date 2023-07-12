<?php

/**
 * Theme setup.
 */
function darkwind_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'darkwind' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );

	add_theme_support( 'automatic-feed-links' );
	
}

add_action( 'after_setup_theme', 'darkwind_setup' );

/**
 * Enqueue theme assets.
 */
function darkwind_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'darkwind', darkwind_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'darkwind', darkwind_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'darkwind_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function darkwind_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function darkwind_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'darkwind_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function darkwind_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_action( 'init', "darkwind_register_block_styles");

wp_register_style('app-style', get_stylesheet_directory_uri(). '/app.css');

function darkwind_register_block_styles(){
	register_block_style(
		'core/button',
		array(
			'name' => 'cool-button',
			'label' => __( 'Cool Button', 'darkwind'),
			//'inline_style' =>  '.is-style-cool-button {@apply w-full sm:w-auto flex-none bg-primary text-white hover:bg-orange-500 text-lg leading-6 font-semibold py-3 px-6 border border-transparent rounded-full focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900 focus:outline-none transition-colors duration-200;}'
			'style_handle' => 'app-style',

		)

	);
}

add_filter( 'nav_menu_submenu_css_class', 'darkwind_nav_menu_add_submenu_class', 10, 3 );
