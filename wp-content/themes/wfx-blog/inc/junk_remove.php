<?php 
/**
 * remove really simple discovery link
 */
remove_action('wp_head', 'rsd_link');

/**
 * remove link to index page
 */
remove_action('wp_head', 'index_rel_link');

/**
 * remove random post link
 */
remove_action('wp_head', 'start_post_rel_link', 10, 0);

/**
 * remove parent post link
 */
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

/**
 * Remove inline style for font size from tag cloud
 */
add_filter('wp_generate_tag_cloud', 'xf_tag_cloud', 10, 3);
  function xf_tag_cloud($tag_string){
    return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
  }
//unregister default wp_widgets
function unregister_default_wp_widgets(){
  unregister_widget('WP_Widget_Pages');
  unregister_widget('WP_Widget_Calendar');
  unregister_widget('WP_Widget_Archives');
  unregister_widget('WP_Widget_Links');
  unregister_widget('WP_Widget_Meta');
  unregister_widget('WP_Widget_Search');
  unregister_widget('WP_Widget_Text');
  unregister_widget('WP_Widget_Categories');
  unregister_widget('WP_Widget_Recent_Posts');
  unregister_widget('WP_Widget_Recent_Comments');
  unregister_widget('WP_Widget_RSS');
  unregister_widget('WP_Widget_Tag_Cloud');
}
add_action('widgets_init', 'unregister_default_wp_widgets', 1);   

//REMOVE META BOXES FROM DEFAULT POSTS SCREEN
function remove_default_post_screen_metaboxes(){
  remove_meta_box('postcustom', 'post', 'normal'); // Custom Fields Metabox
  remove_meta_box('postexcerpt', 'post', 'normal'); // Excerpt Metabox
  remove_meta_box('commentstatusdiv', 'post', 'normal'); // Comments Metabox
  remove_meta_box('trackbacksdiv', 'post', 'normal'); // Talkback Metabox
  remove_meta_box('slugdiv', 'post', 'normal'); // Slug Metabox
  remove_meta_box('authordiv', 'post', 'normal'); // Author Metabox
}
add_action('admin_menu', 'remove_default_post_screen_metaboxes');

//REMOVE META BOXES FROM DEFAULT PAGES SCREEN
function remove_default_page_screen_metaboxes()
{
  global $post_type;
  remove_meta_box('postcustom', 'page', 'normal'); // Custom Fields Metabox
  remove_meta_box('postexcerpt', 'page', 'normal'); // Excerpt Metabox
  remove_meta_box('commentstatusdiv', 'page', 'normal'); // Comments Metabox
  remove_meta_box('commentsdiv', 'page', 'normal'); // Comments
  remove_meta_box('trackbacksdiv', 'page', 'normal'); // Talkback Metabox
  remove_meta_box('slugdiv', 'page', 'normal'); // Slug Metabox
  remove_meta_box('authordiv', 'page', 'normal'); // Author Metabox
}
add_action('admin_menu', 'remove_default_page_screen_metaboxes'); 

//junk
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

//removing-emoji-code
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );


function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

remove_action( 'wp_head', 'wp_resource_hints', 2 );
// Disable REST API link tag
remove_action('wp_head', 'rest_output_link_wp_head', 10);

// Disable oEmbed Discovery Links
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

// Disable REST API link in HTTP headers
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

// Remove Default Title Tag
remove_action( 'wp_head', '_wp_render_title_tag', 1 );
add_action('after_setup_theme', function() {
  // remove SVG and global styles
  remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
  // remove wp_footer actions which add's global inline styles
  remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
  // remove render_block filters which adding unnecessary stuff
  remove_filter('render_block', 'wp_render_duotone_support');
  remove_filter('render_block', 'wp_restore_group_inner_container');
  remove_filter('render_block', 'wp_render_layout_support_flag');
});

function remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' ); // Remove WordPress core CSS
    wp_dequeue_style( 'wp-block-library-theme' ); // Remove WordPress theme core CSS
    wp_dequeue_style( 'classic-theme-styles' ); // Remove global styles inline CSS
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
    wp_dequeue_style( 'global-styles' ); // Remove theme.json css
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css', 100 );

function remove_akismet_widget_css() {
    wp_dequeue_style('akismet-widget-style');
    wp_deregister_style('akismet-widget-style');
}
add_action('wp_enqueue_scripts', 'remove_akismet_widget_css', 100);

function disable_core_block_supports_inline_css() {
    remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
}
add_action('init', 'disable_core_block_supports_inline_css');

function disable_core_block_supports_inline() {
    remove_filter('render_block', 'wp_render_layout_support_flag', 10, 2);
    remove_filter('render_block', 'wp_render_elements_support', 10, 2);
    remove_filter('render_block', 'wp_render_typography_support', 10, 2);
    remove_filter('render_block', 'wp_render_spacing_support', 10, 2);
    remove_filter('render_block', 'wp_render_color_support', 10, 2);
}
add_action('init', 'disable_core_block_supports_inline');




function buffer_callback($buffer) {
    return preg_replace('/<style[^>]*>img:is\(\[sizes="auto" i\], \[sizes\^="auto," i\]\) {[^}]+}<\/style>/', '', $buffer);
}

function start_buffer() { ob_start('buffer_callback'); }
function end_buffer() {  }

add_action('template_redirect', 'start_buffer');
add_action('shutdown', 'end_buffer');
