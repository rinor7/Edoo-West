<?php
// IDs for English and German
$page_id_en = 312;
$page_id_de = 466;

// Detect current language
if ( function_exists('pll_current_language') ) {
    $lang = pll_current_language();
    $page_id = ($lang === 'de') ? $page_id_de : $page_id_en;
} else {
    $page_id = $page_id_en;
}

// Get ACF fields from the specific page
$about_us = get_field('section__about-us', $page_id) ?: [];

if (empty($about_us['disable_section'])):
?>
<section class="section__about-us" id="about" aria-label="Section About Us">
    <div class="container">
        <div class="row">
            <div class="lefts col-lg-5">
                <div class="img">
                    <img src="<?php echo esc_url($about_us['image'] ?? ''); ?>" 
                         alt="Background"
                         loading="lazy">
                </div>
            </div>
            <div class="rights col-lg-7">
                <?php if (!empty($about_us['titleh1'])): ?>
                    <h2><?php echo esc_html( wp_strip_all_tags($about_us['titleh1']) ); ?></h2>
                <?php endif; ?>

                <?php if (!empty($about_us['titleh2'])): ?>
                    <h3><?php echo esc_html( wp_strip_all_tags($about_us['titleh2']) ); ?></h3>
                <?php endif; ?>

                <?php if (!empty($about_us['titleh3'])): ?>
                    <h4><?php echo esc_html( wp_strip_all_tags($about_us['titleh3']) ); ?></h4>
                <?php endif; ?>

                <?php
                // Show button only if NOT on the same page we set above
                if (!empty($about_us['link1']) && !empty($about_us['name1']) && get_the_ID() !== $page_id): ?>
                    <div class="buttons">
                        <div class="default-btn">
                            <a href="<?php echo esc_url($about_us['link1']); ?>" class="link-btn">
                                <?php echo esc_html($about_us['name1']); ?>
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
       <div class="more-about-us">
         <?php if (get_the_ID() === $page_id): ?>

            <!-- Our Mission -->
            <?php if (!empty($about_us['mission_title']) || !empty($about_us['mission_text'])): ?>
                <div class="about-mission">
                    <?php if (!empty($about_us['mission_title'])): ?>
                        <h5><?php echo esc_html( wp_strip_all_tags($about_us['mission_title']) ); ?></h5>
                    <?php endif; ?>
                    
                    <?php if (!empty($about_us['mission_text'])): ?>
                        <p><?php echo esc_html( wp_strip_all_tags($about_us['mission_text']) ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Our Vision -->
            <?php if (!empty($about_us['vision_title']) || !empty($about_us['vision_text'])): ?>
                <div class="about-vision">
                    <?php if (!empty($about_us['vision_title'])): ?>
                        <h5><?php echo esc_html( wp_strip_all_tags($about_us['vision_title']) ); ?></h5>
                    <?php endif; ?>
                    
                    <?php if (!empty($about_us['vision_text'])): ?>
                        <p><?php echo esc_html( wp_strip_all_tags($about_us['vision_text']) ); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>
       </div>
    </div>
</section>
<?php endif; ?>
