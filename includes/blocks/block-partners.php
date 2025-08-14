<?php if (!get_field('pt-partners')['disable_section'] ?? false): ?>
<section class="slider__partners-section">
    <div class="container">
        <?php render_section_header('pt-partners'); ?>
        <div class="swiper mySwiper mySwiper-partners">
            <div class="swiper-wrapper">
                <?php $partners = get_field('pt-partners');
                if (!empty($partners['partners_repeater'])):
                    foreach ($partners['partners_repeater'] as $row):
                        $image_url = $row['image'];
                        if ($image_url):
                            ?>
                            <div class="swiper-slide">
                                <div class="img"><img src="<?php echo esc_url($image_url); ?>" alt="Partner logo" loading="lazy"></div>
                            </div>
                            <?php
                        endif;
                    endforeach;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
