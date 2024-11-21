<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );

function my_scripts_method() {
if ( !is_admin() ) {
    wp_enqueue_script('jquery-ui-accordion');
    }
}

add_action('wp_enqueue_scripts', 'my_scripts_method');

function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Spells Sidebar', 'textdomain' ),
        'id'            => 'sidebar-20',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Woocommerce Sidebar', 'textdomain' ),
        'id'            => 'woocommerce',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

if(class_exists('WooCommerce')){
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'crunchify_disable_woocommerce_loading_css_js' );
 
function crunchify_disable_woocommerce_loading_css_js() {
 
    // Check if WooCommerce plugin is active
    if( function_exists( 'is_woocommerce' ) ){
 
        // Check if it's any of WooCommerce page
        if(! is_woocommerce() && ! is_cart() && ! is_checkout() ) {         
            
            ## Dequeue WooCommerce styles
            wp_dequeue_style('woocommerce-layout'); 
            wp_dequeue_style('woocommerce-general'); 
            wp_dequeue_style('woocommerce-smallscreen');    
 
            ## Dequeue WooCommerce scripts
            wp_dequeue_script('wc-cart-fragments');
            wp_dequeue_script('woocommerce'); 
            wp_dequeue_script('wc-add-to-cart'); 
        
            wp_deregister_script( 'js-cookie' );
            wp_dequeue_script( 'js-cookie' );
 
        }
    }   
}

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'blog-image', 768, 432, true );
    add_image_size( 'homepage-blog-roll', 445, 222, true );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'blog' => __('Blog'),
    ) );
}

function exclude_single_posts($query) {
      if (($query->is_home() || $query->is_archive() || $query->is_feed() || $query->is_search()) && $query->is_main_query()) {
          $query->set('category__not_in', array(177));
      }
}
add_action('pre_get_posts', 'exclude_single_posts');

// img unautop
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<div class="figure">$1</div>', $pee);
    return $pee;
}
add_filter( 'acf_the_content', 'img_unautop', 30 );

add_filter( 'woocommerce_checkout_fields' , 'custom_remove_woo_checkout_fields' );
 
function custom_remove_woo_checkout_fields( $fields ) {

    // remove billing fields
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_phone']);
    
    // remove order comment fields
    unset($fields['order']['order_comments']);
    
    return $fields;
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

add_filter( 'woocommerce_min_password_strength', 'reduce_min_strength_password_requirement' );
function reduce_min_strength_password_requirement( $strength ) {
    // 3 => Strong (default) | 2 => Medium | 1 => Weak | 0 => Very Weak (anything).
    return 1; 
}

add_action( 'woocommerce_after_shop_loop_item_title', 'wc_add_short_description' );

function wc_add_short_description() {
    global $product; ?>
    <div class="product-excerpt"><?php echo apply_filters( 'woocommerce_short_description', $product->post-> post_excerpt ); ?> </div></div>  <?php
}

add_action( 'woocommerce_before_shop_loop_item_title', 'wc_add_short_div' );

function wc_add_short_div() {
    global $product; ?> 
    <div class="product-info">
<?php }

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );          // Remove the description tab
    unset( $tabs['additional_information'] );   // Remove the additional information tab

    return $tabs;
}

function change_backorder_message( $text, $product ){
    if ( $product->is_on_backorder( 1 ) ) {
        $text = __( 'This product is currently on preorder. Place your order before 5/21/21 for the one-time preorder price! Customers that preordered will be sent a download link on 5/21/21.', 'your-textdomain' );
    }
    return $text;
}
add_filter( 'woocommerce_get_availability_text', 'change_backorder_message', 10, 2 );

function wpb_custom_new_menu() {
  register_nav_menu('toolbar-menu',__( 'header-toolbar-menu' ));
  register_nav_menu('shop-menu',__( 'shop-menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );

// Change default WordPress email address
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name');
 
function new_mail_from($old) {
return 'wizards@arcaneeye.com';
}
function new_mail_from_name($old) {
return 'Arcane Eye';
}

function wpse_282694_body_class( $classes ) {
    if ( is_single() ) {
        $author = get_the_author();
        $authorClass = preg_replace('/\W+/','',strtolower(strip_tags($author)));
        $classes[] = $authorClass;
    }

    return $classes;
}
add_filter( 'body_class', 'wpse_282694_body_class' );

function understrap_all_excerpts_get_more_link( $post_excerpt ) {

        return $post_excerpt . '';
    }
add_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

// Disable WordPress Lazy Load
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

//Remove Gutenberg Block Library CSS and SVG filters from loading on the frontend
function smartwp_remove_wp_block_library_css(){
 wp_dequeue_style( 'wp-block-library' );
 wp_dequeue_style( 'wp-block-library-theme' );
 wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

function remove_global_styles_and_svg_filters() {
	remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
	remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );
}
add_action('init', 'remove_global_styles_and_svg_filters');


