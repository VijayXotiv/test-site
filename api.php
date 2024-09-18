/* APIs start from here */

// Modify REST API response for videos
function modify_video_rest_response($data, $post, $request) {
    // Additional modifications to $data if needed
    return $data;
}
add_filter('rest_prepare_video', 'modify_video_rest_response', 10, 3);

// Register Custom REST API Endpoint for listing videos
function register_list_video_rest_endpoint() {
    register_rest_route( 'elementor/v1', '/videos', array(
        'methods'  => 'GET',
        'callback' => 'list_video_callback',
    ));
}
add_action( 'rest_api_init', 'register_list_video_rest_endpoint' );

// Callback function for listing videos - GET API
function list_video_callback( $data ) {
	//if ( !current_user_can( 'publish_posts' ) ) {
	//	return rest_ensure_response( array( 'error' => 'You do not have permission to list posts' ), 403 );
    //}
    $args = array(
        'post_type' => 'video', // Specify the custom post type 'video'
        'posts_per_page' => -1,
    );

    $videos_query = new WP_Query( $args );
    $videos = $videos_query->posts;
    $response_data = array();

    foreach ( $videos as $video ) {
		/* added for list category   */
			$postid = $video->ID;
			$cur_terms = get_the_terms( $postid, 'categories' );
			$gcat = array();
			foreach( $cur_terms as $cur_term ){
				$gcat[] = $cur_term->name;
			}
		/* end list category */
        $response_data[] = array(
            'id' => $video->ID,
            'title' => $video->post_title,
            'content' => $video->post_content,
            'custom_fields' => get_post_meta( $video->ID ), // Get all custom fields
			'video' => $video,
			//'tags' => wp_get_post_tags( $video->ID, array( 'fields' => 'names' )),
			//'categories' => get_terms( $video->ID, 'categories', array( 'fields' => 'names' ) ),
			'category_group' => $gcat,
        );
    }
    return rest_ensure_response( $response_data );
}
// end GET API

// Register Custom REST API Endpoint for adding a new video
function register_add_video_rest_endpoint() {
    register_rest_route( 'elementor/v1', '/videos', array(
        'methods'  => 'POST',
        'callback' => 'add_video_callback',
    ));
}
add_action( 'rest_api_init', 'register_add_video_rest_endpoint' );

// Callback function for adding a new video
function add_video_callback( $data ) {
	if ( !current_user_can( 'publish_posts' ) ) {
        return rest_ensure_response( array( 'error' => 'You do not have permission to create posts' ), 403 );
    }
    $title = $data['title']; // Assuming 'title' is passed in the request
    $content = $data['content']; // Assuming 'content' is passed in the request
    $custom_fields = $data['custom_fields']; // Assuming 'custom_fields' is passed in the request
	$featured_image_url = $data['featured_image_url']; // Assuming 'featured_image_url' is passed in the request
    $author_id = $data['author_id']; // Assuming 'author_id' is passed in the request
	$post_excerpt = $data['post_excerpt'];
	$comment_status = $data['comment_status'];
	$tags = $data['tags']; // Assuming 'tags' is passed in the request
	$categories = $data['categories']; // Assuming 'categories' is passed in the request

	


    // Create the new video post
    $new_video = array(
        'post_title'   => $title,
        'post_content' => $content,
        'post_status'  => 'publish',
        'post_type'    => 'video',
        'post_author'  => $author_id,
		'post_excerpt' => $post_excerpt,
		'comment_status' => $comment_status,
    );

    // Insert the new video post
    $video_id = wp_insert_post( $new_video, true );

    if ( is_wp_error( $video_id ) ) {
        return rest_ensure_response( array( 'error' => $video_id->get_error_message() ), 400 );
    }

    // Save custom fields
    foreach ( $custom_fields as $key => $value ) {
        update_post_meta( $video_id, $key, $value );
    }
	// Set featured image
    if ( !empty( $featured_image_url ) ) {
        $image_id = media_sideload_image( $featured_image_url, $video_id, '', 'id' );
        if ( !is_wp_error( $image_id ) ) {
            set_post_thumbnail( $video_id, $image_id );
        }
    }
	
	  // Set video tags
    if ( !empty( $tags ) ) {
        wp_set_post_tags( $video_id, $tags, false );
    }

    // Set video categories
    if ( !empty( $categories ) ) {
        wp_set_post_categories( $video_id, $categories );
    }


    return rest_ensure_response( array( 'message' => 'Video added successfully', 'video_id' => $video_id ), 200 );
}