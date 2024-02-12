<?php
/*
 * This is the child theme for ScapeRock theme.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
function scaperock_enqueue_styles() {
    // Include parent theme CSS.
    wp_enqueue_style( 'scapeshot-style', get_template_directory_uri() . '/style.css', null, date( 'Ymd-Gis', filemtime( get_template_directory() . '/style.css' ) ) );
    
    // Include child theme CSS.
    wp_enqueue_style( 'scaperock-style', get_stylesheet_directory_uri() . '/style.css', array( 'scapeshot-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/style.css' ) ) );

	// Load the rtl.
	if ( is_rtl() ) {
		wp_enqueue_style( 'scapeshot-rtl', get_template_directory_uri() . '/rtl.css', array( 'scapeshot-style' ), $version );
	}

	// Enqueue child block styles after parent block style.
	wp_enqueue_style( 'scaperock-block-style', get_stylesheet_directory_uri() . '/assets/css/child-blocks.css', array( 'scapeshot-block-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/assets/css/child-blocks.css' ) ) );
}
add_action( 'wp_enqueue_scripts', 'scaperock_enqueue_styles' );

/**
 * Add child theme editor styles
 */
function scaperock_editor_style() {
	add_editor_style( array(
			'assets/css/child-editor-style.css',
			scapeshot_fonts_url(),
			get_theme_file_uri( 'assets/css/font-awesome/css/font-awesome.css' ),
		)
	);
}
add_action( 'after_setup_theme', 'scaperock_editor_style', 11 );

/**
 * Enqueue editor styles for Gutenberg
 */
function scaperock_block_editor_styles() {
	// Enqueue child block editor style after parent editor block css.
	wp_enqueue_style( 'scaperock-block-editor-style', get_stylesheet_directory_uri() . '/assets/css/child-editor-blocks.css', array( 'scapeshot-block-editor-style' ), date( 'Ymd-Gis', filemtime( get_stylesheet_directory() . '/assets/css/child-editor-blocks.css' ) ) );
}
add_action( 'enqueue_block_editor_assets', 'scaperock_block_editor_styles', 11 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function scaperock_body_classes( $classes ) {
	// Added color scheme to body class.
	$classes['color-scheme'] = 'color-scheme-rockmusic';

	//Sticky Playlist
	$enable_section = get_theme_mod( 'scapeshot_sticky_playlist_visibility', 'disabled' );

	if ( scapeshot_check_section( $enable_section ) ) {
		$classes[] = 'sticky-playlist-enabled';
	}

	if ( get_theme_mod( 'scapeshot_sections_bg_image' ) ) {
		$classes['section-seperator-bg'] = 'image-sep-on';
	}

	return $classes;
}
add_filter( 'body_class', 'scaperock_body_classes', 100 );

/**
 * Change default header text color
 */
function scaperock_dark_header_default_color( $args ) {
	$args['default-image'] =  get_theme_file_uri( 'assets/images/header-image.jpg' );

	return $args;
}
add_filter( 'scapeshot_custom_header_args', 'scaperock_dark_header_default_color' );

/**
 * Add an HTML class to MediaElement.js container elements to aid styling.
 *
 * Extends the core _wpmejsSettings object to add a new feature via the
 * MediaElement.js plugin API.
 */
function scaperock_mejs_add_container_class() {
	if ( ! wp_script_is( 'mediaelement', 'done' ) ) {
		return;
	}

	$next_track_text   = esc_attr__( 'Next Track', 'scaperock' );
	$prev_track_text   = esc_attr__( 'Previous Track', 'scaperock' );
	$toggle_text       = esc_attr__( 'Toggle Playlist', 'scaperock' );

	$next_track_icon = scapeshot_get_svg( array(
		'icon'     => 'next',
		'fallback' => true,
	) );

	$prev_track_icon = scapeshot_get_svg( array(
		'icon'     => 'prev',
		'fallback' => true,
	) );

	$toggle_icon = scapeshot_get_svg( array(
		'icon'     => 'playlist',
		'fallback' => true,
	) );

	$toggle_close = scapeshot_get_svg( array(
		'icon'     => 'close',
		'fallback' => true,
	) );

 	?>
	<script>
	(function() {
		var settings = window._wpmejsSettings || {};

		settings.features = settings.features || mejs.MepDefaults.features;

		settings.features.push( 'scapeshot_class' );

		MediaElementPlayer.prototype.buildscapeshot_class = function(player, controls, layers, media) {
			if ( ! player.isVideo ) {
				var container = player.container[0] || player.container;

				container.style.height = '';
				container.style.width = '';
				player.options.setDimensions = false;
			}

			if ( jQuery( '#' + player.id ).parents('#sticky-playlist-section').length ) {
				player.container.addClass( 'mejs-container mejs-sticky-playlist-container' );

				jQuery( '#' + player.id ).parent().children('.wp-playlist-tracks').addClass('displaynone');

				var volume_slider = controls[0].children[5];

				if ( jQuery( '#' + player.id ).parent().children('.wp-playlist-tracks').length > 0) {
					var playlist_button =
					jQuery('<div class="mejs-playlist-button mejs-toggle-playlist ">' +
						'<button type="button" aria-controls="mep_0" title="<?php echo esc_attr( $toggle_text ); ?>"><?php echo $toggle_icon; ?><?php echo $toggle_close; ?>
						</button>' +
					'</div>')

					// append it to the toolbar
					.appendTo( jQuery( '#' + player.id ) )

					// add a click toggle event
					.on( 'click',function() {
						jQuery( '#' + player.id ).parent().children('.wp-playlist-tracks').slideToggle();
						jQuery( this ).toggleClass('is-open')
					});

					var play_button = controls[0].children[0];

					// Add next button after volume slider
					var next_button =
					jQuery('<div class="mejs-next-button mejs-next">' +
						'<button type="button" aria-controls="' + player.id
						+ '" title="<?php echo esc_attr( $next_track_text ); ?>"><?php echo $next_track_icon; ?></button>' +
					'</div>')

					// insert after volume slider
					.insertAfter(play_button)

					// add a click toggle event
					.on( 'click',function() {
						jQuery( '#' + player.id ).parent().find( '.wp-playlist-next').trigger('click');
					});

					// Add prev button after volume slider
					var previous_button =
					jQuery('<div class="mejs-previous-button mejs-previous">' +
						'<button type="button" aria-controls="' + player.id
						+ '" title="<?php echo esc_attr( $prev_track_text ); ?>"><?php echo $prev_track_icon; ?></button>' +
					'</div>')

					// insert after volume slider
					.insertBefore( play_button )

					// add a click toggle event
					.on( 'click',function() {
						jQuery( '#' + player.id ).parent().find( '.wp-playlist-prev').trigger('click');
					});
				}
			} else {
				player.container.addClass( 'mejs-container' );

				if ( jQuery( '#' + player.id ).parent().children('.wp-playlist-tracks').length > 0) {
					var play_button = controls[0].children[0];

					// Add next button after volume slider
					var next_button =
					jQuery('<div class="mejs-next-button mejs-next">' +
						'<button type="button" aria-controls="' + player.id
						+ '" title="<?php echo esc_attr( $next_track_text ); ?>"><?php echo $next_track_icon; ?></button>' +
					'</div>')

					// insert after volume slider
					.insertAfter(play_button)

					// add a click toggle event
					.on( 'click',function() {
						jQuery( '#' + player.id ).parent().find( '.wp-playlist-next').trigger('click');
					});

					// Add prev button after volume slider
					var previous_button =
					jQuery('<div class="mejs-previous-button mejs-previous">' +
						'<button type="button" aria-controls="' + player.id
						+ '" title="<?php echo esc_attr( $prev_track_text ); ?>"><?php echo $prev_track_icon; ?></button>' +
					'</div>')

					// insert after volume slider
					.insertBefore( play_button )

					// add a click toggle event
					.on( 'click',function() {
						jQuery( '#' + player.id ).parent().find( '.wp-playlist-prev').trigger('click');
					});
				}
			}
		}
	})();
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'scaperock_mejs_add_container_class' );

/**
 * Override google font to source of parent
 */
function scapeshot_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	* supported by Montserrat, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$poppins = _x( 'on', 'Poppins: on or off', 'scapeshot' );

	/* Translators: If there are characters in your language that are not
	* supported by Courgette, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$courgette = _x( 'on', 'Courgette: on or off', 'photofocus' );

	if ( 'off' !== $poppins || 'off' !== $courgette ) {
		$font_families = array();

		if ( 'off' !== $poppins ) {
		$font_families[] = 'Poppins::200,300,400,500,600,700,400italic,700italic';
		}

		if ( 'off' !== $courgette ) {
		$font_families[] = 'Courgette:200,300,400,500,600,700,400italic,700italic';
		}

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	// Load google font locally.
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
			
	return esc_url_raw( wptt_get_webfont_url( $fonts_url ) );
}

/**
 * Override header media text alignments and positions of parent
 */
function scapeshot_header_media_text() {

	if ( ! scapeshot_has_header_media_text() ) {
		// Bail early if header media text is disabled on front page
		return get_header_image();
	}

	$content_alignment 	= 'content-align-center';
	$text_alignment 	= 'text-align-center';

	$header_media_logo = get_theme_mod( 'scapeshot_header_media_logo' );

	$classes = array();
	if( is_front_page() ) {
		$classes[] = $content_alignment;
		$classes[] = $text_alignment;
	}

	?>
	<div class="custom-header-content sections header-media-section <?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		<div class="custom-header-content-wrapper">
			<?php
			$header_media_subtitle = get_theme_mod( 'scapeshot_header_media_sub_title' );
			$enable_homepage_logo = get_theme_mod( 'scapeshot_header_media_logo_option', 'homepage' );

			if( is_front_page() ) : ?>
				<div class="section-subtitle"> <?php echo esc_html( $header_media_subtitle ); ?> </div>
			<?php endif;

			if ( scapeshot_check_section( $enable_homepage_logo ) && $header_media_logo ) {  ?>
				<div class="site-header-logo">
					<img src="<?php echo esc_url( $header_media_logo ); ?>" title="<?php echo esc_url( home_url( '/' ) ); ?>" />
				</div><!-- .site-header-logo -->
			<?php } ?>

			<?php
			$tag = 'h2';

			if ( is_singular() || is_404() ) {
				$tag = 'h1';
			}

			scapeshot_header_title( '<div class="entry-header"><' . $tag . ' class="entry-title">', '</' . $tag . '></div>' );
			?>

			<?php scapeshot_header_description( '<div class="site-header-text">', '</div>' ); ?>

			<?php if ( is_front_page() ) :
				$header_media_url_text = get_theme_mod( 'scapeshot_header_media_url_text' );
				
				if ( $header_media_url_text ) : 
					$header_media_url = get_theme_mod( 'scapeshot_header_media_url', '#' );
					?>
					<p>
					<span class="more-link">
						<a href="<?php echo esc_url( $header_media_url ); ?>" target="<?php echo esc_attr( get_theme_mod( 'scapeshot_header_url_target' ) ? '_blank' : '_self' ); ?>" class="readmore"><?php echo esc_html( $header_media_url_text ); ?></a>
					</span></p>
				<?php endif;
			endif; ?>
		</div><!-- .custom-header-content-wrapper -->
	</div><!-- .custom-header-content -->
	<?php
} // scapeshot_header_media_text.

/**
 * Adds sections separator background image CSS
 */
function scaperock_sections_seperator_bg_css() {
	$bg_image = get_theme_mod( 'scaperock_sections_bg_image' ) ;

	if ( ! $bg_image ) {
		// Bail if contact section is disabled.
		return;
	}

	$css = '.image-sep-on #page .section:after { background-image: url( "' . esc_url( $bg_image ) . '" ); }';

	wp_add_inline_style( 'scaperock-style', $css );
}
add_action( 'wp_enqueue_scripts', 'scaperock_sections_seperator_bg_css', 11 );

/**
 * Adds hero content bg CSS
 */
function scaperock_hero_content_bg_css() {
	$enable   = get_theme_mod( 'scapeshot_hero_content_visibility', 'disabled' );

	if ( ! scapeshot_check_section( $enable ) ) {
		// Bail if contact section is disabled.
		return;
	}

	$background = get_theme_mod( 'scapeshot_hero_content_bg_image' );

	$css = '';

	if ( $background ) {
		$css = '#hero-section { background-image: url("' . esc_url( $background ) . '"); }';
	}

	wp_add_inline_style( 'scapeshot-style', $css );
}
add_action( 'wp_enqueue_scripts', 'scaperock_hero_content_bg_css', 11 );

/**
 * Load Customizer Options
 */
require trailingslashit( get_stylesheet_directory() ) . 'inc/customizer/sticky-playlist.php';
