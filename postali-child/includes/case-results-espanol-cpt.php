<?php
/**
 * Custom Case Results Custom Post Type
 *
 * @package Postali Parent
 * @author Postali LLC
 */

function create_custom_post_type_results_espanol() {

// set up labels
    $labels = array(
        'name' => 'Results Espanol',
        'singular_name' => 'Result',
        'add_new' => 'Add New Case Result',
        'add_new_item' => 'Add New Case Result',
        'edit_item' => 'Edit Results',
        'new_item' => 'New Results',
        'all_items' => 'All Results',
        'view_item' => 'View Results',
        'search_items' => 'Search Case Results',
        'not_found' =>  'No Results Found',
        'not_found_in_trash' => 'No Results found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Case Results ESP',

    );
    //register post type
    register_post_type( 'Results ESP', array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-analytics',
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'excerpt' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'espanol/resultados-del-caso', 'with_front' => false ),
        )
    );

}
// Register Custom Taxonomy
function results_attorney_espanol() {

	$labels = array(
		'name'                       => _x( 'Results Attorney', 'Results Attorneys' ),
		'singular_name'              => _x( 'Results Attorney', 'Results Attorney' ),
		'menu_name'                  => __( 'Results Attorney' ),
		'all_items'                  => __( 'All Results Attorneys' ),
		'new_item_name'              => __( 'New Results Attorney' ),
		'add_new_item'               => __( 'Add Results Attorney' ),
		'edit_item'                  => __( 'Edit Results Attorney' ),
		'update_item'                => __( 'Update Results Attorney' ),
		'view_item'                  => __( 'View Results Attorney' ),
		'separate_items_with_commas' => __( 'Separate Results Attorneys with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Results Attorneys' ),
		'popular_items'              => __( 'Popular Results Attorneys' ),
		'search_items'               => __( 'Search Results Attorneys' ),
		'not_found'                  => __( 'Not Found' ),
		'no_terms'                   => __( 'No Results Attorneys' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'rewrite' => array( 'slug' => 'espanol/resultados/abogado', 'with_front' => false ),
	);
	register_taxonomy( 'results_attorney_espanol', array( 'resultsesp' ), $args );

}

// Register Custom Taxonomy
function results_category_esp() {

	$args = array(
        'show_admin_column'        => true,
        'hierarchical'             => true,
        'rewrite' => array( 'slug' => 'espanol/resultados/category', 'with_front' => false ),
	);
	register_taxonomy( 'results_category_esp', array( 'resultsesp' ), $args );

}

add_action( 'init', 'results_attorney_espanol', 0 );
add_action( 'init', 'results_category_esp', 0 );
add_action( 'init', 'create_custom_post_type_results_espanol' );