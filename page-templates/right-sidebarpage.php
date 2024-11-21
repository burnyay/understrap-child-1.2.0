<?php
/**
 * Template Name: Right Sidebar Layout ACF
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div
				class="<?php if ( is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area"
				id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); 
						$id = get_the_ID();

							// check if the flexible content field has rows of data
							if ( have_rows( 'flexible_layouts', $id ) ) :

								    // loop through the selected ACF layouts and display the matching partial
								    while ( have_rows( 'flexible_layouts', $id ) ) : the_row();

        								get_template_part( 'partials/flexible-layouts/' . get_row_layout() );

    						endwhile;

							elseif ( get_the_content() ) :

    						// no layouts found

							endif;

					endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
