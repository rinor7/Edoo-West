<?php
if (is_tax() || is_category() || is_tag()) {
    // For taxonomy archive pages
    $term = get_queried_object();
    $page_title = $term->name;

    $hero_image = get_field('hero', $term);
    $thumbnail = get_field('the_post_thumbnail_url', $term);
    $right_side_text = get_field('hero_right_text', $term);
    $button_text = get_field('hero_button_text', $term);
    $button_url = get_field('hero_button_url', $term);

} elseif (is_post_type_archive() || is_singular()) {

    $post_type = get_post_type();

    if (is_singular()) {
        $page_title = get_the_title();
    } elseif (is_post_type_archive('courses')) {
        // Only for Courses archive
        $page_title = (function_exists('pll_current_language') && pll_current_language() === 'de') 
            ? 'Kurse' // German
            : 'Courses'; // English
    } else {
        // Other post type archives
        $page_title = get_post_type_object($post_type)->labels->singular_name;
    }

    // Default fallback
    $hero_image = '';
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');

    // Get hero from options page based on post type
    if ($post_type === 'courses') {
        // If German, get German hero; otherwise use default English hero
        if (function_exists('pll_current_language') && pll_current_language() === 'de') {
            $hero_image = get_field('courses_hero_de', 'option') ?: get_field('courses_hero', 'option');
        } else {
            $hero_image = get_field('courses_hero', 'option');
        }
    }

} else {
    // Regular pages
    $page_title = get_the_title();
    $hero_image = get_field('hero');
    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
}
    // Determine the background image: Hero image > Thumbnail > Default fallback
    $default_image = get_template_directory_uri() . '/assets/img/bg.png';
    $background_image = $hero_image ?: ($thumbnail ?: $default_image);
    
?>

<section class="block-hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="container">
        <div class="block-hero-content">
            <div class="content">
                <h1 class="hero-title"><?php echo esc_html($page_title); ?></h1>
                <div class="breadcrumbs">
                    <?php if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
                    } ?>
                </div>
            </div>
        </div>
    </div>
</section>
