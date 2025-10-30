<?php
/**
 * Custom Blog Espanol Custom Post Type
 *
 * @package Postali Child
 * @author Postali LLC
 */

function create_custom_post_type_blog_espanol() {

// set up labels
    $labels = array(
        'name' => 'Blog Espanol',
        'singular_name' => 'Post',
        'add_new' => 'Add New Post',
        'add_new_item' => 'Add New Post',
        'edit_item' => 'Edit Post',
        'new_item' => 'New Post',
        'all_items' => 'All Posts',
        'view_item' => 'View Posts',
        'search_items' => 'Search Posts',
        'not_found' =>  'No Posts Found',
        'not_found_in_trash' => 'No Posts found in Trash', 
        'parent_item_colon' => '',
        'menu_name' => 'Blog ESP',

    );
    //register post type
    register_post_type( 'Blog ESP', array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'author' ),  
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'rewrite' => array( 'slug' => 'espanol/blog', 'with_front' => false ),
        )
    );

}
add_action( 'init', 'create_custom_post_type_blog_espanol' );