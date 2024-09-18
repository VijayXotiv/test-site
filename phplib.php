<?php
				$args  = array(
							'posts_per_page'  => 6,
							'offset'          => 0,
							'category'        => 'partner-logos',
							'orderby'         => 'post_date',
							'order'           => 'ASC',
							'post_type'       => 'post',
							'post_status'     => 'publish',
							//'include'         => ,
							//'exclude'         => ,
							//'meta_key'        => ,
							//'meta_value'      => ,
							//'post_mime_type'  => ,
							//'post_parent'     => ,
							//'suppress_filters' => true
						); 
					$posts = get_posts($args);
					foreach ($posts as $post) :
				?>
				<div class="item">
					<img decoding="async" src="<?php echo the_post_thumbnail(array(360,360));?>" class="img-fluid" alt="logo">
						<?php 
							the_permalink();
							echo the_title();
							the_excerpt('more text');
							echo the_post_thumbnail(array(360,360));
							echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day ) );
							printf( __( 'View all posts by %s', 'twentysixteen' ), get_the_author() );
							echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
						?>
					</a>
				</div>
				<?php endforeach; 

// Create meta box for home page template
add_action('add_meta_boxes', 'display_homepage_meta');
function display_homepage_meta() {
  global $post;
    if(!empty($post))
    {
      $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
      if($pageTemplate == 'page-templates/home-page.php' )
          {
            add_meta_box(
              'homepage_meta', // $id
              'Home Page Content Section', // $title
              'display_homepage_information', // $callback
              'page', // $page
              'normal', // $context
              'default' // $priority high
          );
      }
    }
}
function display_homepage_information($post) {
    wp_nonce_field('meta_fields_save_meta_box_data', 'meta_fields_meta_box_nonce');
    $homepage_section1 = get_post_meta($post->ID, '_meta_fields_homepage_section1', true);
    $url_homepage_section1 = get_post_meta($post->ID, '_meta_fields_url_homepage_section1', true);
    $homepage_section2 = get_post_meta($post->ID, '_meta_fields_homepage_section2', true);
    $url_homepage_section2 = get_post_meta($post->ID, '_meta_fields_url_homepage_section2', true);
    ?>
    <div class="homepage-inside">
        <p><strong>Home Page Section 1: Content</strong></p>
        <p><textarea rows="4" cols="100" id="meta_fields_homepage_section1" name="meta_fields_homepage_section1"><?php echo esc_html($homepage_section1); ?></textarea></p>
        <p><strong>Home Page Section 1: Url</strong></p>
        <p><input type="text" id="meta_fields_url_homepage_section1" name="meta_fields_url_homepage_section1" value="<?php echo esc_html($url_homepage_section1); ?>" /></p>
        <p><strong>Home Page Section 2: Content</strong></p>
        <p><textarea rows="4" cols="100" id="meta_fields_homepage_section2" name="meta_fields_homepage_section2"><?php echo esc_html($homepage_section2); ?></textarea></p>
        <p><strong>Home Page Section 2: Url</strong></p>
        <p><input type="text" id="meta_fields_url_homepage_section2" name="meta_fields_url_homepage_section2" value="<?php echo esc_html($url_homepage_section2); ?>" /></p>
    </div>
    <?php
}
// save metadata
function meta_fields_save_meta_box_data($post_id) {
    if (!isset($_POST['meta_fields_meta_box_nonce']) || !wp_verify_nonce($_POST['meta_fields_meta_box_nonce'], 'meta_fields_save_meta_box_data')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Add all custom fields here
    $fields = array(
        'meta_fields_homepage_section1',
        'meta_fields_url_homepage_section1',
        'meta_fields_homepage_section2',
        'meta_fields_url_homepage_section2'
    );
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            $value = sanitize_text_field($_POST[$field]);
            update_post_meta($post_id, '_' . $field, $value);
        }
    }
}
add_action('save_post', 'meta_fields_save_meta_box_data');
------------------------------------------------------------------

add_action( 'add_meta_boxes', 'post_note_meta_box_add' );
function post_note_meta_box_add()
{	
	// Add new meta box
	add_meta_box( '_post_note', 'Notes', 'render_post_note_meta_box', 'post', 'normal', 'default' );
}

function render_post_note_meta_box()
{
	global $post;
	// Get saved meta data
	$post_note_meta_content = get_post_meta($post->ID, '_post_note', TRUE); 
	if (!$post_note_meta_content) $post_note_meta_content = '';
	wp_nonce_field( 'post_note'.$post->ID, 'post_note_nonce');
	// Render editor meta box
	wp_editor( $post_note_meta_content, 'post_note', array('textarea_rows' => '5'));
}
 
add_action( 'save_post', 'post_note_meta_box_save' );
function post_note_meta_box_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	 
	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['post_note_nonce'] ) || !wp_verify_nonce( $_POST['post_note_nonce'], 'post_note'.$post_id ) ) return;
	 
	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;
	
	
	// Make sure our data is set before trying to save it
	if( isset( $_POST['post_note'] ) )
		$result = update_post_meta( $post_id, '_post_note', $_POST['post_note'] );
}

ps-5 
my-5(top padding)
pb-5(bootom-padding
)
py-3(top-bottom-padding)
pe-5(right padding)
mx-0
pe-0(right padding)
pe-md-3 my-5
pt-5 top padding
content-flex sec-bg-cobaltblue my-5

xt-col-4 xt-col-md-12 xt-order-md-1 pe-0 pe-md-3 my-5
xt-col-8 xt-col-md-12 xt-order-md-2 team-inner-section ps-0

[addmenu name="Primary Menu"]

<a class="white-color d-flex align-items-center fw-600 fs-18 fs-lg-12 connect_media" href="#">

line-banner for before after class



<div class="para-heading-2 fs-40 success-color text-center pt-5 latest_headings">Reviews</div>
[trustindex data-widget-id=dceafdd2531395960276c719a60]

div#service-slider .owl-prev, div#blog-slider .owl-prev, div#client-slider .owl-prev{left: -10px;top: 25px;}
div#service-slider .owl-next, div#blog-slider .owl-next, div#client-slider .owl-next{right: -10px;top: 25px;}

p:empty{
	display: none;
}
.ast-article-single a.btn.btn-primary:hover {
    background: var(--clr-primary);
		color: var(--clr-black)!important;
}
.btn-primary:hover {
    background-color: var(--clr-secondary);
    color: var(--clr-white) !important;
    border: 1px solid var(--clr-primary);
}
.entry-content ul.sub-menu li a:hover {
    color: var(--clr-primary) !important;
}

.ast-article-single h1, .ast-article-single h2, .ast-article-single h3 {
    text-transform: capitalize !important;
}
<div class="banner_btn"><a href="#contact-us" class="btn btn-primary uppercase">Get a Free Consultation</a></div>

<i class="fa fa-arrow-right"></i>
<i class="fa fa-arrow-right ps-1 fs-18"></i>