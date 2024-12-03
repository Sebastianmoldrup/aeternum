<?php

function remove_menu_items_for_non_admins()
{
    if (!current_user_can('administrator')) {
        remove_menu_page('edit-comments.php'); // Remove "Comments"
    }
}
add_action('admin_menu', 'remove_menu_items_for_non_admins');
