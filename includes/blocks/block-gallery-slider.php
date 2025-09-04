<?php
// Get ACF gallery field from Global Settings
$pt_gallery = get_field('pt-gallery', 'option') ?: [];

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
