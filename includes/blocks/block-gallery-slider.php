<?php
// IDs for English and German Gallery pages
$gallery_id_en = 314; // <-- replace with your EN gallery page ID
$gallery_id_de = 480; // <-- replace with your DE gallery page ID

// Detect current language
if (function_exists('pll_current_language')) {
    $lang = pll_current_language();
    $gallery_page_id = ($lang === 'de') ? $gallery_id_de : $gallery_id_en;
} else {
    $gallery_page_id = $gallery_id_en;
}

// Get ACF gallery field from the specific gallery page
$pt_gallery = get_field('pt-gallery', $gallery_page_id) ?: [];

if (!empty($pt_gallery['gallery_section'])):
?>
<section class="gallery__section about-us-gallery">
    <div class="container">
        <div class="swiper aboutUsSwiper">
            <div class="swiper-wrapper">
                <?php foreach ($pt_gallery['gallery_section'] as $gallery_item):
                    $image_url = $gallery_item['images'];
                    $title     = $gallery_item['title'];
                    if ($image_url):
                ?>
                <div class="swiper-slide">
                    <div class="image-wrap">
                        <img src="<?php echo esc_url($image_url); ?>" 
                             alt="<?php echo esc_attr($title ?: 'Image'); ?>" 
                             class="img-fluid">
                    </div>
                </div>
                <?php endif; endforeach; ?>
            </div>
            
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<?php endif; ?>
