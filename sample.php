/* Start Custom Editor */
add_action("admin_init", "gh_video_description");
add_action('save_post', 'save_gh_video_subdescription');
function gh_video_description(){
	add_meta_box("sub_description", "Video Description", "meta_function", "video");
}
function meta_function(){
	global $post;
	$custom = get_post_custom($post->ID);
	$sub_description = $custom["sub_description"][0];
	wp_editor( $sub_description, 'gh_video_description', $settings = array('textarea_name'=>'sub_description','dfw'=>true) );
}
function save_gh_video_subdescription(){
	global $post;
	update_post_meta($post->ID, "sub_description", $_POST["sub_description"]);
}
/* End Custom Editor */

$cpt_content = get_post_meta( $postid, 'sub_description', true );
$cpt_content = htmlspecialchars_decode($cpt_content);
$cpt_content = wpautop( $cpt_content );

Shannon Noack
suman@smbteam.com(Gmail)
Smb@1234
suman@smbteam (flywheel)
58h@!uQS4IfcritD
sumananckr(flywheel)
KquRG10a&5$4pdN2

// search within same web page 
<script src="https://www.w3schools.com/lib/w3.js"></script>
<input oninput="w3.filterHTML('#id01', 'li', this.value)" placeholder="Search for names..">
<ul id="id01">
   <li>Some text to search</li>
   <li>Some other text to search</li>
</ul>




<script>
jQuery(document).ready(function(){
	// Set the display property of the element to none using CSS
	jQuery(".uagb-block-7d730ce6, .uagb-block-048a4efe").css("display", "none");
	// Remove the display property after the page loads using jQuery's $(document).ready() function
	jQuery(".uagb-block-064f71f7, .uagb-block-68fdc84c").css("display", "block");
	// Toggle Start for both Tab
	jQuery(".criminal-tab").click(function(){
		jQuery(".uagb-block-064f71f7, .uagb-block-68fdc84c").css("display", "none");
		jQuery(".uagb-block-7d730ce6, .uagb-block-048a4efe").css("display", "block");
	});
	jQuery(".family-tab").click(function(){
		jQuery(".uagb-block-064f71f7, .uagb-block-68fdc84c").css("display", "block");
		jQuery(".uagb-block-7d730ce6, .uagb-block-048a4efe").css("display", "none");
	});
});
</script>










//create a shortcode for embed iframe map
function show_embd_ifrm() {
$embdMap = '<iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90325.41865416842!2d-93.41736439617148!3d44.970712427932206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52b333909377bbbd%3A0x939fc9842f7aee07!2sMinneapolis%2C%20MN%2C%20USA!5e0!3m2!1sen!2sin!4v1708928171041!5m2!1sen!2sin" width="100%" height="100%" allowfullscreen=""></iframe>';
return $embdMap;
}
add_shortcode('disp_ifrm_map', 'show_embd_ifrm');