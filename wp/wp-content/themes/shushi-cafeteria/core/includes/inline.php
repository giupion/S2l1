<?php


$shushi_cafeteria_custom_css = '';

	/*---------------------------text-transform-------------------*/

	$shushi_cafeteria_text_transform = get_theme_mod( 'menu_text_transform_shushi_cafeteria','CAPITALISE');
    if($shushi_cafeteria_text_transform == 'CAPITALISE'){

		$shushi_cafeteria_custom_css .='#main-menu ul li a{';

			$shushi_cafeteria_custom_css .='text-transform: capitalize;';

		$shushi_cafeteria_custom_css .='}';

	}else if($shushi_cafeteria_text_transform == 'UPPERCASE'){

		$shushi_cafeteria_custom_css .='#main-menu ul li a{';

			$shushi_cafeteria_custom_css .='text-transform: uppercase;';

		$shushi_cafeteria_custom_css .='}';

	}else if($shushi_cafeteria_text_transform == 'LOWERCASE'){

		$shushi_cafeteria_custom_css .='#main-menu ul li a{';

			$shushi_cafeteria_custom_css .='text-transform: lowercase;';

		$shushi_cafeteria_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

$shushi_cafeteria_container_width = get_theme_mod('shushi_cafeteria_container_width');

		$shushi_cafeteria_custom_css .='body{';

			$shushi_cafeteria_custom_css .='width: '.esc_attr($shushi_cafeteria_container_width).'%; margin: auto';

		$shushi_cafeteria_custom_css .='}';

		/*---------------------------Slider-content-alignment-------------------*/

	$shushi_cafeteria_slider_content_alignment = get_theme_mod( 'shushi_cafeteria_slider_content_alignment','LEFT-ALIGN');

	 if($shushi_cafeteria_slider_content_alignment == 'LEFT-ALIGN'){

			$shushi_cafeteria_custom_css .='.blog_box{';

				$shushi_cafeteria_custom_css .='text-align:left;';

			$shushi_cafeteria_custom_css .='}';


		}else if($shushi_cafeteria_slider_content_alignment == 'CENTER-ALIGN'){

			$shushi_cafeteria_custom_css .='.blog_box{';

				$shushi_cafeteria_custom_css .='text-align:center;';

			$shushi_cafeteria_custom_css .='}';


		}else if($shushi_cafeteria_slider_content_alignment == 'RIGHT-ALIGN'){

			$shushi_cafeteria_custom_css .='.blog_box{';

				$shushi_cafeteria_custom_css .='text-align:right;';

			$shushi_cafeteria_custom_css .='}';

		}

		/*---------------------------Copyright Text alignment-------------------*/

$shushi_cafeteria_copyright_text_alignment = get_theme_mod( 'shushi_cafeteria_copyright_text_alignment','LEFT-ALIGN');

 if($shushi_cafeteria_copyright_text_alignment == 'LEFT-ALIGN'){

		$shushi_cafeteria_custom_css .='.copy-text p{';

			$shushi_cafeteria_custom_css .='text-align:left;';

		$shushi_cafeteria_custom_css .='}';


	}else if($shushi_cafeteria_copyright_text_alignment == 'CENTER-ALIGN'){

		$shushi_cafeteria_custom_css .='.copy-text p{';

			$shushi_cafeteria_custom_css .='text-align:center;';

		$shushi_cafeteria_custom_css .='}';


	}else if($shushi_cafeteria_copyright_text_alignment == 'RIGHT-ALIGN'){

		$shushi_cafeteria_custom_css .='.copy-text p{';

			$shushi_cafeteria_custom_css .='text-align:right;';

		$shushi_cafeteria_custom_css .='}';

	}

	/*---------------------------Related Product Settings-------------------*/

		$shushi_cafeteria_related_product_setting = get_theme_mod('shushi_cafeteria_related_product_setting',true);

		if($shushi_cafeteria_related_product_setting == false){

			$shushi_cafeteria_custom_css .='.related.products, .related h2{';

				$shushi_cafeteria_custom_css .='display: none;';

			$shushi_cafeteria_custom_css .='}';
		}

		/*---------------------------Scroll to Top Alignment Settings-------------------*/

		$shushi_cafeteria_scroll_top_position = get_theme_mod( 'shushi_cafeteria_scroll_top_position','Right');

		if($shushi_cafeteria_scroll_top_position == 'Right'){
	
			$shushi_cafeteria_custom_css .='.scroll-up{';
	
				$shushi_cafeteria_custom_css .='right: 20px;';
	
			$shushi_cafeteria_custom_css .='}';
	
		}else if($shushi_cafeteria_scroll_top_position == 'Left'){
	
			$shushi_cafeteria_custom_css .='.scroll-up{';
	
				$shushi_cafeteria_custom_css .='left: 20px;';
	
			$shushi_cafeteria_custom_css .='}';
	
		}else if($shushi_cafeteria_scroll_top_position == 'Center'){
	
			$shushi_cafeteria_custom_css .='.scroll-up{';
	
				$shushi_cafeteria_custom_css .='right: 50%;left: 50%;';
	
			$shushi_cafeteria_custom_css .='}';
		}
	
			/*---------------------------Pagination Settings-------------------*/
	
	
	$shushi_cafeteria_pagination_setting = get_theme_mod('shushi_cafeteria_pagination_setting',true);
	
		if($shushi_cafeteria_pagination_setting == false){
	
			$shushi_cafeteria_custom_css .='.nav-links{';
	
				$shushi_cafeteria_custom_css .='display: none;';
	
			$shushi_cafeteria_custom_css .='}';
		}

			/*---------------------------Pagination to Top Alignment Settings-------------------*/

	$shushi_cafeteria_woocommerce_pagination_position = get_theme_mod( 'shushi_cafeteria_woocommerce_pagination_position','Center');

	if($shushi_cafeteria_woocommerce_pagination_position == 'Left'){

		$shushi_cafeteria_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$shushi_cafeteria_custom_css .='text-align: left;';

		$shushi_cafeteria_custom_css .='}';

	}else if($shushi_cafeteria_woocommerce_pagination_position == 'Center'){

		$shushi_cafeteria_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$shushi_cafeteria_custom_css .='text-align: center;';

		$shushi_cafeteria_custom_css .='}';

	}else if($shushi_cafeteria_woocommerce_pagination_position == 'Right'){

		$shushi_cafeteria_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$shushi_cafeteria_custom_css .='text-align: right;';

		$shushi_cafeteria_custom_css .='}';
	}

			/*--------------------------- Slider Opacity -------------------*/

	$shushi_cafeteria_slider_opacity_color = get_theme_mod( 'shushi_cafeteria_slider_opacity_color','0.5');

	if($shushi_cafeteria_slider_opacity_color == '0'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.1'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.1';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.2'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.2';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.3'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.3';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.4'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.4';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.5'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.5';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.6'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.6';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.7'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.7';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.8'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.8';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '0.9'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.9';

		$shushi_cafeteria_custom_css .='}';

		}else if($shushi_cafeteria_slider_opacity_color == '1.0'){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.9';

		$shushi_cafeteria_custom_css .='}';

		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$shushi_cafeteria_overlay_option = get_theme_mod('shushi_cafeteria_overlay_option', true);

	if($shushi_cafeteria_overlay_option == false){

		$shushi_cafeteria_custom_css .='.blog_inner_box img{';

			$shushi_cafeteria_custom_css .='opacity:0.5;';

		$shushi_cafeteria_custom_css .='}';
	}
