<?php 

function custom_post_type() {
    // register_post_type('posttype', array(
    //     'labels' => array('name' => 'Post Type'),
    //     'public' => true,
    //     'has_archive' => true,
    //     'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
    //     'taxonomies' => array('custom_taxonomy', 'post_tag'), //if you need "Uncategorized" category, replace "custom_taxonomy" with "category"
    //     'menu_position' => 8,
    //     'menu_icon' => 'dashicons-welcome-add-page',
    // ));

    register_post_type('courses', array(
        'labels' => array(
            'name'          => __('Courses', 'base-theme-domain-name'),
            'singular_name' => __('Course', 'base-theme-domain-name'),
            'menu_name'     => __('My Courses', 'base-theme-domain-name'),
        ),
        'public'       => true,
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'courses'), // ⚠️ keep plain slug here
        'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'menu_position'=> 8,
        'menu_icon'    => 'dashicons-welcome-add-page',
    ));

    register_post_type('events', array(
        'labels' => array('name' => 'Events'),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        // 'taxonomies' => array('custom_taxonomy', 'post_tag'), //if you need "Uncategorized" category, replace "custom_taxonomy" with "category"
        'menu_position' => 8,
        'menu_icon' => 'dashicons-welcome-add-page',
    ));

    register_post_type('reviews', array(
        'labels' => array('name' => 'My Reviews'),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        // 'taxonomies' => array('custom_taxonomy', 'post_tag'), //if you need "Uncategorized" category, replace "custom_taxonomy" with "category"
        'menu_position' => 8,
        'menu_icon' => 'dashicons-welcome-add-page',
    ));
}
add_action('init', 'custom_post_type');
