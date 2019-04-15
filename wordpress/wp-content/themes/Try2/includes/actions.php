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

function moviedata(){
//https://www.themoviedb.org/movie/297802-aquaman
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/now_playing?api_key=09a6021cc4bdf2aaf9157e2df65934e6&language=en-US&page=1",
  //CURLOPT_URL => "https://api.themoviedb.org/3/movie/now_playing?api_key=b39b74fe7696eacafa15712ba516ed17&language=en-US&page=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


$response = json_decode($response, true); //because of true, it's in an array



	$count = 0;
	foreach ($response as $key => $value) {
		print_r($response['results'][$count]['original_title']);
		//echo '<br>';
		$count++;
	}
}
