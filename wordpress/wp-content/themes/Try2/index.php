<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <div class="container">
            <div class="post-content">
                <h1><?php the_title(); ?></h1>
                <p><?php the_content(); ?></p>
            </div>
        </div>
        <?php
    }
}

get_footer();
