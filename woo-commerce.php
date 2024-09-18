<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

/*add_action( 'wp_enqueue_scripts', 'new_stylesheet_view' );
function new_stylesheet_view() {

	wp_enqueue_style( 'new-stylesheet-view', get_bloginfo( 'stylesheet_directory' ) . '/dyn-style.php', array(), CHILD_THEME_VERSION );
	
}*/

//* Enqueue Responsive Menu Script
add_action( 'wp_enqueue_scripts', 'outreach_enqueue_responsive_script' );
function outreach_enqueue_responsive_script() {

	wp_enqueue_script( 'outreach-responsive-menu', get_bloginfo( 'stylesheet_directory' ) . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0' );
	wp_enqueue_script( 'fruit-slide-js', get_bloginfo( 'stylesheet_directory' ) . '/js/fruit-slide.js', array( 'jquery' ), '1.0.0' );

}

//* Add new image sizes
add_image_size( 'home-top', 1140, 460, true );
add_image_size( 'home-bottom', 285, 160, true );
/*add_image_size( 'home-bottom-curve-hub', 377, 275, true );*/
add_image_size( 'home-bottom-curve-hub', 356, 259, true );
add_image_size( 'sidebar', 300, 150, true );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'height'          => 418,
	'width'           => 476,
) );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for additional color style options
add_theme_support( 'genesis-style-selector', array(
	'outreach-pro-blue' 	=>	__( 'Outreach Pro Blue', 'outreach' ),
	'outreach-pro-orange' 	=> 	__( 'Outreach Pro Orange', 'outreach' ),
	'outreach-pro-purple' 	=> 	__( 'Outreach Pro Purple', 'outreach' ),
	'outreach-pro-red' 	=> 	__( 'Outreach Pro Red', 'outreach' ),
) );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer',
) );

//* Add support for 4-column footer widgets
add_theme_support( 'genesis-footer-widgets', 0 );

//* Set Genesis Responsive Slider defaults
add_filter( 'genesis_responsive_slider_settings_defaults', 'outreach_responsive_slider_defaults' );
function outreach_responsive_slider_defaults( $defaults ) {

	$args = array(
		'location_horizontal'             => 'Left',
		'location_vertical'               => 'bottom',
		'posts_num'                       => '4',
		'slideshow_excerpt_content_limit' => '100',
		'slideshow_excerpt_content'       => 'full',
		'slideshow_excerpt_width'         => '35',
		'slideshow_height'                => '460',
		'slideshow_more_text'             => __( 'Continue Reading', 'outreach' ),
		'slideshow_title_show'            => 1,
		'slideshow_width'                 => '1140',
	);

	$args = wp_parse_args( $args, $defaults );
	
	return $args;
}

//* Hook after post widget after the entry content
add_action( 'genesis_after_entry', 'outreach_after_entry', 5 );
function outreach_after_entry() {

	if ( is_singular( 'post' ) )
		genesis_widget_area( 'after-entry', array(
			'before' => '<div class="after-entry widget-area">',
			'after'  => '</div>',
		) );

}

//* Modify the size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'outreach_author_box_gravatar_size' );
function outreach_author_box_gravatar_size( $size ) {

    return '80';
    
}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'mpp_remove_comment_form_allowed_tags' );
function mpp_remove_comment_form_allowed_tags( $defaults ) {
	
	$defaults['comment_notes_after'] = '';
	return $defaults;

}

//* Add the sub footer section
add_action( 'genesis_before_footer', 'outreach_sub_footer', 5 );
function outreach_sub_footer() {

	if ( is_active_sidebar( 'sub-footer-left' ) || is_active_sidebar( 'sub-footer-right' ) ) {
		echo '<div id="section-7" class="sub-footer"><div class="wrap">';
		
		   genesis_widget_area( 'sub-footer-left', array(
		       'before' => '<div class="sub-footer-left">',
		       'after'  => '</div>',
		   ) );
	
		   genesis_widget_area( 'sub-footer-right', array(
		       'before' => '<div class="sub-footer-right">',
		       'after'  => '</div>',
		   ) );
	
		echo '</div><!-- end .wrap --></div><!-- end .sub-footer -->';	
	}
	
}

//* Add the Instagram footer
add_action( 'genesis_before_footer', 'outreach_insta_footer', 6 );
function outreach_insta_footer() {

	if ( is_active_sidebar( 'instagram-footer' ) ) {
		echo '<div id="instagram-footer">';
		
		   genesis_widget_area( 'instagram-footer', array(
		       'before_widget' => '<div class="insta-inside">',
		       'after_widget'  => '</div>',
        'before_title' => '<h4><a href="https://instagram.com/heirloomdc" target="_blank">',
        'after_title' => '</a></h4>',
		   ) );
	
		echo '</div><!-- end instagram-footer -->';	
	}
	
}

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'home-top',
	'name'        => __( 'Home - Top', 'outreach' ),
	'description' => __( 'This is the top section of the Home page.', 'outreach' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-1',
	'name'        => __( 'Home - 1', 'outreach' ),
	'description' => __( 'This is the bottom section of the Home page.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'home-2',
	'name'        => __( 'Home - 2', 'outreach' ),
	'description' => __( 'This is the bottom section of the Home page.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'home-3',
	'name'        => __( 'Home - 3', 'outreach' ),
	'description' => __( 'This is the bottom section of the Home page.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'home-4',
	'name'        => __( 'Home - 4', 'outreach' ),
	'description' => __( 'This is the bottom section of the Home page.', 'outreach' ),
) );
genesis_register_sidebar( array(
	'id'          => 'home-new-snapshots',
	'name'        => __( 'Home - New Snapshots', 'outreach' ),
	'description' => __( 'This is the bottom section of the Home page.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'home-5',
	'name'        => __( 'Home - 5', 'outreach' ),
	'description' => __( 'This is the bottom section of the Home page.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'home-6',
	'name'        => __( 'Home - 6', 'outreach' ),
	'description' => __( 'This is the bottom section of the Home page.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'home-7',
	'name'        => __( 'Home - Press', 'outreach' ),
	'description' => __( 'This is the bottom section of the Home page.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'after-entry',
	'name'        => __( 'After Entry', 'outreach' ),
	'description' => __( 'This is the after entry widget area.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'sub-footer-left',
	'name'        => __( 'Sub Footer - Left', 'outreach' ),
	'description' => __( 'This is the left section of the sub footer.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'instagram-footer',
	'name'        => __( 'Instagram Footer', 'outreach' ),
	'description' => __( 'This is the Instagram footer.', 'outreach' ),
) );

genesis_register_sidebar( array(
	'id'          => 'bottom-footer',
	'name'        => __( 'Bottom Footer', 'outreach' ),
	'description' => __( 'This is the bottom footer.', 'outreach' ),
) );

/*genesis_register_sidebar( array(
	'id'          => 'sub-footer-right',
	'name'        => __( 'Sub Footer - Right', 'outreach' ),
	'description' => __( 'This is the right section of the sub footer.', 'outreach' ),
) );*/

function add_custom_logo(){
	echo '<a href="'.network_site_url('/').'" id="logo"><img src="'.get_stylesheet_directory_uri().'/images/logo3.png"></a>';	
}
add_action('genesis_site_title','add_custom_logo');


//* Add outreach-page body class
/*add_filter( 'body_class', 'custom_body_class' );
function custom_body_class( $classes ) {
	
	$value = get_field('show_hide_title');

	$classes[] = $value[0];
	return $classes;
	
}*/

add_action('genesis_before_footer','bottom_widgets',3);
function bottom_widgets() {
	if(!is_front_page()){
		genesis_widget_area( 'home-1', array(
			'before' => '<div class="home-1 widget-area"><div class="wrap">',
			'after'  => '</div></div>',
		) );
	}
}

// Add bottom fruit pattern on subpages
add_action('genesis_before_footer','bottom_fruit_pattern',0);
function bottom_fruit_pattern() {
	if(!is_front_page()){ ?>
		<div class="new-fruit-pattern"></div>
	<?php }
}

add_action('genesis_footer','anchor_scroll');
function anchor_scroll(){
	if(is_front_page()){
	?>
    <script>
    	jQuery(document).ready(function($){
			$('a[href^="#"]').on('click',function (e) {
				e.preventDefault();
				
				var target = this.hash,
				$target = $(target);
			
				$('html, body').stop().animate({
					'scrollTop': $target.offset().top-100
				}, 800, 'swing', function () {
					//window.location.hash = target;
				});
			});
		});
    </script>
    <?php
	}else{
	?>
	<script>
		jQuery(document).ready(function($){
			$('.menu-item a[href*="#"]').click(function(e){
				e.preventDefault();
				target = jQuery(this).attr('href');
				window.location='<?php echo network_site_url();?>/'+target;
			});
		});
    </script>
	<?php
	}
	?>
    <script>
    	jQuery(window).scroll(function(){
			var scrolltop = jQuery(window).scrollTop();
			if(scrolltop>jQuery('.site-header').height()){
				jQuery('.nav-primary').addClass('fixed');
			}else{
				jQuery('.nav-primary').removeClass('fixed');	
			}
		});
		jQuery(document).ready(function($){
			$('.menu-item').click(function(){
				if($(window).width()<=600){
					$('.genesis-nav-menu').slideUp();
				}
			});
			
		});
    </script>
    <?php
	
}

function override_tinymce_option($initArray) {
    $opts = '*[*]';
    $initArray['valid_elements'] = $opts;
    $initArray['extended_valid_elements'] = $opts;
    return $initArray;
}
add_filter('tiny_mce_before_init', 'override_tinymce_option');

function testimonial_excerpt($more) {
	global $post;
	if ($post->post_type == 'testimonial') {
		return '...<br /><a href="https://www.heirloomdc.com/about-us/reviews/" class="testimonial-rotator-view-more">View Full</a>';
	}
}
add_filter('excerpt_more', 'testimonial_excerpt');


// remove wp version number from scripts and styles
function remove_css_js_version( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_css_js_version', 9999 );
add_filter( 'script_loader_src', 'remove_css_js_version', 9999 );

//* Customize the entire footer
remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'sp_custom_footer' );
function sp_custom_footer() {
	
		 if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Footer') ) : endif; 
}

// Remove the category count for WooCommerce categories
add_filter( 'woocommerce_subcategory_count_html', '__return_null' );

// Remove the single product page link
remove_action( 
  'woocommerce_before_shop_loop_item',
  'woocommerce_template_loop_product_link_open',
  10
);
remove_action(
  'woocommerce_after_shop_loop_item',
  'woocommerce_template_loop_product_link_close',
  5
);

// Show product description on main category page 
add_action( 'woocommerce_after_shop_loop_item', 'woo_show_excerpt_shop_page', 0 );
function woo_show_excerpt_shop_page() {
    global $product;
	
	echo '<p>';
    echo $product->post->post_excerpt;
    echo '</p>';
}


/**
 * Add quantity field on the archive page.
 */
function sp_quantity_field_archive() {
	$product = wc_get_product( get_the_ID() );

	// This will show only for simple products since variable products require attributes to be selected before
	// being added to the cart.
	if ( ! $product->is_sold_individually() && 'variable' != $product->get_type() && $product->is_purchasable() ) {
		woocommerce_quantity_input(
			array(
				'min_value' => 1,
				'max_value' => $product->backorders_allowed() ? '' : $product->get_stock_quantity(),
			)
		);
	}

}
add_action( 'woocommerce_after_shop_loop_item', 'sp_quantity_field_archive', 0, 9 );

/**
 * Add javascript needed for the quantity fields to work.
 */
function sp_add_to_cart_quantity_handler() {
	wc_enqueue_js(
		'
		jQuery( ".post-type-archive-product" ).on( "click", ".quantity input", function() {
			return false;
		});
		jQuery( ".post-type-archive-product" ).on( "change input", ".quantity .qty", function() {
			var add_to_cart_button = jQuery( this ).parents( ".product" ).find( ".add_to_cart_button" );
			// For AJAX add-to-cart actions
			add_to_cart_button.attr( "data-quantity", jQuery( this ).val() );
			// For non-AJAX add-to-cart actions
			add_to_cart_button.attr( "href", "?add-to-cart=" + add_to_cart_button.attr( "data-product_id" ) + "&quantity=" + jQuery( this ).val() );
		});
	'
	);

}
add_action( 'init', 'sp_add_to_cart_quantity_handler' );

// Add heading to checkout for add-on's
function filter_woocommerce_form_field_radio( $field, $key, $args, $value ) {
    // Based on key
    if ( $key == 'radio_choice' ) {
        if ( ! empty( $args['options'] ) ) {
            
            $field = '<div><h3>Heading</h3><ul>';
            
            foreach ( $args['options'] as $option_key => $option_text ) {
                $field .= '<li>';
                $field .= '<input type="radio" value="' . esc_attr( $option_key ) . '" name="' . esc_attr( $key ) . '" id="' . esc_attr( $args['id'] ) . '_' . esc_attr( $option_key ) . '" />';
                $field .= '<label>' . esc_html( $option_text ) . '</label>';
                $field .= '</li>';
            }
            
            $field .= '</ul></div>';
        }
    }
    
    return $field;
}
add_filter( 'woocommerce_form_field_radio', 'filter_woocommerce_form_field_radio', 10, 4 );


//add_action('woocommerce_add_to_cart_validation', 'max_5_items_for_samples', 20, 3 );

// function max_5_items_for_samples( $passed, $product_id, $quantity ) {
//     // HERE define your product category ID, slug, or name.
//     $category = 'artisan-platters';
//     $limit = 5; // HERE set your limit
//     $count = 1;

//     // Loop through cart items checking for specific product categories
//     foreach ( WC()->cart->get_cart() as $cat_item ) {
//         if( has_term( $category, 'product_cat', $cat_item['product_id'] ) )
//             $count++;
//     }

//     if( has_term( $category, 'product_cat', $product_id ) && $count == $limit )
//         $count++;

//     // Total item count for the defined product category is more than 5
//     if( $count > $limit ){
//         // HERE set the text for the custom notice
//         $notice = __('Sorry, you can not add to cart more than 5 items in the "artisan-platters" category.', 'woocommerce');
//         // Display a custom notice
//         wc_add_notice( $notice, 'error' );
//         // Avoid adding to cart
//         $passed = false;
//     }

//     return $passed;
// }


///  Minimum Quanity Desset category 12
add_action('woocommerce_check_cart_items', 'wc_min_item_desert_qty');

function wc_min_item_desert_qty() {
    $category_slug = 'dessert-bites';
    $min_qty = 5;

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if (has_term($category_slug, 'product_cat', $cart_item['product_id']) && $cart_item['quantity'] < $min_qty) {
            // Set the quantity to the minimum allowed
            WC()->cart->set_quantity($cart_item_key, $min_qty);

            // Display an error message
            $product_name = get_the_title($cart_item['product_id']);
            $error_message = sprintf(__('The minimum quantity for %s is %d.', 'woocommerce'), $product_name, $min_qty);
            wc_add_notice($error_message, 'error');
        }
    }
}

add_filter('woocommerce_loop_add_to_cart_link', 'remove_quantity_input_from_specific_category', 10, 2);

function remove_quantity_input_from_specific_category($html, $product) {
    // Define the specific category slug where you want to remove the quantity input
    $target_category = array('level-up-hors-doeuvres', 'signature-hors-doeuvres','dessert-bites');

    // Check if it's the product category page and the product belongs to the specific category
    if (is_product_category() && has_term($target_category, 'product_cat', $product->get_id())) {
        echo '<style>.woocommerce .quantity { display:none !important; }</style>';
    }

    return $html;
}

// add_action('woocommerce_check_cart_items', 'wc_min_item_level_and_sign_qty');

// function wc_min_item_level_and_sign_qty() {
//     $category_slugs = array('level-up-hors-doeuvres', 'signature-hors-doeuvres');
//     $min_qty = 18;

//     foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
//         // Check if the product belongs to any of the specific categories
//         if (has_term($category_slugs, 'product_cat', $cart_item['product_id']) && $cart_item['quantity'] < $min_qty) {
//             // Set the quantity to the minimum allowed
//             WC()->cart->set_quantity($cart_item_key, $min_qty);

//             // Display an error message
//             $product_name = get_the_title($cart_item['product_id']);
//             $error_message = sprintf(__('The minimum quantity for %s is %d.', 'woocommerce'), $product_name, $min_qty);
//             wc_add_notice($error_message, 'error');
//         }
//     }
// }

/// Max Products Hooks Dessert Category 5

// add_action('woocommerce_add_to_cart_validation', 'max_5_items_for_samples', 20, 3 );

// function max_5_items_for_samples( $passed, $product_id, $quantity ) {
//     $category = 'dessert-bites';
//     $limit = 5;
//     $count = 0;
//     foreach ( WC()->cart->get_cart() as $cat_item ) {
//         if( has_term( $category, 'product_cat', $cat_item['product_id'] ) )
//             $count++;
//     }
//     if( has_term( $category, 'product_cat', $product_id ) && $count == $limit )
//         $count++;

//     if( $count > $limit ){
// 		 $notice = __('Sorry, you cannot add more than 5 products to the cart in the "dessert-bites" category. <a class="max_btn" href="/cart">View Cart</a>', 'woocommerce');
//         wc_add_notice( $notice, 'error' );
//         $passed = false;
//     }

//     return $passed;
// }


/// Max Products Hooks Dessert Category 5

add_action('woocommerce_add_to_cart_validation', 'max_5_items', 20, 3 );

function max_5_items( $passed, $product_id, $quantity ) {
    $category = 'dessert-bites';
    $limit = 5;
    $count = 0;
    foreach ( WC()->cart->get_cart() as $cat_item ) {
        if( has_term( $category, 'product_cat', $cat_item['product_id'] ) )
            $count++;
    }
    if( has_term( $category, 'product_cat', $product_id ) && $count == $limit )
        $count++;

    if( $count > $limit ){
		 $notice = __('Sorry, you cannot add more than 5 products to the cart in the "dessert-bites" category. <a class="max_btn" href="/cart">View Cart</a>', 'woocommerce');
        wc_add_notice( $notice, 'error' );
        $passed = false;
    }

    return $passed;
}

// add_filter( 'woocommerce_cart_redirect_after_error', '__return_false' );

// add_filter( 'woocommerce_cart_redirect_after_error', 'wp_kama_woocommerce_cart_redirect_after_error_filter', 10, 2 );


// function wp_kama_woocommerce_cart_redirect_after_error_filter( $permalink, $product_id ){

// $home_url = home_url();
// return $home_url . '/product-category/dessert-bites/';

// }

// add_action('woocommerce_add_notice', 'custom_handle_cart_error', 10, 1);
// function custom_handle_cart_error($error) {
//     // Check if the error is related to adding a product to the cart
//     if (strpos($error, 'Sorry, you cannot add more than 1 product to the cart') !== false) {
//         // Change 'your-category-slug' to the slug of your desired category
//         $category_slug = 'dessert-bites';

//         // Get the URL of the category page
//         $category_url = get_term_link($category_slug, 'product_cat');

//         // If the category URL is valid, redirect to it
//         if ($category_url && !is_wp_error($category_url)) {
//             wp_safe_redirect($category_url);
//             exit;
//         }
//     }
// }

// Uncomment the following line to prevent the default redirect to the cart page
// add_filter('woocommerce_cart_redirect_after_error', '__return_false');




/// Max Products Hooks Multiple Category 8

add_action('woocommerce_add_to_cart_validation', 'max_8_items_for_samples', 20, 3 );

function max_8_items_for_samples( $passed, $product_id, $quantity ) {
    $categories = array('artisan-platters','artisan-protein-platters','level-up-hors-doeuvres','signature-hors-doeuvres');
    $limit = 8; 
    $count = 0;
    foreach ( WC()->cart->get_cart() as $cat_item ) {
        if( has_term( $categories, 'product_cat', $cat_item['product_id'] ) )
            $count++;
    }

    if( has_term( $categories, 'product_cat', $product_id ) && $count == $limit )
        $count++;

    if( $count > $limit ){
        $notice = __('Sorry, you cannot add to cart more than 8 items from Level Up Hors d’Oeuvres, Signature Hors d’Oeuvres, Artisan Platters and Artisan Protein Platters categories. <a class="max_btn" href="/cart">View Cart</a>', 'woocommerce');
        wc_add_notice( $notice, 'error' );
        $passed = false;
    }

    return $passed;
}

// add_action('woocommerce_cart_calculate_fees', 'customize_minimum_cart_total');

// function customize_minimum_cart_total() {
//     $minimum_amount_weekdays = 800;
//     $minimum_amount_sunday = 1500;

//     // Get the current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday).
//     $current_day = date('w');
//     $minimum_amount = ($current_day === '0') ? $minimum_amount_sunday : $minimum_amount_weekdays;
//     $cart_subtotal = WC()->cart->subtotal;

//     // Check if the notice has already been added using a session variable
//     $notice_added = WC()->session->get('minimum_purchase_notice_added');

//     if ($cart_subtotal < $minimum_amount && !$notice_added) {
//         foreach (WC()->cart->get_fees() as $fee_key => $fee) {
//             WC()->cart->remove_fee($fee_key);
//         }
//         wc_add_notice('<strong>' . sprintf(__("A minimum total purchase amount of %s is required to checkout."), wc_price($minimum_amount)) . '</strong>', 'error');

//         // Set the session variable to indicate that the notice has been added
//         WC()->session->set('minimum_purchase_notice_added', true);
//     } elseif ($cart_subtotal >= $minimum_amount && $notice_added) {
//         // Clear notices if the cart subtotal is now above the minimum amount and the notice was added before
//         wc_clear_notices();

//         // Reset the session variable
//         WC()->session->set('minimum_purchase_notice_added', false);
//     }
// }




// add_action( 'woocommerce_checkout_process', 'custom_set_minimum_total_price' );

// function custom_set_minimum_total_price() {
//     // Set the minimum total price
//     $minimum_total_price = 1500;

//     // Get the cart total
//     $cart_total = WC()->cart->get_cart_contents_total();

//     // Check if the cart total is less than the minimum total price
//     if ( $cart_total < $minimum_total_price ) {
//         // Display a notice
//         wc_add_notice( sprintf( 'A minimum total price of $%s is required. Please add more items to your cart.', $minimum_total_price ), 'error' );
//     }
// }

add_action( 'woocommerce_checkout_process', 'custom_set_minimum_total_price_based_on_day' );

function custom_set_minimum_total_price_based_on_day() {
    // Get the selected date from the checkout page (assuming you have a date field with the name 'date_field')
    $selected_date = isset( $_POST['delivery_date'] ) ? sanitize_text_field( $_POST['delivery_date'] ) : '';

    // Set the default minimum total price
    $minimum_total_price = 800;

    // Check if the selected date is a Sunday
    if ( $selected_date ) {
        $day_of_week = date( 'w', strtotime( $selected_date ) );
        if ( $day_of_week == 0 ) { // 0 represents Sunday
            $minimum_total_price = 1500;
        }
    }

    // Get the cart total
    $cart_total = WC()->cart->get_cart_contents_total();

    // Check if the cart total is less than the minimum total price
    if ( $cart_total < $minimum_total_price ) {
        // Display a notice
        wc_add_notice( sprintf( 'A minimum total price of $%s is required. Please add more items to your cart.', $minimum_total_price ), 'error' );
    }
}

add_filter('woocommerce_cart_item_permalink','__return_false');