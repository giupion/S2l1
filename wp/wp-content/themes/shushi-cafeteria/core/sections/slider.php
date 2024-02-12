<?php if ( get_theme_mod('shushi_cafeteria_blog_box_enable',false) ) : ?>

<?php $shushi_cafeteria_args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'category_name' =>  get_theme_mod('shushi_cafeteria_blog_slide_category'),
  'posts_per_page' => get_theme_mod('shushi_cafeteria_blog_slide_number'),
); ?>

<div class="slider">
  <div class="owl-carousel">
    <?php $shushi_cafeteria_arr_posts = new WP_Query( $shushi_cafeteria_args );
    if ( $shushi_cafeteria_arr_posts->have_posts() ) :
      while ( $shushi_cafeteria_arr_posts->have_posts() ) :
        $shushi_cafeteria_arr_posts->the_post();
        ?>
        <div class="blog_inner_box">
         <?php
            if ( has_post_thumbnail() ) :
              the_post_thumbnail();
            else:
              ?>
              <div class="slider-alternate">
                <img src="<?php echo esc_url( get_stylesheet_directory_uri() ). '/assets/images/banner.png'; ?>">
              </div>
              <?php
            endif;
          ?>
          <div class="blog_box">
            <div class="blog_box_inner">
              <h3><?php the_title(); ?></h3>
              <p><?php echo wp_trim_words( get_the_content(), 25); ?></p>
              <p class="slider-button mt-4">
                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php esc_html_e('Order Now','shushi-cafeteria'); ?></a>
              </p>
            </div>
            <div class="contact-info">
              <div class="container">
                <div class="row">
                  <div class="col-lg-7 col-md-6 col-2">
                  </div>
                  <div class="col-lg-4 col-md-5 col-10">
                    <div class="row contact-info-inner">
                      <?php if ( get_theme_mod('shushi_cafeteria_slider_phone_number') ) : ?>
                      <div class="col-lg-4 col-md-4 col-4 align-self-center text-center">
                        <i class="fas fa-phone"></i>
                      </div>
                      <div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <p class="mb-0"><?php esc_html_e('Call Now','shushi-cafeteria'); ?></p>
                        <p class="mb-0 info-p"><?php echo esc_html(get_theme_mod('shushi_cafeteria_slider_phone_number','')); ?></p>
                      </div>
                      <?php endif; ?>
                    </div>
                    <div class="row contact-info-inner">
                      <?php if ( get_theme_mod('shushi_cafeteria_slider_email_address') ) : ?>
                      <div class="col-lg-4 col-md-4 col-4 align-self-center text-center">
                        <i class="fas fa-envelope"></i>
                      </div>
                      <div class="col-lg-8 col-md-8 col-8 align-self-center">
                        <p class="mb-0"><?php esc_html_e('Mail Us','shushi-cafeteria'); ?></p>
                        <p class="mb-0 info-p"><?php echo esc_html(get_theme_mod('shushi_cafeteria_slider_email_address','')); ?></p>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="col-lg-1 col-md-1 col-12">
                    <?php $shushi_cafeteria_settings = get_theme_mod( 'shushi_cafeteria_social_links_settings' ); ?>
                    <div class="social-links text-center text-md-left">
                      <?php if ( is_array($shushi_cafeteria_settings) || is_object($shushi_cafeteria_settings) ){ ?>
                        <?php foreach( $shushi_cafeteria_settings as $shushi_cafeteria_setting ) { ?>
                          <a href="<?php echo esc_url( $shushi_cafeteria_setting['link_url'] ); ?>">
                            <i class="<?php echo esc_attr( $shushi_cafeteria_setting['link_text'] ); ?> mr-3"></i>
                          </a>
                        <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
    endwhile;
    wp_reset_postdata();
    endif; ?>
  </div>
</div>

<?php endif; ?>