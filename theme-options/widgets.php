<?php

function standard_widgets_init() {
	register_sidebar(
		array('name'          => esc_html__( 'Logo', 'standard' ),
			'id'            => 'widget-1',)
	);
	// register_sidebar(
	// 	array('name'          => esc_html__( 'Widget 2', 'standard' ),
	// 		'id'            => 'widget-2',)
	// ); 
	// register_sidebar(
	// 	array('name'          => esc_html__( 'Widget 3', 'standard' ),
	// 		'id'            => 'widget-3',)
	// );
	// register_sidebar(
	// 	array('name'          => esc_html__( 'Widget 4', 'standard' ),
	// 		'id'            => 'widget-4',)
	// );
	// register_sidebar(
	// 	array('name'          => esc_html__( 'Widget 5', 'standard' ),
	// 		'id'            => 'widget-5',)
	// );
	register_sidebar(
		array('name'          => esc_html__( 'Widget 6', 'standard' ),
			'id'            => 'widget-6',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer Column 1', 'standard' ),
			'id'            => 'footer-1',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer Column 1 Medias', 'standard' ),
			'id'            => 'footer-1-1',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer Column 2', 'standard' ),
			'id'            => 'footer-2',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer Column 3', 'standard' ),
			'id'            => 'footer-3',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer Column 4', 'standard' ),
			'id'            => 'footer-4',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Footer Column 5', 'standard' ),
			'id'            => 'footer-5',)
	);
	register_sidebar(
		array('name'          => esc_html__( 'Contact Form 1', 'standard' ),
			'id'            => 'cf-1',)
	);
}
add_action( 'widgets_init', 'standard_widgets_init' );



// Shortcode to list courses post titles with links
function shortcode_courses_simple_list() {
    ob_start();

    $args = array(
        'post_type'      => 'courses',
        'posts_per_page' =>  6,
        'order'          => 'ASC',
    );
    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        echo '<ul class="courses-list">';
        while ($loop->have_posts()) {
            $loop->the_post();
            echo '<li><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></li>';
        }
        echo '</ul>';
    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('courses_list', 'shortcode_courses_simple_list');



// Shortcode to list events post titles with links
function shortcode_events_simple_list() {
    ob_start();

    $args = array(
        'post_type'      => 'events',
        'posts_per_page' =>  3,
        'order'          => 'ASC',
    );
    $loop = new WP_Query($args);

    if ($loop->have_posts()) {
        echo '<ul class="events-list">';
        while ($loop->have_posts()) {
            $loop->the_post();
            echo '<li><a href="' . esc_url(get_permalink()) . '">' . esc_html(get_the_title()) . '</a></li>';
        }
        echo '</ul>';
    }

    wp_reset_postdata();

    return ob_get_clean();
}
add_shortcode('events_list', 'shortcode_events_simple_list');
