<?php
// Remove Contact Form 7's automatic <p> element creation.
// If you have to write the rest of the HTML yourself,
// why not have control over this as well?
add_filter('wpcf7_autop_or_not', '__return_false');

// Allow uploading of .svg files.
function byron_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'byron_mime_types');

// Perform shortcodes put inside contact form 7 forms
function byron_wpcf7_do_shortcodes($form) {
    $form = do_shortcode($form);

    return $form;
}
add_filter('wpcf7_form_elements', 'byron_wpcf7_do_shortcodes');
