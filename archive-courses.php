<?php
global $header_type; // required to access global variable
include("includes/headers/{$header_type}.php"); 
?>

<?php include("includes/blocks/block-hero.php"); ?>

<main id="primary" class="site-archive archive-courses section__our-courses">

    <div class="container">
        <?php
        // Get the section from ACF Options Page
        $boxes_section = get_field('event_boxes_section', 'option');

        if ($boxes_section && !empty($boxes_section['boxes'])):
        ?>
        <section class="event-boxes-section">
            <div class="container">

                <!-- Section Title -->
                <?php if (!empty($boxes_section['section_title'])): ?>
                    <h2><?php echo wp_kses_post($boxes_section['section_title']); ?></h2>
                <?php endif; ?>

                <div class="row">
                    <?php foreach ($boxes_section['boxes'] as $box): ?>
                        <div class="col-lg-4">
                            <div class="event-box">
                                <?php if (!empty($box['span_text'])): ?>
                                    <span class="box-span"><?php echo esc_html($box['span_text']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($box['title'])): ?>
                                    <h3><?php echo esc_html($box['title']); ?></h3>
                                <?php endif; ?>

                                <?php if (!empty($box['subtitle'])): ?>
                                    <p><?php echo esc_html($box['subtitle']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php endif; ?>

    </div>

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