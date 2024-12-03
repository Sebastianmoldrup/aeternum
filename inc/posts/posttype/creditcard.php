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
      'capability_type' => 'post',
      'menu_icon' => 'dashicons-money-alt',
      'supports' => [
        'title',
        'editor',
        'excerpt',
        'thumbnail',
        'revisions'
      ],
      'menu_position' => 5,
      'exclude_from_search' => false
    ];

    register_post_type('creditcards', $args);

    /* categories */
    register_taxonomy('cards', 'card', [
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
}

add_action('init', 'post_creditcard');
