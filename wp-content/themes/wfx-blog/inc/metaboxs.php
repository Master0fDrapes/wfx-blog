<?php 
$prefix = '__mb__'; 

add_action( 'cmb2_admin_init', 'cmb2_mb_post' );
	function cmb2_mb_post() {
  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'mb_post',//Change For Each
    'title'         => __( 'Test Metabox', 'cmb2' ),
    'object_types'  => array( 'post', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );
  // Email text field
  $cmb->add_field( array(
      'name' => __( 'Test Text Email', 'cmb2' ),
      'desc' => __( 'field description (optional)', 'cmb2' ),
      'id'   => $prefix.'email',
      'type' => 'text_email',
      // 'repeatable' => true,
  ) );
}

add_action( 'cmb2_admin_init', 'cmb2_mb_page' );
	function cmb2_mb_page() {
  /**
   * Initiate the metabox
   */
  $cmb = new_cmb2_box( array(
    'id'            => 'mb_page',//Change For Each
    'title'         => __( 'Test Metabox', 'cmb2' ),
    'object_types'  => array( 'page', ), // Post type
    'context'       => 'normal',
    'priority'      => 'high',
    'show_names'    => true, // Show field names on the left
  ) );
  // Email text field
  $cmb->add_field( array(
      'name' => __( 'Test Text Email', 'cmb2' ),
      'desc' => __( 'field description (optional)', 'cmb2' ),
      'id'   => $prefix.'url',
      'type' => 'text_email',
      // 'repeatable' => true,
  ) );
}