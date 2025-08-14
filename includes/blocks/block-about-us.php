<?php 
$about_us = get_field('section__about-us') ?: [];

if (empty($about_us['disable_section'])): ?>
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

                <?php if (!empty($about_us['link1']) && !empty($about_us['name1'])): ?>
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
</section>
<?php endif; ?>
