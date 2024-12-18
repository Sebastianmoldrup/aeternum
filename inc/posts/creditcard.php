<?php

function post_creditcard()
{
    $labels = [
        'name' => 'Credit Cards',
        'singular_name' => 'Credit Cards',
        'add_new' => 'Add Credit Card',
        'all_items' => 'All Credit Cards',
        'add_new_item' => 'Add Credit Card',
        'edit_item' => 'Edit Credit Card',
        'new_item' => 'New Credit Card',
        'view_item' => 'View Credit Card',
        'search_item' => 'Search Credit Card',
        'not_found' => 'No Credit Cards Found',
        'not_found_in_trash' => 'No Credit Cards Found in Trash',
        'parent_item_colon' => 'Parent Credit Card'
      ];

    $args = [
      'labels' => $labels,
      'public' => false,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_position' => 2,
      'capability_type' => 'post',
      'menu_icon' => 'dashicons-money-alt',
      'supports' => ['title', 'thumbnail', 'author']
    ];

    /* categories */
    register_taxonomy('creditcard_taxonomy', 'creditcards', [
      'public' => false,
      'show_ui' => true,
      'show_admin_column' => true,
      'labels' => [
        'name' => 'Categories',
        'plural' => 'cats',
        'add_new_item' => 'Add New Category',
        'separate_items_with_commas' => 'Separate categories with commas',
        'choose_from_most_used' => 'Choose from the most used categories'
      ]
   ]);

    register_post_type('creditcards', $args);
}
add_action('init', 'post_creditcard');

function remove_post_type_support_creditcards()
{
    remove_post_type_support('creditcards', 'editor');
    remove_post_type_support('creditcards', 'excerpt');
}

// add_action('init', 'remove_post_type_support_creditcards');
add_action('add_meta_boxes', 'remove_post_type_support_creditcards', 11);
