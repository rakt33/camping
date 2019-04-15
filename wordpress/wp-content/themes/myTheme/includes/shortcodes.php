<?php
// Returns the file contents of the specified svg.
// Use [byron_svg file="FILENAME"] to get an SVG on that spot.
// Only the name of the file is needed. No file extension (.svg) or folders
// leading into the theme img map. Example below:
// [byron_svg file="test"] will (try to) retreive the content from
// {THEME_DIRECTORY}/img/test.svg.
function byron_svg($atts = []) {
    array_change_key_case($atts);

    $defaults = [
        'file' => '',
    ];

    $atts = shortcode_atts($defaults, $atts);

    $atts['file'] = str_replace('../', '', $atts['file']);

    return byron_file_contents('img/' . $atts['file'] . '.svg');
}
add_shortcode('byron_svg', 'byron_svg');

/**
 * A simple iframe shortcode that allows you to use an iframe and set the src, width and height of the frame.
 * @param  array  $atts Array of attributes
 * @return string       iframe if atts['src'] is set, otherwise an empty string.
 */
function byron_iframe($atts = []) {
    array_change_key_case($atts);

    $defaults = [
        'src' => null,
        'width' => false,
        'height' => false,
        'runat' => false,
    ];

    $atts = shortcode_atts($defaults, $atts);

    if ($atts['src'] !== null && is_string($atts['src'])) {
        ob_start();
        ?>
        <iframe src="<?php echo $atts['src'] ?>" width="<?php echo $atts['width'] ?>" height="<?php echo $atts['height']; ?>" runat="<?php echo $atts['runat']; ?>"></iframe>
        <?php
        return ob_get_clean();
    }

    return '';
}
add_shortcode('iframe', 'byron_iframe');
