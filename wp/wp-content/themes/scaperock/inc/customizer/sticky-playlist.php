<?php
/**
 * Playlist Options
 *
 * @package ScapeRock
 */

/**
 * Add sticky_playlist options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scaperock_sticky_playlist( $wp_customize ) {
	$wp_customize->add_section( 'scapeshot_sticky_playlist', array(
			'title' => esc_html__( 'Sticky Playlist', 'scaperock' ),
			'panel' => 'scapeshot_theme_options',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_sticky_playlist_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'scapeshot_sanitize_select',
			'choices'           => scapeshot_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'scaperock' ),
			'section'           => 'scapeshot_sticky_playlist',
			'type'              => 'select',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'name'              => 'scapeshot_sticky_playlist',
			'default'           => '0',
			'sanitize_callback' => 'scapeshot_sanitize_post',
			'active_callback'   => 'scaperock_is_sticky_playlist_active',
			'label'             => esc_html__( 'Page', 'scaperock' ),
			'section'           => 'scapeshot_sticky_playlist',
			'type'              => 'dropdown-pages',
		)
	);

	scapeshot_register_option( $wp_customize, array(
			'custom_control'    => 'WP_Customize_Image_Control',
			'name'              => 'scaperock_sections_bg_image',
			'label'             => esc_html__( 'Sections Separator Background Image', 'scaperock' ),
			'description'       => esc_html__( 'Recommended Image Dimension: 1920x250', 'scaperock' ),
			'section'           => 'background_image',
			'sanitize_callback' => 'scaperock_sanitize_image',
		)
	);

	scapeshot_register_option( $wp_customize, array(
		'name'              => 'scapeshot_hero_content_bg_image',
		'sanitize_callback' => 'scaperock_sanitize_image',
		'custom_control'    => 'WP_Customize_Image_Control',
		'active_callback'   => 'scapeshot_is_hero_content_active',
		'label'             => esc_html__( 'Background Image', 'scaperock' ),
		'section'           => 'scapeshot_hero_content_options',
	)
);
}
add_action( 'customize_register', 'scaperock_sticky_playlist', 12 );

/** Active Callback Functions **/
if ( ! function_exists( 'scaperock_is_sticky_playlist_active' ) ) :
	/**
	* Return true if sticky_playlist is active
	*
	* @since 1.0
	*/
	function scaperock_is_sticky_playlist_active( $control ) {
		$enable = $control->manager->get_setting( 'scapeshot_sticky_playlist_visibility' )->value();

		return scapeshot_check_section( $enable );
	}
endif;

/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 *
 * @see wp_check_filetype() https://developer.wordpress.org/reference/functions/wp_check_filetype/
 *
 * @param string               $image   Image filename.
 * @param WP_Customize_Setting $setting Setting instance.
 * @return string The image filename if the extension is allowed; otherwise, the setting default.
 */
function scaperock_sanitize_image( $image, $setting ) {
    /*
     * Array of valid image file types.
     *
     * The array includes image mime types that are included in wp_get_mime_types()
     */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );
    // Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
    // If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : '' );
}
