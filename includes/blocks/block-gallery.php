<?php 
$pt_gallery = get_field('pt-gallery');
if (!empty($pt_gallery['gallery_section'])): 
    $col_class = !empty($pt_gallery['columns_per_row']) ? $pt_gallery['columns_per_row'] : 'col-lg-4';
?>
<section class="gallery__section">
    <div class="row">
        <?php foreach ($pt_gallery['gallery_section'] as $gallery_item): 
            $image_url = $gallery_item['images'];
            $title     = $gallery_item['title'];
            if ($image_url):
        ?>
        <div class="<?php echo esc_attr($col_class); ?> col-md-6 col-12 <?php echo esc_attr($col_class); ?>-wrap">
            <div class="image-wrap">
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title ?: 'Image'); ?>" class="img-fluid">
                <?php if (!empty($title)): ?>
                    <div class="image-overlay">
                        <?php echo esc_html($title); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; endforeach; ?>
    </div>
</section>
<?php endif; ?>
