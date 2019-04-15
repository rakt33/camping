<?php
// Remove default post type as good as possible
function byron_remove_default_post_type() {
	remove_menu_page('edit.php');
}
add_action('admin_menu', 'byron_remove_default_post_type');

// Remove default post type as good as possible
function byron_remove_wp_nodes()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_node('new-post');
}
add_action('admin_bar_menu', 'byron_remove_wp_nodes', 999);

// Remove admin bar from front end
if (!is_admin()) {
    add_filter('show_admin_bar', '__return_false');
}

// Disable support for comments and trackbacks in post types
function byron_disable_comments_post_types_support()
{
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'byron_disable_comments_post_types_support');

// Close comments on the front-end
function byron_disable_comments_status()
{
	return false;
}
add_filter('comments_open', 'byron_disable_comments_status', 20, 2);
add_filter('pings_open', 'byron_disable_comments_status', 20, 2);

// Hide existing comments
function byron_disable_comments_hide_existing_comments($comments)
{
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'byron_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function byron_disable_comments_admin_menu()
{
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'byron_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function byron_disable_comments_admin_menu_redirect()
{
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url());
        exit;
	}
}
add_action('admin_init', 'byron_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function byron_disable_comments_dashboard()
{
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'byron_disable_comments_dashboard');

// Remove comments links from admin bar
function byron_disable_comments_admin_bar()
{
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'byron_disable_comments_admin_bar');
