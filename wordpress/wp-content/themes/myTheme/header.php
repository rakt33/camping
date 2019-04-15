<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <?php
                        $args = array(
                            'theme_location' => 'primary'
                        );
                    ?>
                    <?php wp_nav_menu($args); ?>
                </div>
            </div>
        </div>
    </div>
