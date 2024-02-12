<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function shushi_cafeteria_enqueue_google_fonts() {

	require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

	wp_enqueue_style(
		'google-fonts-inter',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'shushi_cafeteria_enqueue_google_fonts' );

if (!function_exists('shushi_cafeteria_enqueue_scripts')) {

	function shushi_cafeteria_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('shushi-cafeteria-style', get_stylesheet_uri(), array() );

		wp_style_add_data('shushi-cafeteria-style', 'rtl', 'replace');

		wp_enqueue_style(
			'shushi-cafeteria-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'shushi-cafeteria-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'shushi-cafeteria-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'shushi-cafeteria-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$shushi_cafeteria_css = '';

		if ( get_header_image() ) :

			$shushi_cafeteria_css .=  '
				.header-center-box{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'shushi-cafeteria-style', $shushi_cafeteria_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'shushi-cafeteria-style',$shushi_cafeteria_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'shushi_cafeteria_enqueue_scripts' );
}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('shushi_cafeteria_after_setup_theme')) {

	function shushi_cafeteria_after_setup_theme() {

		load_theme_textdomain( 'shushi-cafeteria', get_stylesheet_directory() . '/languages' );
		if ( ! isset( $shushi_cafeteria_content_width ) ) $shushi_cafeteria_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main Menu', 'shushi-cafeteria' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f3f3f3'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'shushi_cafeteria_after_setup_theme', 999 );

}

require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function shushi_cafeteria_logo_resizer() {

    $shushi_cafeteria_theme_logo_size_css = '';
    $shushi_cafeteria_logo_resizer = get_theme_mod('shushi_cafeteria_logo_resizer');

	$shushi_cafeteria_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($shushi_cafeteria_logo_resizer).'px !important;
			width: '.esc_attr($shushi_cafeteria_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'shushi-cafeteria-style',$shushi_cafeteria_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'shushi_cafeteria_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function shushi_cafeteria_global_color() {

    $shushi_cafeteria_theme_color_css = '';
    $shushi_cafeteria_copyright_bg = get_theme_mod('shushi_cafeteria_copyright_bg');

	$shushi_cafeteria_theme_color_css = '
    .copyright {
			background: '.esc_attr($shushi_cafeteria_copyright_bg).';
		}
	';
    wp_add_inline_style( 'shushi-cafeteria-style',$shushi_cafeteria_theme_color_css );
    wp_add_inline_style( 'shushi-cafeteria-woocommerce-css',$shushi_cafeteria_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'shushi_cafeteria_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('shushi_cafeteria_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function shushi_cafeteria_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'shushi-cafeteria');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'shushi-cafeteria'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_attr('%1$s at %2$s', '1: date, 2: time', 'shushi-cafeteria'), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'shushi-cafeteria' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'shushi-cafeteria'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for shushi_cafeteria_comment()

if (!function_exists('shushi_cafeteria_widgets_init')) {

	function shushi_cafeteria_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','shushi-cafeteria'),
			'id'   => 'shushi-cafeteria-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'shushi-cafeteria'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','shushi-cafeteria'),
			'id'   => 'shushi-cafeteria-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'shushi-cafeteria'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'shushi_cafeteria_widgets_init' );

}

function shushi_cafeteria_get_categories_select() {
	$teh_cats = get_categories();
	$results = array();
	$count = count($teh_cats);
	for ($i=0; $i < $count; $i++) {
	if (isset($teh_cats[$i]))
  		$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	else
  		$count++;
	}
	return $results;
}

function shushi_cafeteria_sanitize_select( $input, $setting ) {
	// Ensure input is a slug
	$input = sanitize_key( $input );

	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'shushi_cafeteria_loop_columns');
if (!function_exists('shushi_cafeteria_loop_columns')) {
	function shushi_cafeteria_loop_columns() {
		$columns = get_theme_mod( 'shushi_cafeteria_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'shushi_cafeteria_per_page', 20 );
function shushi_cafeteria_per_page( $cols ) {
  	$cols = get_theme_mod( 'shushi_cafeteria_product_per_page', 9 );
	return $cols;
}

add_action('after_switch_theme', 'shushi_cafeteria_setup_options');
function shushi_cafeteria_setup_options () {
    update_option('dismissed-get_started', FALSE );
}