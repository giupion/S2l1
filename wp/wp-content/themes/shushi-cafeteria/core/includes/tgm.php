<?php
	
require get_template_directory() . '/core/includes/class-tgm-plugin-activation.php';

/**
 * Recommended plugins.
 */
function shushi_cafeteria_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'shushi-cafeteria' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	shushi_cafeteria_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'shushi_cafeteria_register_recommended_plugins' );