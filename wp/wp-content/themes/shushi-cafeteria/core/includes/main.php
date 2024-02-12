<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_shushi_cafeteria_dismissed_notice_handler', 'shushi_cafeteria_ajax_notice_handler' );

function shushi_cafeteria_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function shushi_cafeteria_deprecated_hook_admin_notice() {
        if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

            <?php
            $current_screen = get_current_screen();
				if ($current_screen->id !== 'appearance_page_shushi-cafeteria-guide-page') {
             $shushi_cafeteria_comments_theme = wp_get_theme(); ?>
            <div class="shushi-cafeteria-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
			<div class="shushi-cafeteria-notice">
				<div class="shushi-cafeteria-notice-img">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'shushi-cafeteria'); ?>">
				</div>
				<div class="shushi-cafeteria-notice-content">
					<div class="shushi-cafeteria-notice-heading"><?php esc_html_e('Thanks for installing ','shushi-cafeteria'); ?><?php echo esc_html( $shushi_cafeteria_comments_theme ); ?></div>
					<p><?php printf(__('In order to fully benefit from everything our theme has to offer, please make sure you visit our <a href="%s">For Premium Options</a>.', 'shushi-cafeteria'), esc_url(admin_url('themes.php?page=shushi-cafeteria-guide-page'))); ?></p>
				</div>
			</div>
		</div>
        <?php }
	}
}

add_action( 'admin_notices', 'shushi_cafeteria_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'shushi_cafeteria_getting_started' );
function shushi_cafeteria_getting_started() {
	add_theme_page( esc_html__('Get Started', 'shushi-cafeteria'), esc_html__('Get Started', 'shushi-cafeteria'), 'edit_theme_options', 'shushi-cafeteria-guide-page', 'shushi_cafeteria_test_guide');
}

function shushi_cafeteria_admin_enqueue_scripts() {
	wp_enqueue_style( 'shushi-cafeteria-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'shushi-cafeteria-admin-script', get_template_directory_uri() . '/js/shushi-cafeteria-admin-script.js', array( 'jquery' ), '', true );
    wp_localize_script( 'shushi-cafeteria-admin-script', 'shushi_cafeteria_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'shushi_cafeteria_admin_enqueue_scripts' );


if ( ! defined( 'SHUSHI_CAFETERIA_DOCS_FREE' ) ) {
define('SHUSHI_CAFETERIA_DOCS_FREE',__('https://www.misbahwp.com/docs/shushi-cafeteria-free-docs/','shushi-cafeteria'));
}
 if ( ! defined( 'SHUSHI_CAFETERIA_DOCS_PRO' ) ) {
define('SHUSHI_CAFETERIA_DOCS_PRO',__('https://www.misbahwp.com/docs/shushi-cafeteria-pro-docs','shushi-cafeteria'));
}
if ( ! defined( 'SHUSHI_CAFETERIA_BUY_NOW' ) ) {
define('SHUSHI_CAFETERIA_BUY_NOW',__('https://www.misbahwp.com/themes/shushi-wordpress-theme/','shushi-cafeteria'));
}
if ( ! defined( 'SHUSHI_CAFETERIA_SUPPORT_FREE' ) ) {
define('SHUSHI_CAFETERIA_SUPPORT_FREE',__('https://wordpress.org/support/theme/shushi-cafeteria','shushi-cafeteria'));
}
if ( ! defined( 'SHUSHI_CAFETERIA_REVIEW_FREE' ) ) {
define('SHUSHI_CAFETERIA_REVIEW_FREE',__('https://wordpress.org/support/theme/shushi-cafeteria/reviews/#new-post','shushi-cafeteria'));
}
if ( ! defined( 'SHUSHI_CAFETERIA_DEMO_PRO' ) ) {
define('SHUSHI_CAFETERIA_DEMO_PRO',__('https://www.misbahwp.com/demo/shushi-cafeteria/','shushi-cafeteria'));
}
if( ! defined( 'SHUSHI_CAFETERIA_THEME_BUNDLE' ) ) {
define('SHUSHI_CAFETERIA_THEME_BUNDLE',__('https://www.misbahwp.com/themes/wordpress-bundle/','shushi-cafeteria'));
}

function shushi_cafeteria_test_guide() { ?>
	<?php $shushi_cafeteria_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( SHUSHI_CAFETERIA_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'shushi-cafeteria' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'shushi-cafeteria' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( SHUSHI_CAFETERIA_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'shushi-cafeteria' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( SHUSHI_CAFETERIA_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'shushi-cafeteria' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','shushi-cafeteria'); ?><?php echo esc_html( $shushi_cafeteria_theme ); ?>  <span><?php esc_html_e('Version: ', 'shushi-cafeteria'); ?><?php echo esc_html($shushi_cafeteria_theme['Version']);?></span></h3>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $shushi_cafeteria_theme->get_screenshot() ); ?>" />
				<div id="description-insidee">
					<?php
						$shushi_cafeteria_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $shushi_cafeteria_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="volleyball-postboxx">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'shushi-cafeteria' ); ?></h3>
				<div class="volleyball-insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','shushi-cafeteria'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( SHUSHI_CAFETERIA_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'shushi-cafeteria' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( SHUSHI_CAFETERIA_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'shushi-cafeteria' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( SHUSHI_CAFETERIA_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'shushi-cafeteria' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'shushi-cafeteria' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 80+ Perfect WordPress Theme In A Single Package at just $79."','shushi-cafeteria'); ?></p>
					<p class="coupon"><?php esc_html_e('Exclusive Offer !! Get Our Theme Pack of 80+ WordPress Themes At 10% Off','shushi-cafeteria'); ?><span class="coupon-code"><?php esc_html_e('"Themespack10"','shushi-cafeteria'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( SHUSHI_CAFETERIA_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'shushi-cafeteria' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','shushi-cafeteria'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','shushi-cafeteria'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','shushi-cafeteria'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','shushi-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>

<?php } ?>
