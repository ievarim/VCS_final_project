<?php

add_image_size('logo', 130, 23);

// Įjungiame post thumbnail

add_theme_support( 'post-thumbnails' );


// Apsibrėžiame stiliaus failus ir skriptus

if( !defined('ASSETS_URL') ) {
	define('ASSETS_URL', get_bloginfo('template_url'));
}

function theme_scripts(){

	if ( !is_admin() ) {

    	wp_register_script('custom-js', ASSETS_URL . '/assets/scripts/custom.js', array('jquery'), '1.0', true);

        wp_enqueue_script('jquery');
        wp_enqueue_script('custom-js');

    }
}

add_action('wp_enqueue_scripts', 'theme_scripts');

function theme_stylesheets(){

	$styles_path = ASSETS_URL . '/assets/css/style.css';

	if( $styles_path ) {

		wp_register_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', array(), false, 'all');

		wp_register_style('style', get_stylesheet_uri(), array('font-awesome'), false, 'all');

		wp_enqueue_style('font-awesome');
		wp_enqueue_style('style');	
	}
}


add_action('wp_enqueue_scripts', 'theme_stylesheets');


// Apibrėžiame navigacijas

function register_theme_menus() {

	register_nav_menus(array( 
		'primary-navigation' => __( 'Primary Navigation' ) 
	));
}

add_action( 'init', 'register_theme_menus' );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page();

}

add_action( 'init', 'codex_jewellery_init' );



// Apibrėžiame widgets juostas

// $sidebars = array( 'Footer Widgets', 'Blog Widgets' );

// if( isset($sidebars) && !empty($sidebars) ) {

// 	foreach( $sidebars as $sidebar ) {

// 		if( empty($sidebar) ) continue;

// 		$id = sanitize_title($sidebar);

// 		register_sidebar(array(
// 			'name' => $sidebar,
// 			'id' => $id,
// 			'description' => $sidebar,
// 			'before_widget' => '<div id="%1$s" class="widget %2$s">',
// 			'after_widget' => '</div>',
// 			'before_title' => '<h3 class="widget-title">',
// 			'after_title' => '</h3>'
// 		));
// 	}
// }


function jewellery_widgets_init() {
	register_sidebar ( array (
		'name' => __( 'Footer sidebar', 'jewellery'),
		'id' => 'sidebar-1',
		'description' => 'Footer subscribtion form',
		'before_widget' => '<div id="newsletter-widget" class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'

	) );
}

add_action('widgets_init', 'jewellery_widgets_init');


/* Register jewellery post type */


function codex_jewellery_init() {
	$labels = array(
		'name'               => _x( 'Jewellery', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Jewellery', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Jewellery', 'admin menu', 'jewellery' ),
		'name_admin_bar'     => _x( 'Jewellery', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'jewellery', 'jewellery' ),
		'add_new_item'       => __( 'Add New Jewellery', 'jewellery' ),
		'new_item'           => __( 'New Jewellery', 'jewellery' ),
		'edit_item'          => __( 'Edit Jewellery', 'jewellery' ),
		'view_item'          => __( 'View Jewellery', 'jewellery' ),
		'all_items'          => __( 'All Jewellery', 'jewellery' ),
		'search_items'       => __( 'Search Jewellery', 'jewellery' ),
		'parent_item_colon'  => __( 'Parent Jewellery:', 'jewellery' ),
		'not_found'          => __( 'No jewellery found.', 'jewellery' ),
		'not_found_in_trash' => __( 'No jewellery found in Trash.', 'jewellery' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'jewellery' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'jewellery' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt')
	);

	register_post_type( 'jewellery', $args );
}


// hook into the init action and call create_jewellery_taxonomies when it fires

add_action( 'init', 'create_jewellery_taxonomies', 0 );

// taxonomies for the post type "jewellery"

function create_jewellery_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Jewellery Categories', 'taxonomy general name', 'jewellery' ),
		'singular_name'     => _x( 'Jewellery Category', 'taxonomy singular name', 'jewellery' ),
		'search_items'      => __( 'Search Jewellery Categories', 'jewellery' ),
		'all_items'         => __( 'All Jewellery Categories', 'jewellery' ),
		'parent_item'       => __( 'Parent Jewellery Category', 'jewellery' ),
		'parent_item_colon' => __( 'Parent Genre:', 'jewellery' ),
		'edit_item'         => __( 'Edit Jewellery Category', 'jewellery' ),
		'update_item'       => __( 'Update Jewellery Category', 'jewellery' ),
		'add_new_item'      => __( 'Add New Jewellery Category', 'jewellery' ),
		'new_item_name'     => __( 'New Jewellery Category Name', 'jewellery' ),
		'menu_name'         => __( 'Jewellery Category', 'jewellery' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'jewellery-category' ),
	);

	register_taxonomy( 'jewellery-category', array( 'jewellery' ), $args );

}


/* ================= Custom post types (siuo metu nenaudojama) ================= */


$themePostTypes = array(
// 'Portfolio' => 'Portfolio'


);

function createPostTypes() {

	global $themePostTypes;
 
	$defaultArgs = array(
		'taxonomies' => array('category'), // uncomment this line to enable custom post type categories
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		#'menu_icon' => '',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'has_archive' => true, // to enable archive page, disabled to avoid conflicts with page permalinks
		'menu_position' => null,
		'can_export' => true,
		'supports' => array( 'title', 'editor', 'thumbnail', /*'custom-fields', 'author', 'excerpt', 'comments'*/ ),
	);

	foreach( $themePostTypes as $postType => $postTypeSingular ) {

		$myArgs = $defaultArgs;
		$slug = sanitize_title( $postType );
		$labels = makePostTypeLabels( $postType, $postTypeSingular );
		$myArgs['labels'] = $labels;
		$myArgs['rewrite'] = array( 'slug' => $slug, 'with_front' => true );
		$functionName = 'postType' . $postType . 'Vars';

		if( function_exists($functionName) ) {
			
			$customVars = call_user_func($functionName);

			if( is_array($customVars) && !empty($customVars) ) {
				$myArgs = array_merge($myArgs, $customVars);
			}
		}

		register_post_type( $postType, $myArgs );

	}
}

if( isset( $themePostTypes ) && !empty( $themePostTypes ) && is_array( $themePostTypes ) ) {
	add_action('init', 'createPostTypes', 0 );
}


function makePostTypeLabels( $name, $nameSingular ) {

	return array(
		'name' => _x($name, 'post type general name'),
		'singular_name' => _x($nameSingular, 'post type singular name'),
		'add_new' => _x('Add New', 'Example item'),
		'add_new_item' => __('Add New '.$nameSingular),
		'edit_item' => __('Edit '.$nameSingular),
		'new_item' => __('New '.$nameSingular),
		'view_item' => __('View '.$nameSingular),
		'search_items' => __('Search '.$name),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Bin'),
		'parent_item_colon' => ''
	);
}


/* ======================================================= */

?>