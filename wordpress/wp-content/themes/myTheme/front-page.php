<?php get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

            <div class="home-intro">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-6">
                            <h1><?php echo get_field('intro_titel'); ?></h1>
                            <?php echo get_field('intro_tekst'); ?>
                            <a href="<?php echo the_field('intro_button_link')['url']; ?>" class="btn btn-light"><?php echo get_field('intro_button_tekst'); ?></php><i class="fas fa-arrow-right arrow-right"></i></a>
                        </div>
                        <div class="col-lg-3">

                        </div>
                    </div>
                </div>
            </div>

            <div class="home-diensten">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-6">
                            <h1><?php echo get_field('diensten_titel'); ?></h1>
                        </div>
                        <div class="col-lg-3">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <!-- Card -->
                            <div class="card">
                                <!-- Card content -->
                                <div class="card-body">
                                    <!-- Title -->
                                    <svg class="code" id="bd8b1f02-26d3-4fa6-9fd2-b21b68ee663c" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1536.62 511.96"><title>code-solid</title>
                                        <path class="code-left" d="M376.61,401.3l43.5-46.4a12,12,0,0,0-.8-17.2L328.71,258l90.6-79.7a11.92,11.92,0,0,0,.8-17.2l-43.5-46.4a12,12,0,0,0-17-.5l-144.1,135a11.92,11.92,0,0,0,0,17.5l144.1,135.1a11.92,11.92,0,0,0,17-.5Z"/>
                                        <path class="code-middle" d="M938.9,513.5l-61-17.7a12,12,0,0,1-8.2-14.9L1006.2,10.7a12,12,0,0,1,14.9-8.2l61,17.7a12,12,0,0,1,8.2,14.9L953.8,505.3A12,12,0,0,1,938.9,513.5Z"/>
                                        <path class="code-right" d="M1600.39,401.92l144.1-135.1a11.92,11.92,0,0,0,0-17.5l-144.1-135.2a12.11,12.11,0,0,0-17,.5l-43.5,46.4a12,12,0,0,0,.8,17.2l90.6,79.8-90.6,79.7a11.92,11.92,0,0,0-.8,17.2l43.5,46.4a12,12,0,0,0,17,.6Z"/>
                                    </svg>
                                    <h4 class="card-title code-title">Web Development</h4>
                                    <!-- Text -->
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <!-- Button -->
                                    <a href="#" class="btn btn-elegant">Lees meer</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Card -->
                            <div class="card">
                                <!-- Card content -->
                                <div class="card-body">
                                    <div class="hosting-icon">
                                        <svg id="b35597db-8487-4b5d-b8ab-7efad6080a1a" class="hosting-1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 128">
                                            <path d="M480,0H32A32,32,0,0,0,0,32V96a32,32,0,0,0,32,32H480a32,32,0,0,0,32-32V32A32,32,0,0,0,480,0ZM368,88a24,24,0,1,1,24-24A24,24,0,0,1,368,88Zm64,0a24,24,0,1,1,24-24A24,24,0,0,1,432,88Z"/>
                                        </svg>
                                        <br />
                                        <svg id="b35597db-8487-4b5d-b8ab-7efad6080a1a" class="hosting-2" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 128">
                                            <path d="M480,0H32A32,32,0,0,0,0,32V96a32,32,0,0,0,32,32H480a32,32,0,0,0,32-32V32A32,32,0,0,0,480,0ZM368,88a24,24,0,1,1,24-24A24,24,0,0,1,368,88Zm64,0a24,24,0,1,1,24-24A24,24,0,0,1,432,88Z"/>
                                        </svg>
                                        <br />
                                        <svg id="b35597db-8487-4b5d-b8ab-7efad6080a1a" class="hosting-3" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 128">
                                            <path d="M480,0H32A32,32,0,0,0,0,32V96a32,32,0,0,0,32,32H480a32,32,0,0,0,32-32V32A32,32,0,0,0,480,0ZM368,88a24,24,0,1,1,24-24A24,24,0,0,1,368,88Zm64,0a24,24,0,1,1,24-24A24,24,0,0,1,432,88Z"/>
                                        </svg>
                                    </div>
                                    <h4 class="card-title hosting-title">Hosting</h4>
                                    <!-- Text -->
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <!-- Button -->
                                    <a href="#" class="btn btn-elegant">Lees meer</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <!-- Card -->
                            <div class="card">
                                <!-- Card content -->
                                <div class="card-body">
                                    <!-- Title -->
                                    <svg class="hammer" aria-hidden="true" data-prefix="fas" data-icon="hammer" class="svg-inline--fa fa-hammer fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="currentColor" d="M571.31 193.94l-22.63-22.63c-6.25-6.25-16.38-6.25-22.63 0l-11.31 11.31-28.9-28.9c5.63-21.31.36-44.9-16.35-61.61l-45.25-45.25c-62.48-62.48-163.79-62.48-226.28 0l90.51
                                            45.25v18.75c0 16.97 6.74 33.25 18.75 45.25l49.14 49.14c16.71 16.71 40.3 21.98 61.61 16.35l28.9 28.9-11.31 11.31c-6.25 6.25-6.25 16.38 0
                                            22.63l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l90.51-90.51c6.23-6.24 6.23-16.37-.02-22.62zm-286.72-15.2c-3.7-3.7-6.84-7.79-9.85-11.95L19.64
                                            404.96c-25.57 23.88-26.26 64.19-1.53 88.93s65.05 24.05 88.93-1.53l238.13-255.07c-3.96-2.91-7.9-5.87-11.44-9.41l-49.14-49.14z">
                                        </path>
                                    </svg>
                                    <h4 class="card-title">Onderhoud</h4>
                                    <!-- Text -->
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <!-- Button -->
                                    <a href="#" class="btn btn-elegant">Lees meer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home-skills">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1><?php echo get_field('skills_titel'); ?></h1>
                            <?php echo get_field('skills_tekst'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="skills-bar-container">
                                <li>
                                    <div class="progressbar-title">
                                        <h3>HTML5</h3>
                                        <span class="percent" id="html-pourcent"></span>
                                    </div>
                                    <div class="bar-container">
                                        <span class="progressbar progressred" id="progress-html"></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="progressbar-title">
                                        <h3>CSS</h3>
                                        <span class="percent" id="css-pourcent"></span>
                                    </div>
                                    <div class="bar-container">
                                        <span class="progressbar progressblue" id="progress-css"></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="progressbar-title">
                                        <h3>JavaScript / jQuery</h3>
                                        <span class="percent" id="javascript-pourcent"></span>
                                    </div>
                                    <div class="bar-container">
                                        <span class="progressbar progresspurple" id="progress-javascript"></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="progressbar-title">
                                        <h3>PHP</h3>
                                        <span class="percent" id="php-pourcent"></span>
                                    </div>
                                    <div class="bar-container">
                                        <span class="progressbar progressorange" id="progress-php"></span>
                                    </div>
                                </li>

                                <li>
                                    <div class="progressbar-title">
                                        <h3>Wordpress</h3>
                                        <span class="percent" id="wordpress-pourcent"></span>
                                    </div>
                                    <div class="bar-container">
                                        <span class="progressbar progressgreen" id="progress-wordpress"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">

                        </div>
                        <div class="col-lg-6">
                            <div class="call-to-action">
                                <h1><?php echo the_field('call_to_action_titel'); ?></h1>
                                <?php echo the_field('call_to_action_tekst'); ?>
                                <a href="<?php echo the_field('call_to_action_button_link   ')['url'];?>" class="btn btn-light"><?php echo the_field('call_to_action_button_tekst'); ?><i class="fas fa-arrow-right arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3">

                        </div>
                    </div>
                </div>
            </div>

<?php  }
    wp_reset_postdata();
}

get_footer();
?>
