<?php
/**
 **********************
 *
 * =Theme Support
 *
 **********************
 */
function them_support()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'them_support');

/**
 **********************
 *
 * =Upload Size
 *
 **********************
 */
@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');

/**
 **********************
 *
 * =JQuery In Footer
 *
 **********************
 */
function starter_scripts()
{
  wp_deregister_script('jquery'); //Removes the Script
  wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, null, true); //Include Jquery
  wp_enqueue_script('jquery'); //Adds the Scripts
}

add_action('wp_enqueue_scripts', 'starter_scripts');

/**
 ********************************************
 *
 * =Tweaks, Enqueue Script & Styles
 *
 ********************************************
 */
require_once 'inc/enqueue.php';
require_once 'inc/junk_remove.php';
require_once 'inc/bfi_thumb.php';
require_once 'inc/post-type.php';
require_once 'inc/custom-admin-welcome.php';
require_once 'inc/admin/codestar-framework.php';
require_once 'inc/admin-options.php';


/**
 ***********************************
 *
 * =Menu / Nav Walkers
 *
 ***********************************
 */
require_once 'inc/menu.php';

/**
 ********************************************
 *
 * =Add post thumbnails into RSS feed
 *
 ********************************************
 */
function add_feed_post_thumbnail( $content )
{
  global $post;
  if ( has_post_thumbnail($post->ID) ) {
    $content = get_the_post_thumbnail($post->ID, 'thumbnail') . $content;
  }

  return $content;
}

add_filter('the_excerpt_rss', 'add_feed_post_thumbnail');
add_filter('the_content_feed', 'add_feed_post_thumbnail');

/**
 ********************************************************
 *
 * =Remove width/height HTML attributes from images
 *
 ********************************************************
 */
function remove_image_size_atts( $html )
{
  $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);

  return $html;
}

add_filter('post_thumbnail_html', 'remove_image_size_atts', 10);
add_filter('image_send_to_editor', 'remove_image_size_atts', 10);

/**
 ********************************************
 *
 * =Custom admin footer text
 *
 ********************************************
 */
function custom_admin_footer()
{
}

add_filter('admin_footer_text', 'custom_admin_footer');

/**
 *****************************************************************************
 *
 * =Add support for uploading SVG inside Wordpress Media Uploader
 * define('ALLOW_UNFILTERED_UPLOADS', true); add this in wp-config
 *
 *****************************************************************************
 */
function mime_types( $mimes )
{
  $mimes[ 'svg' ] = 'image/svg+xml';
  $mimes[ 'svgz' ] = 'image/svg+xml';
  $mimes[ 'doc' ] = 'application/msword';
  unset($mimes[ 'exe' ]);

  return $mimes;
}

add_filter('upload_mimes', 'mime_types');

/**
 ********************************************
 *
 * =Slice Crazy Long div Outputs
 *
 ********************************************
 */
function category_id_class( $classes )
{
  global $post;
  foreach ( ( get_the_category($post->ID) ) as $category ) {
    $classes[] = $category->category_nicename;
  }

  return array_slice($classes, 0, 5);
}

add_filter('post_class', 'category_id_class');

/**
 ********************************************
 *
 * =Remove unwated br tag
 *
 ********************************************
 */
remove_filter('the_content', 'wpautop');
$br = false;
add_filter('the_content', function ( $content ) use ( $br ) {
  return wpautop($content, $br);
}, 10);

/**
 *********************************
 *
 * =Remove unwated p tag
 *
 *********************************
 */
remove_filter('term_description', 'wpautop');
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');
add_filter('the_content', 'remove_empty_p', 11);
function remove_empty_p( $content )
{
  $content = force_balance_tags($content);

  return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);

  return preg_replace('#<p></p>#i', '', $content);
}

/**
 *********************************
 *
 * =Custom Body Class
 *
 *********************************
 */
function pine_add_page_slug_body_class( $classes )
{
  global $post;
  if ( isset($post) ) {
    $classes[] = 'page-' . $post->post_name;
  }

  return $classes;
}

add_filter('body_class', 'pine_add_page_slug_body_class');

/**
 *********************************
 *
 * =Global template dir vars
 *
 *********************************
 */

function gdir()
{
  global $gdir;
  $gdir = get_template_directory_uri() . "/dist";
}

// Define it immediately after `init` in a high priority.
add_action('init', 'gdir', 1, 1);

/************************************
 *
 * Add Async or Defer for js
 *
 *************************************/
if ( !is_admin() ) {
  function add_asyncdefer_attribute( $tag, $handle )
  {
    // if the unique handle/name of the registered script has 'async' in it
    if ( strpos($handle, 'async') !== false ) {
      // return the tag with the async attribute
      return str_replace('<script ', '<script async ', $tag);
    } // if the unique handle/name of the registered script has 'defer' in it
    else if ( strpos($handle, 'defer') !== false ) {
      // return the tag with the defer attribute
      return str_replace('<script ', '<script defer ', $tag);
    } // otherwise skip
    else {
      return $tag;
    }
  }

  add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
}
/**
 *********************************
 *
 * =Gets Terms In Array
 *
 *********************************
 */
function getTermsNameInArray( $post_id, $taxonomy )
{
  $terms = get_the_terms($post_id, $taxonomy);

  return !empty($terms) && !is_wp_error($terms) ? wp_list_pluck($terms, 'name') : [];
}

add_filter('wpcf7_autop_or_not', '__return_false');

/**
 ***********************************************************
 *
 * =Converts Category Checkbox to Radio Button
 *
 ***********************************************************
 */
function convert_cats_to_radio(){
  global $post;
  if ( $post->post_type !== 'post' ) // select your desired Post Type
    return;

  ?>
	<script type="text/javascript">
		function makeRadioButtons() {
			jQuery("#categorychecklist input").each(function () {
				this.type = 'radio';
			});
		}

		function newCategoryObserver() {
			// Example from developer.mozilla.org/en-US/docs/Web/API/MutationObserver
			var targetNode = document.getElementById('categorychecklist');
			var config = {attributes: true, childList: true, subtree: true};
			var callback = function (mutationsList) {
				for (var mutation of mutationsList) {
					if (mutation.type === 'childList') {
						makeRadioButtons();
					}
				}
			};
			var observer = new MutationObserver(callback);
			observer.observe(targetNode, config);
		}

		newCategoryObserver();
		makeRadioButtons();
	</script>
  <?php
}
add_action("admin_footer-post.php", 'convert_cats_to_radio');
add_action("admin_footer-post-new.php", 'convert_cats_to_radio');

/**
 *************************************
 *
 * =Load More post return fucntions
 *
 *************************************
 */
function load_more_posts() {
  $paged = $_POST['page'];
	$excluded_category = 6;
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'paged' => $paged,
    'order' => 'ASC',
		'category__not_in' => array($excluded_category),
  );
  $query = new WP_Query($args);

  if($query->have_posts()) :
    while($query->have_posts()) : $query->the_post(); ?>
      <div class="col-lg-4 col-md-6 mb-4 c-mb-20">
				<div class="card blog_cards">
					<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" alt="" loading="lazy">
					<div class="card-body">
						<h5 class="card-title blog_titles"><?php echo get_the_title(); ?></h5>
						<p class="blog_description"><?php echo get_the_excerpt(); ?></p>
						<a href="<?php echo get_the_permalink(); ?>" class="link blog_link">Read More</a>
					</div>
				</div>
			</div>
    <?php endwhile;
    wp_reset_postdata();
  endif;
  die();
}
add_action('wp_ajax_load_more', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more', 'load_more_posts');


/**
 *************************************
 *
 * =Filter For Home page tabs
 *
 *************************************
 */

function filter_posts() {
	$category = isset($_POST['category']) ? $_POST['category'] : '';
  $excluded_category = 6; // Replace with actual "Featured Blog" category ID

  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1, // Show all posts
    'order'          => 'ASC',
		'category__not_in' => array($excluded_category), // Exclude Featured Blog
  );

  if ($category !== 'all' && !empty($category)) {
    $args['cat'] = $category;
  }

  $query = new WP_Query($args);

  if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
			<div class="col-lg-4 col-md-6 mb-4 c-mb-20">
				<div class="card blog_cards">
					<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" alt="" loading="lazy">
					<div class="card-body">
						<h5 class="card-title blog_titles"><?php echo get_the_title(); ?></h5>
						<p class="blog_description"><?php echo get_the_excerpt(); ?></p>
						<a href="<?php echo get_the_permalink(); ?>" class="link blog_link">Read More</a>
					</div>
				</div>
			</div>
    <?php endwhile;
    wp_reset_postdata();
  else :
    echo '<p>No posts found.</p>';
  endif;
  die();
}

add_action('wp_ajax_filter_posts', 'filter_posts');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts');


/**
 *********************************
 *
 * =Author Post type
 *
 *********************************
*/
	function author_fun() {

		$labels = array(
			'name'                  => _x( 'Authors', 'Post Type General Name', 'text_domain' ),
			'singular_name'         => _x( 'Author', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'             => __( 'Authors', 'text_domain' ),
			'name_admin_bar'        => __( 'Author', 'text_domain' ),
			'archives'              => __( 'Author Archives', 'text_domain' ),
			'attributes'            => __( 'Author Attributes', 'text_domain' ),
			'parent_item_colon'     => __( 'Parent Author:', 'text_domain' ),
			'all_items'             => __( 'All Authors', 'text_domain' ),
			'add_new_item'          => __( 'Add New Author', 'text_domain' ),
			'add_new'               => __( 'Add New', 'text_domain' ),
			'new_item'              => __( 'New Author', 'text_domain' ),
			'edit_item'             => __( 'Edit Author', 'text_domain' ),
			'update_item'           => __( 'Update Author', 'text_domain' ),
			'view_item'             => __( 'View Author', 'text_domain' ),
			'view_items'            => __( 'View Authors', 'text_domain' ),
			'search_items'          => __( 'Search Author', 'text_domain' ),
			'not_found'             => __( 'Not found', 'text_domain' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
			'featured_image'        => __( 'Featured Image', 'text_domain' ),
			'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
			'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
			'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
			'insert_into_item'      => __( 'Insert into Author', 'text_domain' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Author', 'text_domain' ),
			'items_list'            => __( 'Authors list', 'text_domain' ),
			'items_list_navigation' => __( 'Authors list navigation', 'text_domain' ),
			'filter_items_list'     => __( 'Filter Authors list', 'text_domain' ),
		);
		$args = array(
			'label'                 => __( 'Author', 'text_domain' ),
			'description'           => __( 'Author Description', 'text_domain' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-superhero',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
		);
		register_post_type( 'authors', $args );

	}
	add_action( 'init', 'author_fun', 0 );


	function acf_download_counter() {
    if (isset($_GET['acf_file'])) {
			$file_url = esc_url_raw($_GET['acf_file']);

			// Create a unique key for each file based on the URL
			$file_key = 'download_count_' . md5($file_url);

			// Get and update the download count
			$count = get_option($file_key, 0);
			update_option($file_key, $count + 1);

			// Redirect to the actual file
			wp_redirect($file_url);
			exit();
    }
	}
	add_action('init', 'acf_download_counter');


	function custom_wpcf7_redirect(){
		if ( have_rows('blog_details') ) {
			while ( have_rows('blog_details') ) {
				the_row();

				if ( get_row_layout() == 'download_with_form' ) {
					$redirect_url = get_sub_field('add_the_download_file'); // Your ACF field

					if ( $redirect_url ) {
					?>
						<script>
							document.addEventListener('wpcf7mailsent', function (event) {
								location.href = '<?php echo esc_url($redirect_url); ?>';
							}, false);
						</script>
					<?php
					}
				}
			}
		}
	}

	add_action('wp_footer', 'custom_wpcf7_redirect');