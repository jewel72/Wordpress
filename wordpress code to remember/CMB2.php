<?php

/* --------------------- how to active CMB2 --------------------- */
// include CMB2 metaboxes
if ( file_exists(  __DIR__ . '/libs/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/libs/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/libs/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/libs/CMB2/init.php';
}
require_once(get_template_directory()."/inc/tumi-meta-boxes.php");






/* ---------------------------------------------------------------------------------- */










add_action( 'cmb2_init', 'tumi_metaboxes' );
/**
 * Define the metabox and field configurations.
 */
function tumi_metaboxes() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_tumi_';

    /**
     * Initiate the metabox
     */
    $tumi_event_metabox = new_cmb2_box( array(
        'id'            => 'tumi_event_metabox',
        'title'         => __( 'Event Metabox', 'cmb2' ),
        'object_types'  => array( 'events', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );
    $tumi_portfolio_metabox = new_cmb2_box( array(
        'id'            => 'tumi_portfolio_metabox',
        'title'         => __( 'Portfolio Metabox', 'cmb2' ),
        'object_types'  => array( 'portfolis', ), // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    // Regular text field
    $tumi_event_metabox->add_field( array(
        'name'       => __( 'Event Sub-Title', 'cmb2' ),
        'desc'       => __( 'Put your sub-tile here', 'cmb2' ),
        'id'         => $prefix . 'event_sub_title',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		'default' => 'Lorem '
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    // URL text field
    $tumi_event_metabox->add_field( array(
        'name' => __( 'Event Date', 'cmb2' ),
        'desc' => __( 'Put event date', 'cmb2' ),
        'id'   => $prefix . 'event_date',
        'type' => 'text_date',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );

    // event format 
    $tumi_event_metabox->add_field( array(
        'name' => __( 'Event Format', 'cmb2' ),
        'desc' => __( 'select event format', 'cmb2' ),
        'id'   => $prefix . 'event_format',
        'type' => 'select',
		'options'          => array(
			'1' => __( 'Left Image & Right Content', 'cmb2' ),
			'2'   => __( 'Right Image & Left Content', 'cmb2' ),
		),		
    ) );

	$tumi_event_metabox->add_field( array(
		'name'     => __( 'Event Taxonomy Select', 'cmb2' ),
		'desc'     => __( 'field description (optional)', 'cmb2' ),
		'id'       => $prefix . 'event_taxonomy_select',
		'type'     => 'taxonomy_select',
		'taxonomy' => 'events_cat', // Taxonomy Slug
	) );

    $tumi_portfolio_metabox->add_field( array(
        'name'       => __( 'Portfolio Thin Title', 'cmb2' ),
        'desc'       => __( 'Put your thin-title here', 'cmb2' ),
        'id'         => $prefix . 'portfolio_thin_title',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		'default' => 'Zoe '
    ) );
	
	$tumi_portfolio_metabox->add_field( array(
		'name' => __( 'Portfolio Link', 'cmb2' ),
		'desc' => __( 'Put your link here', 'cmb2' ),
		'id'   => $prefix . 'portfolio_link',
		'type' => 'text_url',
		'default' => 'http://google.com'
	) );

    $tumi_portfolio_metabox->add_field( array(
        'name'       => __( 'Portfolio Content', 'cmb2' ),
        'desc'       => __( 'Put your content here', 'cmb2' ),
        'id'         => $prefix . 'portfolio_details',
        'type'       => 'textarea',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
		'default' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing'
    ) );	
	
}




