<?php 
$quick_call = get_field('quick-call-group') ?: [];

if (empty($quick_call['disable_section'])): 
    $background = $quick_call['background'] ?? ''; // ACF image field (URL)
    $bg_overlay_color = $quick_call['background_overlay_color'] ?? get_field('background_overlay_color') ?? '#000000a1'; // overlay color field

    // Build style for section
    $inline_style = '';
    if ($background) {
        $inline_style .= 'background-image:url(' . esc_url($background) . ');background-size:cover;background-position:center;';
    }
?>
<section class="quick__section" id="contact" aria-label="Quick Call to Action"
    <?php if ($inline_style): ?>style="<?php echo $inline_style; ?>"<?php endif; ?>>
    
    <?php if ($background): ?>
        <div class="image-overlay" style="background-color: <?php echo esc_attr($bg_overlay_color); ?>;"></div>
    <?php endif; ?>

    <div class="container">
        <div class="side-wrapper">
            <div class="row">
                <div class="lefts col-lg-7">
                <?php echo wp_kses_post( $quick_call['subtitle'] ?? '' ); ?>
                <h3><?php echo esc_html( wp_strip_all_tags( $quick_call['title'] ?? '' ) ); ?></h3>
                </div>
                <div class="rights col-lg-5">
                    <?php echo $quick_call['cf'] ?? ''; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
