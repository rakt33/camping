<?php get_header();

// API
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.themoviedb.org/3/movie/now_playing?api_key=09a6021cc4bdf2aaf9157e2df65934e6&language=en-US&page=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
// Response ( succes )
$response = curl_exec($curl);
// Error
$err = curl_error($curl);

curl_close($curl);

// Json to var
$response = json_decode($response, true); //because of true, it's in an array


if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="movie-data">

						<?php
							$count = 0;
							foreach ($response as $key => $value) {
						?>

								<a href="" target="_blank"><div class="movie_card" id="bright">
									<div class="info_section">
										<div class="movie_header">
											<img class="locandina" src="https://image.tmdb.org/t/p/w370_and_h556_bestv2<?php echo $response['results'][$count]['poster_path'] ?>" alt="<?php echo $response['results'][$count]['original_title'] ?>"/>
											<h1><?php echo $response['results'][$count]['original_title'] ?></h1>
											<h4><?php echo date("F d, Y", strtotime($response['results'][$count]['release_date'])); ?></h4>
											<span class="minutes">130min</span>
											<p class="type">Drama, Sport</p>
										</div>
										<div class="movie_desc">
											<p class="text">
												<?php echo $response['results'][$count]['overview'] ?>
											</p>
										</div>
									</div>
									<div class="blur_back bright_back" style="background:url(https://image.tmdb.org/t/p/w1400_and_h450_face/<?php echo $response['results'][$count]['backdrop_path'] ?>);"></div>
								</div></a>

						<?php
								$count++;
							}
						?>

                        </div>
                    </div>
                </div>
            </div>

<?php  }
    wp_reset_postdata();
}

/*get_footer();*/
?>
