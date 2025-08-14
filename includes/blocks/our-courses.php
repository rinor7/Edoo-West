<?php if (!get_field('pt-courses')['disable_section'] ?? false): ?>
<section class="section__our-courses" id="our-courses">
    <div class="container">
        <?php render_section_header('pt-courses'); ?>
        <div class="row">
            <?php
                $args = array(
                    'post_type'      => 'courses',
                    'posts_per_page' => -1,
                    'order'          => 'ASC',
                );
                $loop = new WP_Query($args);

                $pt_courses = get_field('pt-courses');
                $col_class  = !empty($pt_courses['columns_per_row']) ? $pt_courses['columns_per_row'] : 'col-lg-3';

                while ($loop->have_posts()):
                    $loop->the_post();
            ?>
            <div class="box__wrapper <?php echo esc_attr($col_class); ?>">
                <div class="box__wrapper-inner">
                    <a href="<?php the_permalink(); ?>">
                        <div class="img">
                            <img src="<?php the_field('external_icon'); ?>" alt="Icon" loading="lazy">
                        </div>
                        <h3><?php the_title(); ?></h3>
                        <?php the_field('external_description'); ?>
                    </a>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php endif; ?>