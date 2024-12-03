<?php

add_action('add_meta_boxes_creditcards', 'creditcard_metabox');

function creditcard_metabox()
{
    add_meta_box('creditcard_meta', 'credit card details', function () {
        global $post;

        /* Get thumbnail */
        $thumbnail_url = preg_replace('/https?:\/\/.*?(?=\/)/', '', get_the_post_thumbnail_url($post));

        /* Get meta */
        $meta = get_post_meta($post->ID, 'creditcard', true);
        print_r($meta);

        // $settings = get_option('creditcard_settings');

        echo <<<HTML
          <div class="">
            test
          </div>
        HTML;
    });
}

/* Manually remove editor and excerpt */
function force_remove_editor_and_excerpt()
{
    global $_wp_post_type_features;
    if (isset($_wp_post_type_features['creditcards']['editor'])) {
        unset($_wp_post_type_features['creditcards']['editor']);
    }
    if (isset($_wp_post_type_features['creditcards']['excerpt'])) {
        unset($_wp_post_type_features['creditcards']['excerpt']);
    }
}
add_action('current_screen', 'force_remove_editor_and_excerpt', 100);
