<?php
if (function_exists('yoast_breadcrumb')) {
    ?>
    <p id="breadcrumbs">
        <a href="<?php echo home_url('/'); ?>"><?php echo byron_file_contents('img/left-arrow.svg'); ?></a>
        <?php yoast_breadcrumb(); ?>
    </p>
    <?php
}
