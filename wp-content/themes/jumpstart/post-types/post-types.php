<?php

// Team post type

add_action( 'init', 'create_team_type' );
function create_team_type() {
    register_post_type( 'team',
        array(
            'labels' => array(
                'name' => __( 'Team Members' ),
                'singular_name' => __( 'Team Members' )
            ),
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'rewrite' => array('slug' => 'team'),
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions')
        )
    );
}

// City post type

add_action( 'init', 'create_city_type' );
function create_city_type() {
    register_post_type( 'city',
        array(
            'labels' => array(
                'name' => __( 'City' ),
                'singular_name' => __( 'City' )
            ),
        'public' => true,
        'menu_position' => 4,
        'has_archive' => true,
        'rewrite' => array('slug' => 'city'),
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions')
        )
    );
}

// Our Work Taxonomy

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_neighborhoods_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it positions for your posts

function create_neighborhoods_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
$taxonomy = 'resources_library';
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Neighborhoods', 'taxonomy general name' ),
    'singular_name' => _x( 'Neighborhood', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Neighborhood' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Neighborhoods' ),
    'parent_item_colon' => __( 'Parent Neighborhoods:' ),
    'edit_item' => __( 'Edit Neighborhood' ),
    'update_item' => __( 'Update Neighborhood' ),
    'add_new_item' => __( 'Add New Neighborhood' ),
    'new_item_name' => __( 'New Neighborhood Name' ),
    'menu_name' => __( 'Add Category' ),
  );

// Now register the taxonomy

  register_taxonomy('neighborhoods',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'neighborhoods' ),
  ));

}

// Neighborhoods post type

add_action( 'init', 'create_neighborhood_type' );
function create_neighborhood_type() {
    register_post_type( 'neighborhood',
        array(
            'labels' => array(
                'name' => __( 'Neighborhoods' ),
                'singular_name' => __( 'Neighborhood' )
            ),
        'taxonomies' => array('citylists'),
        'public' => true,
        'menu_position' => 2,
        'has_archive' => true,
        'rewrite' => array('slug' => 'neighborhood'),
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions')
        )
    );
}

// Agents post type

add_action( 'init', 'create_agent_type' );
function create_agent_type() {
    register_post_type( 'agent',
        array(
            'labels' => array(
                'name' => __( 'City Agents' ),
                'singular_name' => __( 'City Agents' )
            ),
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'rewrite' => array('slug' => 'agents'),
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions')
        )
    );
}

// City List Taxonomy

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_citylists_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it positions for your posts

function create_citylists_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'City List', 'taxonomy general name' ),
    'singular_name' => _x( 'City List', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search City List' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent City List' ),
    'parent_item_colon' => __( 'Parent City List:' ),
    'edit_item' => __( 'Edit City List' ),
    'update_item' => __( 'Update City List' ),
    'add_new_item' => __( 'Add New City List' ),
    'new_item_name' => __( 'New City List Name' ),
    'menu_name' => __( 'Add Category' ),
  );

// Now register the taxonomy

  register_taxonomy('citylists',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'city-lists' ),
  ));

}

// City List post type

add_action( 'init', 'create_citylist_type' );
function create_citylist_type() {
    register_post_type( 'citylist',
        array(
            'labels' => array(
                'name' => __( 'City List' ),
                'singular_name' => __( 'City List' )
            ),
        'taxonomies' => array('citylists'),
        'public' => true,
        'menu_position' => 5,
        'has_archive' => true,
        'rewrite' => array('slug' => 'city-list'),
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions')
        )
    );
}
