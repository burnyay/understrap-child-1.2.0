<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'intrigue-theme' ); ?></a><a name="top"></a>

	<nav id="masthead" class="site-header sticky-header">
			<div class="site-branding">
				<?php
					the_custom_logo();
				?>
			</div><!-- .site-branding -->
			<a class="mobile-menu" role="button">
   				<i class="fa fa-bars" aria-hidden="true"></i>
  			</a>

			<nav class="main-navigation">
				<?php wp_nav_menu(array(
				'menu' => 'Main Menu', 
				'container_id' => 'cssmenu', 
				'walker' => new CSS_Menu_Walker()
					)); 
				?>

				<div class="header-right">
					<?php get_search_form(); ?>
					<nav class="ecomm-navigation">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'toolbar-menu',
							'menu_id'        => 'header-toolbar-menu',
							'walker' => new CSS_Menu_Walker()
						) );
						?>
					</nav><!-- #ecomm-navigation -->
				</div>
			</nav><!-- #site-navigation -->

	</nav><!-- #masthead -->
		<?php wp_nav_menu(array(
					'menu' => 'Main Menu', 
					'container_id' => 'mobilecssmenu',
					         
					'walker' => new CSS_Menu_Walker()
						)); 
					?>