<?php
// Register menu locations. Add extra as you see fit.
function byron_register_menu_locations()
{
    register_nav_menus([
        'primary' => __('Main menu', 'byron-theme'),
    ]);
}
add_action('after_setup_theme', 'byron_register_menu_locations');

// Image sizes. Add an image size to have WordPress automatically create a
// scaled/cropped copy of an uploaded image. Useful if you use a specific image
// size on multiple places. Args are: add_image_size($size_name, $width, $height, $crop (false|true))
function byron_add_image_sizes()
{
    // add_image_size('team-member', 500, 500, true);
}
add_action('after_setup_theme', 'byron_add_image_sizes');

// Removes a generated meta tag that reveals the WordPress version
remove_action('wp_head', 'wp_generator');
