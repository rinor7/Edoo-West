<?php
/* Template Name: Home */
global $header_type; // required to access global variable
include("includes/headers/{$header_type}.php");
?>

<main id="primary" class="site-main">

<?php get_template_part('includes/blocks/block-banner-one', null, array()); ?>

<?php get_template_part('includes/blocks/block-about-us', null, array()); ?>

<?php get_template_part('includes/blocks/block-partners', null, array()); ?>

<?php get_template_part('includes/blocks/our-courses', null, array()); ?>

<?php get_template_part('includes/blocks/quick-section', null, array()); ?>

<?php get_template_part('includes/blocks/block-events', null, array()); ?>

<?php get_template_part('includes/blocks/block-reviews', null, array()); ?>

</main>

<?php include("includes/footers/default.php");  ?>