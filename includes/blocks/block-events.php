<?php if (empty(get_field('pt-events')['disable_section'])): ?>
<section class="slider__events" id="events">
    <div class="container">
        <?php render_section_header('pt-events'); ?>
       <div class="swiper mySwiper mySwiper-events">
    <div class="swiper-wrapper">
        <?php
        $today = date('Ymd'); // Compare with today's date

        $args = array(
            'post_type'      => 'events',
            'posts_per_page' => -1,
            'meta_key'       => 'event_date', // your ACF field name
            'orderby'        => 'meta_value',
            'order'          => 'ASC',
            'meta_type'      => 'DATE',
            'meta_query'     => array(
                array(
                    'key'     => 'event_date',
                    'value'   => $today,
                    'compare' => '>=', // only future or today’s events
                    'type'    => 'DATE'
                )
            )
        );

        $loop = new WP_Query($args);

        while ($loop->have_posts()):
            $loop->the_post();
        ?>
        <div class="swiper-slide">
            <div class="slider-wrap">
                <div class="img">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">

                    <?php 
                        $badge = get_field('event_badge');
                        if ($badge && $badge !== 'none') {
                            echo '<div class="badge ' . esc_attr($badge) . '">' . ucfirst($badge) . '</div>';
                        }
                    ?>
                </div>
                <div class="content">
                    <a href="<?php the_permalink(); ?>"></a>
                    <?php 
                    $event_date = get_field('event_date');
                    if ($event_date) {
                        $timestamp = strtotime($event_date);
                        ?>
                        <div class="date">
                            <span class="event-day"><?php echo esc_html( date('j', $timestamp) ); ?></span>
                            <span class="separator">|</span>
                            <span class="event-month"><?php echo esc_html( date('F', $timestamp) ); ?></span>
                        </div>
                        <?php
                    }
                    ?>

                    <h4><?php the_title(); ?></h4>

                    <?php if (get_field('time')): ?>
                        <div class="shift">
                            <span><i class="fa-regular fa-clock"></i><?php the_field('time'); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if (get_field('external_description')): ?>
                        <div class="description">
                            <?php the_field('external_description'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>

    </div>
</section>
<?php endif; ?>
