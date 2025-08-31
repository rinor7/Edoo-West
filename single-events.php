<?php
global $header_type;
include("includes/headers/{$header_type}.php"); 
?>

<main id="primary" class="site-single single-events">

    <div class="container">
        <div class="row">
            
            <!-- Left Column: Featured Image -->
            <div class="lefts col-lg-4">
                <div class="img">
                    <img src="<?php the_post_thumbnail_url(); ?>" 
                         alt="<?php the_title_attribute(); ?>" 
                         loading="lazy">
                          <?php 
                            $badge = get_field('event_badge');
                            if ($badge && $badge !== 'none') {
                                echo '<div class="badge ' . esc_attr($badge) . '">' . ucfirst($badge) . '</div>';
                            }
                        ?>
                </div>
            </div>

            <!-- Right Column: Event Content -->
            <div class="rights col-lg-8">
                <h1><?php the_title(); ?></h1>

                <?php 
                $event_date = get_field('event_date');
                if ($event_date):
                    $timestamp = strtotime($event_date);
                ?>
                    <div class="date">
                        <span class="event-day"><?php echo esc_html(date('j', $timestamp)); ?></span>
                        <span class="separator">|</span>
                        <span class="event-month"><?php echo esc_html(date('F', $timestamp)); ?></span>
                    </div>
                <?php endif; ?>

                <?php if (get_field('speaker')): ?>
                    <div class="speaker">
                        <b><?php the_field('speaker-default'); ?>:</b><span> <?php the_field('speaker'); ?></span>
                    </div>
                <?php endif; ?>

                <?php if (get_field('time')): ?>
                    <div class="shift">
                        <span><i class="fa-regular fa-clock"></i><?php the_field('time'); ?></span>
                    </div>
                <?php endif; ?>

                <?php if (get_field('external_description')): ?>
                    <div class="description">
                        <?php the_content(); ?>
                    </div>
                <?php endif; ?>

                <?php 
                $badge = get_field('event_badge');
                if ($badge && $badge !== 'none'): 
                ?>
                    <div class="badge <?php echo esc_attr($badge); ?>">
                        <?php echo ucfirst($badge); ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>


       <div class="register-form">
                <?php
                $lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
                if ($lang === 'de') {
                    $extra_section = get_field('extra_section_de', 'option') ?: get_field('extra_section', 'option');
                } else {
                    $extra_section = get_field('extra_section', 'option');
                }
                if ($extra_section && (!empty($extra_section['title']) || !empty($extra_section['shortcode']))):
                ?>
                <section class="extra-section">
                    <div class="container">

                        <?php if (!empty($extra_section['title'])): ?>
                            <div class="extra-title">
                                <?php echo wp_kses_post($extra_section['title']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($extra_section['shortcode'])): ?>
                            <div class="extra-shortcode">
                                <?php echo do_shortcode($extra_section['shortcode']); ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </section>
            <?php endif; ?>
        </div>



    </div>

</main><!-- #main -->

<?php include("includes/footers/default.php"); ?>
