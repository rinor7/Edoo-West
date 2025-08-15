<?php //Template Name: About
global $header_type; // required to access global variable
include("includes/headers/{$header_type}.php"); 
?>

<main id="primary" class="site-blog">
    
<?php get_template_part('includes/blocks/block-about-us', null, array()); ?>

<?php get_template_part('includes/blocks/block-gallery-slider', null, array()); ?>

</main>

<?php include("includes/footers/default.php"); ?>