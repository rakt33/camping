<?php
/***********************************
 * functions.php has been split up *
 * to create more clarity          *
 ***********************************/
// Removal of unnecessary WP functions from wp-admin
require_once get_template_directory() . '/includes/cleanup.php';
// Scripts and styles
require_once get_template_directory() . '/includes/scripts.php';
// ACF
require_once get_template_directory() . '/includes/acf.php';
// Default functions (non-action or -filter)
require_once get_template_directory() . '/includes/defaults.php';
// Actions
require_once get_template_directory() . '/includes/actions.php';
// Filters
require_once get_template_directory() . '/includes/filters.php';
// Shortcodes
require_once get_template_directory() . '/includes/shortcodes.php';

function theme_enqueue_scripts() {
        wp_enqueue_style( 'Font_Awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
        wp_enqueue_style( 'Bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
        wp_enqueue_style( 'MDB', get_template_directory_uri() . '/css/mdb.min.css' );
        wp_enqueue_style( 'Style', get_template_directory_uri() . '/style.css' );
        wp_enqueue_script( 'jQuery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), '3.3.1', true );
        wp_enqueue_script( 'Tether', get_template_directory_uri() . '/js/popper.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'Bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'MDB', get_template_directory_uri() . '/js/mdb.min.js', array(), '1.0.0', true );
        wp_enqueue_script( 'JS', get_template_directory_uri() . '/js/main.js' );

        }
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
