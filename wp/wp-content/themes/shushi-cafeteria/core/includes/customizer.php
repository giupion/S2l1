<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'shushi_cafeteria_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'shushi-cafeteria' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shushi_cafeteria_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'shushi-cafeteria' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shushi-cafeteria' ),
			'off' => esc_html__( 'Disable', 'shushi-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shushi_cafeteria_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'shushi-cafeteria' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shushi-cafeteria' ),
			'off' => esc_html__( 'Disable', 'shushi-cafeteria' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'shushi_cafeteria_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'shushi-cafeteria' ),
	) );

	Kirki::add_section( 'shushi_cafeteria_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'shushi-cafeteria' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_all_headings_typography',
		'section'     => 'shushi_cafeteria_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'shushi_cafeteria_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'shushi-cafeteria' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_body_content_typography',
		'section'     => 'shushi_cafeteria_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'shushi_cafeteria_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'shushi-cafeteria' ),
		'description' => esc_attr__( 'Select the typography options for your content.',  'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// PANEL

	Kirki::add_panel( 'shushi_cafeteria_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'shushi-cafeteria' ),
	) );

	// Additional Settings

	Kirki::add_section( 'shushi_cafeteria_additional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'shushi-cafeteria' ),
	    'description'    => esc_html__( 'Scroll To Top', 'shushi-cafeteria' ),
	    'panel'          => 'shushi_cafeteria_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'shushi_cafeteria_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_additional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Radio_Buttonset(
		[
			'settings'    => 'shushi_cafeteria_scroll_top_position',
			'label'       => esc_html__( 'Alignment for Scroll To Top', 'shushi-cafeteria' ),
			'section'     => 'shushi_cafeteria_additional_settings',
			'default'     => 'Right',
			'priority'    => 10,
			'choices'     => [
				'Left'   => esc_html__( 'Left', 'shushi-cafeteria' ),
				'Center' => esc_html__( 'Center', 'shushi-cafeteria' ),
				'Right'  => esc_html__( 'Right', 'shushi-cafeteria' ),
			],
		]
	);

	new \Kirki\Field\Select(
		[
			'settings'    => 'menu_text_transform_shushi_cafeteria',
			'label'       => esc_html__( 'Menus Text Transform', 'shushi-cafeteria' ),
			'section'     => 'shushi_cafeteria_additional_settings',
			'default'     => 'CAPITALISE',
			'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
			'choices'     => [
				'CAPITALISE' => esc_html__( 'CAPITALISE', 'shushi-cafeteria' ),
				'UPPERCASE' => esc_html__( 'UPPERCASE', 'shushi-cafeteria' ),
				'LOWERCASE' => esc_html__( 'LOWERCASE', 'shushi-cafeteria' ),

			],
		]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'shushi_cafeteria_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_additional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'shushi_cafeteria_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_additional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'shushi_cafeteria_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_additional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','shushi-cafeteria'),
            'Right Sidebar' => __('Right Sidebar','shushi-cafeteria'),
            'One Column' => __('One Column','shushi-cafeteria')
		],
	] );

	if ( class_exists("woocommerce")){

		// Woocommerce Settings

		Kirki::add_section( 'shushi_cafeteria_woocommerce_settings', array(
				'title'          => esc_html__( 'Woocommerce Settings', 'shushi-cafeteria' ),
				'description'    => esc_html__( 'Shop Page', 'shushi-cafeteria' ),
				'panel'          => 'shushi_cafeteria_panel_id',
				'priority'       => 160,
		) );

		Kirki::add_field( 'theme_config_id', [
			'type'        => 'toggle',
			'settings'    => 'shushi_cafeteria_shop_sidebar',
			'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'shushi-cafeteria' ),
			'section'     => 'shushi_cafeteria_woocommerce_settings',
			'default'     => '1',
			'priority'    => 10,
		] );

		Kirki::add_field( 'theme_config_id', [
			'type'        => 'toggle',
			'settings'    => 'shushi_cafeteria_product_sidebar',
			'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'shushi-cafeteria' ),
			'section'     => 'shushi_cafeteria_woocommerce_settings',
			'default'     => '1',
			'priority'    => 10,
		] );

		Kirki::add_field( 'theme_config_id', [
			'type'        => 'toggle',
			'settings'    => 'shushi_cafeteria_related_product_setting',
			'label'       => esc_html__( 'Here you can enable or disable your related products.', 'shushi-cafeteria' ),
			'section'     => 'shushi_cafeteria_woocommerce_settings',
			'default'     => true,
			'priority'    => 10,
		] );

		new \Kirki\Field\Number(
			[
				'settings' => 'shushi_cafeteria_per_columns',
				'label'    => esc_html__( 'Product Per Row', 'shushi-cafeteria' ),
				'section'  => 'shushi_cafeteria_woocommerce_settings',
				'default'  => 3,
				'choices'  => [
					'min'  => 1,
					'max'  => 4,
					'step' => 1,
				],
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => 'shushi_cafeteria_product_per_page',
				'label'    => esc_html__( 'Product Per Page', 'shushi-cafeteria' ),
				'section'  => 'shushi_cafeteria_woocommerce_settings',
				'default'  => 9,
				'choices'  => [
					'min'  => 1,
					'max'  => 15,
					'step' => 1,
				],
			]
		);

		new \Kirki\Field\Select(
		[
			'settings'    => 'shushi_cafeteria_shop_page_layout',
			'label'       => esc_html__( 'Shop Page Layout Setting', 'shushi-cafeteria' ),
			'section'     => 'shushi_cafeteria_woocommerce_settings',
			'default' => 'Right Sidebar',
			'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
			'choices'     => [
				'Left Sidebar' => __('Left Sidebar','shushi-cafeteria'),
	            'Right Sidebar' => __('Right Sidebar','shushi-cafeteria')
			],
		] );

		new \Kirki\Field\Select(
		[
			'settings'    => 'shushi_cafeteria_product_page_layout',
			'label'       => esc_html__( 'Product Page Layout Setting', 'shushi-cafeteria' ),
			'section'     => 'shushi_cafeteria_woocommerce_settings',
			'default' => 'Right Sidebar',
			'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
			'choices'     => [
				'Left Sidebar' => __('Left Sidebar','shushi-cafeteria'),
	            'Right Sidebar' => __('Right Sidebar','shushi-cafeteria')
			],
		] );

		new \Kirki\Field\Radio_Buttonset(
		[
			'settings'    => 'shushi_cafeteria_woocommerce_pagination_position',
			'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'shushi-cafeteria' ),
			'section'     => 'shushi_cafeteria_woocommerce_settings',
			'default'     => 'Center',
			'priority'    => 10,
			'choices'     => [
				'Left'   => esc_html__( 'Left', 'shushi-cafeteria' ),
				'Center' => esc_html__( 'Center', 'shushi-cafeteria' ),
				'Right'  => esc_html__( 'Right', 'shushi-cafeteria' ),
			],
		]
		);
	}

	// POST SECTION

	Kirki::add_section( 'shushi_cafeteria_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'shushi-cafeteria' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'shushi-cafeteria' ),
	    'panel'          => 'shushi_cafeteria_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_enable_post_heading',
		'section'     => 'shushi_cafeteria_section_post',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shushi_cafeteria_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shushi-cafeteria' ),
			'off' => esc_html__( 'Disable', 'shushi-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shushi_cafeteria_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shushi-cafeteria' ),
			'off' => esc_html__( 'Disable', 'shushi-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'shushi_cafeteria_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'shushi_cafeteria_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'shushi_cafeteria_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','shushi-cafeteria'),
            'Right Sidebar' => __('Right Sidebar','shushi-cafeteria')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'shushi_cafeteria_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','shushi-cafeteria'),
            'Right Sidebar' => __('Right Sidebar','shushi-cafeteria')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'shushi_cafeteria_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','shushi-cafeteria'),
            'Right Sidebar' => __('Right Sidebar','shushi-cafeteria')
		],
	] );
 
	// SLIDER SECTION

	Kirki::add_section( 'shushi_cafeteria_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'shushi-cafeteria' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'shushi-cafeteria' ),
        'panel'          => 'shushi_cafeteria_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_enable_heading',
		'section'     => 'shushi_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shushi_cafeteria_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shushi-cafeteria' ),
			'off' => esc_html__( 'Disable', 'shushi-cafeteria' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_slider_heading',
		'section'     => 'shushi_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Main Slider', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'shushi_cafeteria_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_blog_slide_section',
		'default'     => 3,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'shushi_cafeteria_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 750 x 450 )', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'shushi-cafeteria' ),
		'priority'    => 10,
		'choices'     => shushi_cafeteria_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_second_slider_heading',
		'section'     => 'shushi_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Second Slider', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'shushi_cafeteria_slider_content_alignment',
		'label'       => esc_html__( 'Slider Content Alignment', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_blog_slide_section',
		'default'     => 'CENTER-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'shushi-cafeteria' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'shushi-cafeteria' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'shushi-cafeteria' ),

		],
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'shushi_cafeteria_slider_opacity_color',
		'label'       => esc_html__( 'Slider Opacity Option', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_blog_slide_section',
		'default'     => '0.6',
		'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
		'choices'     => [
			'0' => esc_html__( '0', 'shushi-cafeteria' ),
			'0.1' => esc_html__( '0.1', 'shushi-cafeteria' ),
			'0.2' => esc_html__( '0.2', 'shushi-cafeteria' ),
			'0.3' => esc_html__( '0.3', 'shushi-cafeteria' ),
			'0.4' => esc_html__( '0.4', 'shushi-cafeteria' ),
			'0.5' => esc_html__( '0.5', 'shushi-cafeteria' ),
			'0.6' => esc_html__( '0.6', 'shushi-cafeteria' ),
			'0.7' => esc_html__( '0.7', 'shushi-cafeteria' ),
			'0.8' => esc_html__( '0.8', 'shushi-cafeteria' ),
			'0.9' => esc_html__( '0.9', 'shushi-cafeteria' ),
			'1.0' => esc_html__( '1.0', 'shushi-cafeteria' ),
			

		],
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shushi_cafeteria_overlay_option',
		'label'       => esc_html__( 'Enable / Disable Slider Overlay', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_blog_slide_section',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shushi-cafeteria' ),
			'off' => esc_html__( 'Disable', 'shushi-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_slider_phone_number_heading',
		'section'     => 'shushi_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Phone Number', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'shushi_cafeteria_slider_phone_number',
		'section'  => 'shushi_cafeteria_blog_slide_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_slider_email_address_heading',
		'section'     => 'shushi_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Email Address', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'shushi_cafeteria_slider_email_address',
		'section'  => 'shushi_cafeteria_blog_slide_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_enable_socail_link',
		'section'     => 'shushi_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'shushi_cafeteria_blog_slide_section',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'shushi-cafeteria' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'shushi-cafeteria' ),
		'settings'     => 'shushi_cafeteria_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'shushi-cafeteria' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'shushi-cafeteria' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'shushi-cafeteria' ),
				'description' => esc_html__( 'Add the social icon url here.', 'shushi-cafeteria' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
		'partial_refresh'    => [
		'shushi_cafeteria_social_links_settings' => [
			'selector'        => '.social-links i',
			'render_callback' => function() {
				return get_bloginfo( 'name', 'display' );
			},
		],
	],
	] );

	// FEATURED PRODUCT SECTION

	Kirki::add_section( 'shushi_cafeteria_featured_product_section', array(
	    'title'          => esc_html__( 'Featured Product Settings', 'shushi-cafeteria' ),
	    'panel'          => 'shushi_cafeteria_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_enable_heading',
		'section'     => 'shushi_cafeteria_featured_product_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Featured Product',  'shushi-cafeteria' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shushi_cafeteria_featured_product_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_featured_product_section',
		'default'     => false,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'shushi-cafeteria' ),
			'off' => esc_html__( 'Disable',  'shushi-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'shushi_cafeteria_featured_product_heading' ,
        'label'    => esc_html__( 'Heading',  'shushi-cafeteria' ),
        'section'  => 'shushi_cafeteria_featured_product_section',
        'partial_refresh'    => [
			'shushi_cafeteria_featured_product_heading' => [
				'selector'        => '#featured-product h2',
				'render_callback' => function() {
					return get_bloginfo( 'name', 'display' );
				},
			],
		],
    ] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'settings' => 'shushi_cafeteria_featured_product_text' ,
        'label'    => esc_html__( 'Content',  'shushi-cafeteria' ),
        'section'  => 'shushi_cafeteria_featured_product_section',
        'partial_refresh'    => [
			'shushi_cafeteria_featured_product_text' => [
				'selector'        => '#featured-product p',
				'render_callback' => function() {
					return get_bloginfo( 'name', 'display' );
				},
			],
		],
    ] );

	// FOOTER SECTION

	Kirki::add_section( 'shushi_cafeteria_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'shushi-cafeteria' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'shushi-cafeteria' ),
        'panel'          => 'shushi_cafeteria_panel_id',
        'priority'       => 160,
    ) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_footer_enable_heading',
		'section'     => 'shushi_cafeteria_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'shushi_cafeteria_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'shushi-cafeteria' ),
			'off' => esc_html__( 'Disable', 'shushi-cafeteria' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'shushi_cafeteria_footer_text_heading',
		'section'     => 'shushi_cafeteria_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'shushi-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'shushi_cafeteria_footer_text',
		'section'  => 'shushi_cafeteria_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'shushi_cafeteria_footer_text_heading_2',
	'section'     => 'shushi_cafeteria_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'shushi-cafeteria' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'shushi_cafeteria_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'shushi-cafeteria' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'shushi-cafeteria' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'shushi-cafeteria' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'shushi-cafeteria' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'shushi_cafeteria_footer_text_heading_1',
	'section'     => 'shushi_cafeteria_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'shushi-cafeteria' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'shushi_cafeteria_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'shushi-cafeteria' ),
		'section'     => 'shushi_cafeteria_footer_section',
		'default'     => '',
	] );
}


add_action( 'customize_register', 'shushi_cafeteria_customizer_settings' );
function shushi_cafeteria_customizer_settings( $wp_customize ) {
	$shushi_cafeteria_args = array(
       'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
	$categories = get_categories($shushi_cafeteria_args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($m==0){
			$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('shushi_cafeteria_featured_product_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'shushi_cafeteria_sanitize_select',
	));
	$wp_customize->add_control('shushi_cafeteria_featured_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display products ','shushi-cafeteria'),
		'section' => 'shushi_cafeteria_featured_product_section',
	));
}