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
		array('name'          => esc_html__( 'Contact Form 1', 'standard' ),
			'id'            => 'cf-1',)
	);
}
add_action( 'widgets_init', 'standard_widgets_init' );