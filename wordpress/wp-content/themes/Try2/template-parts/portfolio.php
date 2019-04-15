<?php /* Template Name: Portfolio */ ?>
<?php get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>

        <div class="portfolio-into">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-6">
                        <h1>Lorum Ipsum.</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            In faucibus augue sed lacus cursus, vel tempus ex maximus.
                            Integer luctus dignissim turpis nec venenatis.
                            Sed ut mi ut dolor scelerisque placerat tempus at est.
                            Maecenas id lorem rhoncus, ornare urna eget, malesuada ante.
                            Maecenas vitae.
                        </p>
                    </div>
                    <div class="col-lg-3">

                    </div>
                </div>
            </div>
        </div>

        <div class="portfolio-cards">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                    </div>
                    <div class="col-lg-6">
                        <h1>Lorum Ipsum.</h1>
                    </div>
                    <div class="col-lg-3">

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <img src="/wp-content/uploads/2018/12/lemke-logo.png" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/wp-content/uploads/2018/12/lemke-logo.png" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/wp-content/uploads/2018/12/lemke-logo.png" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/wp-content/uploads/2018/12/lemke-logo.png" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php  }
    wp_reset_postdata();
}

get_footer();
?>
