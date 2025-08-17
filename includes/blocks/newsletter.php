<?php 
$lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
if ($lang === 'de') {
    $newsletter_text      = get_field('newsletter_text_de', 'option') ?: get_field('newsletter_text', 'option');
    $newsletter_shortcode = get_field('newsletter_shortcode_de', 'option') ?: get_field('newsletter_shortcode', 'option');
} else {
    $newsletter_text      = get_field('newsletter_text', 'option');
    $newsletter_shortcode = get_field('newsletter_shortcode', 'option');
}
?>

<section class="footer-newsletter">
    <div class="container">
        <div class="row align-items-center">
            <?php if (!empty($newsletter_text)): ?>
            <div class="col-md-6 newsletter-text">
                <?php echo wp_kses_post($newsletter_text); ?>
            </div>
            <?php endif; ?>

            <?php if (!empty($newsletter_shortcode)): ?>
            <div class="col-md-6 newsletter-form">
                <?php echo do_shortcode($newsletter_shortcode); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>