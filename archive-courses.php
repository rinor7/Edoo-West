<?php
global $header_type; // required to access global variable
include("includes/headers/{$header_type}.php"); 
?>

<?php include("includes/blocks/block-hero.php"); ?>

<main id="primary" class="site-archive archive-courses section__our-courses">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="row">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="box__wrapper col-lg-6 col-md-6 col-12">
                        <div class="box__wrapper-inner">
                            <a href="<?php the_permalink(); ?>">
                                <div class="img">
                                    <img src="<?php the_field('external_icon'); ?>" alt="Icon" loading="lazy">
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <?php the_field('external_description'); ?>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php the_posts_pagination(); ?>
        <?php else : ?>
            <p><?php _e('No courses found', 'textdomain'); ?></p>
        <?php endif; ?>
    </div>
</main>


<?php include("includes/footers/default.php");  ?>