<?php
// Add image upload field to user profile page
function custom_user_profile_fields($user) {
    ?>
     <table class="form-table">
        <tr>
            <th>
                <label for="profile_picture"><?php _e('Team Room Right Sidebar Widgets for Single Image', 'teamrooms_vdo_image'); ?></label>
            </th>
            <td>
                <?php
                $profile_picture = get_the_author_meta('profile_picture', $user->ID);
                ?>
                <input type="text" name="profile_picture" id="profile_picture" value="<?php echo esc_url($profile_picture); ?>" class="regular-text" />
                <input type="button" class="button button-secondary" id="upload_profile_picture_button" value="<?php _e('Upload Image Here', 'teamrooms_vdo_image'); ?>" />
                <p class="description"><?php _e('Upload Image Here', 'teamrooms_vdo_image'); ?></p>
            </td>
        </tr>
    </table>
    <?php
}
add_action('show_user_profile', 'custom_user_profile_fields');
add_action('edit_user_profile', 'custom_user_profile_fields');

// toggle menu
jQuery(document).ready(function($) {
    // Toggle submenu on click
    $('.menu-item-has-children > .menu-link').click(function(e) {
        e.preventDefault();
        var $submenu = $(this).siblings('.sub-menu');
		$submenu.addClass("submenu-open");
        // Toggle the submenu
        //$submenu.toggleClass('submenu-open');
    });
    // Close submenu when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.menu-item-has-children').length) {
            $('.sub-menu').removeClass('submenu-open');
        }
    });
});


add_filter('post_updated_messages', 'your_message');
function your_message(){
	global $post;
	echo "<pre>";
	//$post->post_type != 'video'
  	//$post_type_object = get_post_type_object( 'video' );
	print_r(get_post_custom($post_id));
	echo "</pre>";
	//wp_die( $msg );
}

add_filter( 'pre_get_posts', 'exclude_pages_search_when_logged_in' );
function exclude_pages_search_when_logged_in($query) {
    if ( $query->is_search && is_user_logged_in() )
        $query->set( 'post__not_in', array( 1, 2, 3, 4, 5 ) ); 
    return $query;
}
function redir_rigid_title_match() {
  if (is_search()) {
    global $wp_query,$wpdb;
    $s_str = $wp_query->query_vars['s'];
    $m = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE post_title LIKE %s",$s_str));
    if (!empty($m)) {
      wp_safe_redirect(get_permalink($m));
      exit();
    }
  }
}
add_filter('pre_get_posts','redir_rigid_title_match');
//
add_action( 'genesis_header', 'custom_do_header_search_form',6 );
/**
 * Outputs the header search form.
 */
function custom_do_header_search_form() {
    $button = sprintf(
        '<a href="#" role="button" aria-expanded="false" aria-controls="header-search-wrap" class="toggle-header-search close"><span class="screen-reader-text">%s</span><span class="ionicons ion-ios-close-empty"></span></a>',
        __( 'Hide Search', 'genesis-sample' )
    );
	$button ="";

    printf(
        '<div id="header-search-wrap" class="header-search-wrap">%s %s</div>',
        get_search_form( false ),
        $button
    );
}
//
function add_google_site_verification_meta_tag() { 
    echo '<meta name="google-site-verification" content="5cZKsbjtVbA9Nsk1e3urL0nMP5tTs9XzG8sXm5kaKdM" />'; 
} 
add_action( 'wp_head', 'add_google_site_verification_meta_tag' );
//
add_filter( 'pre_get_posts', 'exclude_pages_search_when_logged_in' );
function exclude_pages_search_when_logged_in($query) {
    if ( $query->is_search && is_user_logged_in() )
        $query->set( 'post__not_in', array( 322 ) ); 
    return $query;
}

// For Form Validation
add_filter( 'wpcf7_validate_text', 'wpcs_custom_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'wpcs_custom_validation_filter', 10, 2 );
function wpcs_custom_validation_filter( $result, $tag ) {
    $fname = $tag->fname;
    //$lname = $tag->lname;
    $value = isset( $_POST[$fname] )
        ? trim( wp_unslash( strtr( (string) $_POST[$name], "\n", " " ) ) )
        : '';
    if ( 'text' == $tag->basetype ) {
        if ( preg_match('/\d/', $value ) ) {
            $result->invalidate( $tag, 'Sorry... Number exists..' );
            //$result->invalidate( $tag, wpcf7_get_message( 'invalid_wpcs_custom_error' ) );
        }
    }
    return $result;
}

// our function will be called for all text and text* input fields
add_filter( 'wpcf7_validate_text', 'wpcs4948_validation_func', 10, 2 );
add_filter( 'wpcf7_validate_text*', 'wpcs4948_validation_func', 10, 2 );
function wpcs4948_validation_func( $result, $tag ) {
  $type = $tag['type'];
  $name = $tag['fname'];

  // check to see if the input field name matches
  if ( 'fname' == $name ) {
     $the_value = $_POST[$name];

    // use a regular expression to compare the value against
    if ( preg_match( '/^\D*$/', $the_value )==0 ) {
        // the value does not match the regular expression
        // invalidate the form submission and display this error message
        $result->invalidate( $tag, "Name must contain only letters." );
      }
   }
return $result;
}


//
function custom_phone_validation($result,$tag){
   $type = $tag['type'];
   $name = $tag['name'];
   if($name == 'phonenumber'){
   $phoneNumber = isset( $_POST['phonenumber'] ) ? trim( $_POST['phonenumber'] ) : '';
   if(strlen($phoneNumber) < 9){
       $result->invalidate( $tag, "phone number is less" );
   }
  }
  return $result;
  }
add_filter('wpcf7_validate_tel','custom_phone_validation', 10, 2);
add_filter('wpcf7_validate_tel*', 'custom_phone_validation', 10, 2);


//validate the first/last name field, only for text
function custom_txtField_validation($result,$tag){
   $type = $tag['type'];
   $name = $tag['name'];
   if($name == 'fname'){
   		$fnamValidat = isset( $_POST['fname'] ) ? trim( $_POST['fname'] ) : '';
		if ( preg_match('~^[\p{L}\p{Z}]+$~u', $fnamValidat ) ) {
            $result_fnam->invalidate( $fnamValidat, 'This field has an error. Please and try again. Only text accepted!' );
        }
  	}
  	return $result_fnam;
	if($name == 'last-name'){
   		$lastnamValidat = isset( $_POST['last-name'] ) ? trim( $_POST['last-name'] ) : '';
		if ( preg_match('~^[\p{L}\p{Z}]+$~u', $lastnamValidat ) ) {
            $result_lnam->invalidate( $lastnamValidat, 'This field has an error. Please and try again. Only text accepted!' );
        }
  	}
  	return $result_lnam;
}
add_filter('wpcf7_validate_text','custom_txtField_validation', 10, 2);
add_filter('wpcf7_validate_text*', 'custom_txtField_validation', 10, 2);


//validate the first/last name field, only for text
add_filter('wpcf7_validate_text','custom_phone_validation', 10, 2);
add_filter('wpcf7_validate_text*', 'custom_phone_validation', 10, 2);
function custom_phone_validation($result,$tag){
   $type = $tag['type'];
   $name = $tag['name'];
   if($name == 'last-name'){
   	$phoneNumber = isset( $_POST['last-name'] ) ? trim( $_POST['last-name'] ) : '';
	   if(strlen($phoneNumber) < 9){
		   $result->invalidate( $phoneNumber, "phone number is less" );
	   }
		if ( preg_match('~^[\p{L}\p{Z}]+$~u', $phoneNumber ) ) {
            $result->invalidate( $phoneNumber, 'Sorry... Number exists..' );
            $result->invalidate( $phoneNumber, wpcf7_get_message( 'invalid_wpcs_custom_error' ) );
        }
  }
  return $result;
 }


//validate the first/last name field, only for text
function custom_phone_validation($result,$tag){
   $type = $tag['type'];
   $name = $tag['name'];
   if($name == 'fname'){
   		$phoneNumber = isset( $_POST['fname'] ) ? trim( $_POST['fname'] ) : '';
	    if(strlen($phoneNumber) < 9){
		   $result->invalidate( $tag, "string is less than 9" );
	    }
		if(preg_match('~[0-9]+~', $phoneNumber)){
		$result->invalidate( $tag, "number found" );
		}
  }
  return $result;
  }
add_filter('wpcf7_validate_text','custom_phone_validation', 10, 2);
add_filter('wpcf7_validate_text*', 'custom_phone_validation', 10, 2);


//validate the first/last name field, only for text
function custom_phone_validation($result,$tag){
   $type = $tag['type'];
   $name = $tag['name'];
   if($name == 'fname'){
   		$phoneNumber = isset( $_POST['fname'] ) ? trim( $_POST['fname'] ) : '';
		if(preg_match('~[0-9]+~', $phoneNumber)){
		   $result->invalidate( $tag, "This field has an error, Please try again. Number not accepted!" );
	    }
   }
	if($name == 'last-name'){
   		$phoneNumber = isset( $_POST['last-name'] ) ? trim( $_POST['last-name'] ) : '';
		if(preg_match('~[0-9]+~', $phoneNumber)){
		   $result->invalidate( $tag, "This field has an error, Please try again. Number not accepted!" );
	    }
   }
  return $result;
}
add_filter('wpcf7_validate_text','custom_phone_validation', 10, 2);
add_filter('wpcf7_validate_text*', 'custom_phone_validation', 10, 2);

/* Added in 24th may - 24 */
// Remove existing filter
remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );

// Function to maintain capitalization in slugs
function maintain_capitalization_slug($title, $raw_title, $context) {
// Apply only when saving slugs
if ($context === 'save') {
// Preserve capitalization and replace special characters with hyphens
$title = preg_replace('/[^a-zA-Z0-9]+/', '-', $raw_title); // Replace non-alphanumeric characters with hyphens
$title = trim($title, '-'); // Trim leading/trailing hyphens
}
return $title;
}

// Apply the custom function to 'sanitize_title'
add_filter('sanitize_title', 'maintain_capitalization_slug', 10, 3);









///////////////////////

https://support.weglot.com/article/123-wordpress---how-to-exclude-from-translation-all-pages-except-specific-ones

^(?!\/personal-injury\/).*

<script>document.write(new Date().getFullYear());</script>

// for color change above map on blog/trucking-accidents/
	//if (span.textContent == 'Truck Accidents in 2022') {span.style.color = 'white';}
	//$("span").filter(function() { return ($(this).text() === 'Truck Accidents in 2022'); alert('hello'); });
	//if($('span').text().length == 0){console.log('No Text');}
function chng_map_function()
{
    ?>
    <script type="text/javascript">
		//var getspntxt = $('.block-headline span').text();
        function codeAddress() {
            //alert('ok');
			$(document).ready(function () {
				$.each($(".block-headline").find("span"), function () {
					if ($(this).text() >1) {
						$(this).css("color", "red")
					}
					if ($(this).text() < 1) {
						$(this).css("color", "white")
					}
				});
			});
        }
        window.onload = codeAddress;
    </script>
    <?php
}
add_action('wp_head', 'your_function');
<?php do_shortcode('[wpml_language_switcher type="post_translations" flags=1 native=1 translated=0][/wpml_language_switcher]');?>


post-id="<?php echo $video_post_id; ?>" post-uid="<?php echo $post_uid; ?>" loggedin-uid="<?php echo $current_user_id; ?>" role="<?php echo $getUserrole; ?>"