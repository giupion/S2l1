<?php if ( get_theme_mod('shushi_cafeteria_featured_product_section_enable',false) ) : ?>
	<div id="featured-product" class="py-5">
		<div class="container">
			<?php if ( get_theme_mod('shushi_cafeteria_featured_product_heading') ) : ?>
	      		<h2 class="text-center"><?php echo esc_html(get_theme_mod('shushi_cafeteria_featured_product_heading'));?></h2>
	      	<?php endif; ?>
	      	<?php if ( get_theme_mod('shushi_cafeteria_featured_product_text') ) : ?>
	      		<p class="mb-4 text-center"><?php echo esc_html(get_theme_mod('shushi_cafeteria_featured_product_text'));?></p>
	      	<?php endif; ?>
	        <div class="row">
	            <?php
	            $shushi_cafeteria_catData = get_theme_mod('shushi_cafeteria_featured_product_category','');
	            if ( class_exists( 'WooCommerce' ) ) {
	              	$shushi_cafeteria_args = array(
		                'post_type' => 'product',
		                'posts_per_page' => 100,
		                'product_cat' => $shushi_cafeteria_catData,
		                'order' => 'ASC'
	              	);
	              	$loop = new WP_Query( $shushi_cafeteria_args );
	              	while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
		                <div class="col-lg-6 col-md-6">
		                	<div class="featured-content mb-4">
			                	<div class="row">
			                		<div class="col-lg-4 col-md-4">
			                			<div class="product-image box">
					                    	<figure class="mb-0">
					                        	<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
					                        	<?php if ( has_post_thumbnail() ) { ?>
						                            <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
						                        <?php }?>
					                        </figure>
					                    </div>
			                		</div>
			                		<div class="col-lg-6 col-md-6 col-9">
			                			<div class="product-details">
					                    	<h5 class="product-text my-2 "><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h5>
					                    	<h6 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> mb-0"><?php echo $product->get_price_html(); ?></h6>
					                    	<?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
						                </div>
			                		</div>
			                		<div class="col-lg-2 col-md-2 col-3">
			                			<div class="box-content intro-button">
						                    <?php if( $product->is_type( 'simple' ) ) { woocommerce_template_loop_add_to_cart(  $loop->post, $product );} ?>
						                </div>
			                		</div>
			                	</div>
		                	</div>
		                </div>
	              	<?php endwhile; wp_reset_postdata(); ?>
	            <?php } ?>
	        </div>
		</div>
	</div>
<?php endif; ?>
