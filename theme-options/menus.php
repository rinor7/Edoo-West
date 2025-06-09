<?php 

function menu_setup() {
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Main Header Menu', 'standard' ),
			'menu-2' => esc_html__( 'Footer Menu', 'standard' ),
			'menu-3' => esc_html__( 'Announcement Menu', 'standard' ),
			'menu-4' => esc_html__( 'Main Left Header Menu ( when centerized logo)', 'standard' ),
			'menu-5' => esc_html__( 'Main Right Header Menu ( when centerized logo)', 'standard' ),
			'menu-6' => esc_html__( 'Main Left&Right Header Menu ( when centerized logo)', 'standard' ),
		)
	);
}
add_action( 'after_setup_theme', 'menu_setup' );