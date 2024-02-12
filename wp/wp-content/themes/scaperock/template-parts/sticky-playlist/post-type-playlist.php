<?php
/**
 * The template used for displaying playlist
 *
 * @package Photofocus
 */
?>

<?php

$scapeshot_type = get_theme_mod( 'scapeshot_sticky_playlist_type', 'page' );

if ( 'page' === $scapeshot_type && $scapeshot_id = get_theme_mod( 'scapeshot_sticky_playlist' ) ) {
	$args['page_id'] = absint( $scapeshot_id );
} elseif ( 'post' === $scapeshot_type && $scapeshot_id = get_theme_mod( 'scapeshot_sticky_playlist_post' ) ) {
	$args['p'] = absint( $scapeshot_id );
} elseif ( 'category' === $scapeshot_type && $scapeshot_cat = get_theme_mod( 'scapeshot_sticky_playlist_category' ) ) {
	$args['cat']            = absint( $scapeshot_cat );
	$args['posts_per_page'] = 1;
}

// If $args is empty return false
if ( empty( $args ) ) {
	return;
}

$class = '';
if( get_theme_mod( 'scapeshot_sticky_playlist_fluid_layout', 0 ) ) {
	$class = 'sticky-fluid';
}

// Create a new WP_Query using the argument previously created
$playlist_query = new WP_Query( $args );
if ( $playlist_query->have_posts() ) :
	while ( $playlist_query->have_posts() ) :
		$playlist_query->the_post();
		?>

		<div id="sticky-playlist-section" class="sticky-playlist-section <?php echo esc_attr( $class ); ?>">
			<div class="wrapper">
				<div class="section-content-wrapper playlist-wrapper">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-container">
							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
						</div><!-- .entry-container -->
					</article><!-- #post-## -->
				</div><!-- .wrapper -->
			</div><!-- .section-content -->
		</div><!-- #playlist-section -->
	<?php
	endwhile;

	wp_reset_postdata();
endif;
