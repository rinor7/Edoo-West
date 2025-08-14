<?php 
$contact_section = get_field('page-contact_section'); // main group field

if (!empty($contact_section['disable_section']) ?? false) return;

$info_boxes = $contact_section['info_boxes']; // repeater: icon, title, text
$intro_text = $contact_section['intro_text']; // text above form
$contact_form_shortcode = $contact_section['contact_form_shortcode']; // CF7 or shortcode
?>

<section class="contact__section">
    <div class="container">
        <?php if ($info_boxes): ?>
        <div class="row contact-info-boxes">
            <?php foreach ($info_boxes as $box): ?>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="contact-box">
                    <?php if (!empty($box['icon'])): ?>
                        <div class="contact-icon">
                            <img src="<?php echo esc_url($box['icon']); ?>" alt="<?php echo esc_attr($box['title']); ?>">
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($box['title'])): ?>
                        <h3 class="contact-box-title"><?php echo esc_html($box['title']); ?></h3>
                    <?php endif; ?>
                    <?php if (!empty($box['text'])): ?>
                        <div class="contact-box-text"><?php echo wp_kses_post($box['text']); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($intro_text)): ?>
        <div class="contact-intro text-center">
            <p><?php echo wp_kses_post($intro_text); ?></p>
        </div>
        <?php endif; ?>

        <?php if (!empty($contact_form_shortcode)): ?>
        <div class="contact-form-wrapper">
            <?php echo do_shortcode($contact_form_shortcode); ?>
        </div>
        <?php endif; ?>
    </div>
</section>