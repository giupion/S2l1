<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php echo esc_attr(get_bloginfo('html_type')); ?>; charset=<?php echo esc_attr(get_bloginfo('charset')); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) )
	{
		wp_body_open();
	}else{
		do_action('wp_body_open');
	}
?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'shushi-cafeteria' ); ?></a>

<?php if ( get_theme_mod('shushi_cafeteria_site_loader', false) == true ) : ?>
	<div class="cssloader">
    	<div class="sh1"></div>
    	<div class="sh2"></div>
    	<h1 class="lt"><?php esc_html_e( 'loading',  'shushi-cafeteria' ); ?></h1>
    </div>
<?php endif; ?>

<header id="site-navigation">
	<div class="header-center-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 align-self-center">
					<div class="logo text-center text-md-left">
			    		<div class="logo-image">
			    			<?php echo the_custom_logo(); ?>
				    	</div>
				    	<div class="logo-content">
					    	<?php
					    		if ( get_theme_mod('shushi_cafeteria_display_header_title', true) == true ) :
						      		echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';
						      			echo esc_html(get_bloginfo('name'));
						      		echo '</a>';
						      	endif;

						      	if ( get_theme_mod('shushi_cafeteria_display_header_text', false) == true ) :
					      			echo '<span>'. esc_html(get_bloginfo('description')) . '</span>';
					      		endif;
				    		?>
						</div>
					</div>
				</div>
				<div class="col-lg-7 col-md-7 align-self-center text-center text-md-right">
					<button class="menu-toggle toggle-menu my-2 py-2 px-3" aria-controls="top-menu" aria-expanded="false" type="button">
						<span aria-hidden="true"><?php esc_html_e( 'Menu', 'shushi-cafeteria' ); ?></span>
					</button>
					<nav id="main-menu" class="close-panal main-menu">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'main-menu',
								'container' => 'false'
							));
						?>
						<button class="close-menu close-menu my-2 p-2" type="button">
							<span aria-hidden="true"><i class="fa fa-times"></i></span>
						</button>
					</nav>
				</div>
				<div class="col-lg-1 col-md-1 text-center align-self-center">
					<div class="header-search text-center text-md-right py-3 py-md-0">
		                <a class="open-search-form" href="#search-form"><i class="fa fa-search" aria-hidden="true"></i></a>
		                <div class="search-form"><?php get_search_form();?></div>
			        </div>
			    </div>
			    <div class="col-lg-1 col-md-1 text-center align-self-center">
					<div class="woo-other-info">
						<?php if ( class_exists( 'woocommerce' ) ) {?>
							<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','shushi-cafeteria' ); ?>"><i class="fas fa-shopping-bag"></i><span class="cart-item-box"><?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></span></a>
							<?php if ( is_user_logged_in() ) { ?>
		                    	<a class="account-btn ml-4" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="far fa-user"></i></a>
		                	<?php }
		                	else { ?>
		                    	<a class="account-btn ml-4" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-out-alt"></i></a>
		                	<?php } ?>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>