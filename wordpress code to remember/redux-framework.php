<?php 

/* -------------------- how to active redux-framework --------------------------- */


//include redux-framework
if(!class_exists("ReduxFrameworkPlugin")){
    require_once(get_template_directory()."/libs/redux-framework/redux-framework.php");
    require_once(get_template_directory()."/inc/tumi-options.php");
    require_once(get_template_directory()."/inc/sample-config.php");
}












    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "tumi_options";
    
    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Tumi Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Tumi Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        
        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );








    Redux::setArgs( $opt_name, $args );


    // -> START Basic Fields
	Redux::setSection( $opt_name , array(
        'title' => __( 'Design Fields', 'redux-framework-demo' ),
        'id'    => 'design',
        'desc'  => __( 'You can design your template all part from here', 'redux-framework-demo' ),
        'icon'  => 'el el-wrench'		
	));
	Redux::setSection( $opt_name , array(
        'title'      => __( 'Layout Manager', 'redux-framework-demo' ),
        'id'         => 'layout_manager',
        'desc'       => __( 'You can select layout that you want', 'redux-framework-demo' ) ,
        'subsection' => true,
		'fields'     => array(
            array(
                'id'       => 'tumi_layout',
                'type'     => 'sorter',
                'title'    => 'Homepage Layout Manager',
                'desc'     => 'Organize how you want the layout to appear on the homepage',
                'compiler' => 'true',
                'options'  => array(
                    'enabled'  => array(
                        'about'   => 'About',
                        'articles'   => 'Articles',
                        'clients'   => 'Clients',
                        'portfolios'   => 'Portfolios',
                        'team'   => 'Team',
                        'events'   => 'Events',
                    ),
					'disabled' => array(),
                ),
            ),
		)
	));
	// optimize ARTICLE section
	Redux::setSection( $opt_name , array(
        'title'      => __( 'Article Section', 'redux-framework-demo' ),
        'id'         => 'article_section',
        'desc'       => __( 'You can cutomize article section here', 'redux-framework-demo' ) ,
        'subsection' => true,
		'fields'           => array(
			array(
                'id'       => 'article_title',
                'type'     => 'text',
                'title'    => __( 'Article Title', 'redux-framework-demo' ),
                'subtitle' => __( 'Article Subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'Featured Articles',				
			),
			array(
                'id'       => 'article_content',
                'type'     => 'textarea',
                'title'    => __( 'Article Content', 'redux-framework-demo' ),
                'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'default'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum consequuntur officia delectus ex hic nobis maxime. Quasi incidunt blanditiis rem molestiae aut excepturi. Voluptatibus dolor, molestias nostrum ullam ratione odit.',			
			),
			array(
                'id'            => 'article_count',
                'type'          => 'slider',
                'title'         => __( 'Article Count', 'redux-framework-demo' ),
                'subtitle'      => __( 'This example displays the value in a text box', 'redux-framework-demo' ),
                'desc'          => __( 'Slider description. Min: 4, max: 30, step: 1, default value: 4', 'redux-framework-demo' ),
                'default'       => 4,
                'min'           => 4,
                'step'          => 1,
                'max'           => 30,
                'display_value' => 'text'			
			),
			array(
                'id'       => 'article_postid',
                'type'     => 'text',
                'title'    => __( 'Article Post Id', 'redux-framework-demo' ),
                'subtitle' => __( 'post id', 'redux-framework-demo' ),
                'desc'     => __( 'Put a Post ID', 'redux-framework-demo' ),
                'default'  => '',			
			),
		)
	));
	//optimize EVENT section
	Redux::setSection( $opt_name , array(
        'title'      => __( 'Events Section', 'redux-framework-demo' ),
        'id'         => 'events_section',
        'desc'       => __( 'You can cutomize events section here', 'redux-framework-demo' ) ,
        'subsection' => true,
		'fields'     => array(
			array(
                'id'       => 'events_title',
                'type'     => 'text',
                'title'    => __( 'Events Title', 'redux-framework-demo' ),
                'subtitle' => __( 'Events Subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'Events',				
			),
			array(
                'id'       => 'events_content',
                'type'     => 'textarea',
                'title'    => __( 'Events Content', 'redux-framework-demo' ),
                'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'default'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore quisquam harum quidem nobis ipsam, nostrum consequuntur, delectus dolor recusandae asperiores assumenda dignissimos! Illo dolore, deserunt quisquam, vel nisi placeat eligendi.',			
			),
		)
	));
	
	Redux::setSection($opt_name , array(
        'title'      => __( 'Portfolio Section', 'redux-framework-demo' ),
        'id'         => 'portfolio_section',
        'desc'       => __( 'You can cutomize portfolio section here', 'redux-framework-demo' ) ,
        'subsection' => true,
		'fields' => array(
			array(
                'id'       => 'portfolio_title',
                'type'     => 'text',
                'title'    => __( 'Portfolio Title', 'redux-framework-demo' ),
                'subtitle' => __( 'Portfolio Subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'Portfolio & Screenshots',								
			),
			array(
                'id'       => 'portfolio_content',
                'type'     => 'textarea',
                'title'    => __( 'Portfolio Content', 'redux-framework-demo' ),
                'subtitle' => __( 'Subtitle', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'default'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas unde itaque iure nesciunt expedita! Beatae consectetur, mollitia nulla, necessitatibus ducimus blanditiis nobis. Quam asperiores molestiae, eum, pariatur officia harum. Sequi.',				
			),			
		)
	));
	
	Redux::setSection($opt_name , array(
        'title'      => __( 'AboutUs & Services Section', 'redux-framework-demo' ),
        'id'         => 'about_section',
        'desc'       => __( 'You can cutomize about section here', 'redux-framework-demo' ) ,
        'subsection' => true,
		'fields' => array(
			array(
                'id'       => 'aboutus_logo_image_switch',
                'type'     => 'switch',
                'title'    => __( 'Enable logo or image', 'redux-framework-demo' ),
                'subtitle' => __( 'Select on or off', 'redux-framework-demo' ),
                'default'  => false,			
			),
			array(
                'id'       => 'aboutus_image_upload',
                'type'     => 'media',
                'title'    => __( 'Image Upload for Icon', 'redux-framework-demo' ),
                'desc'     => __( 'Upload your image', 'redux-framework-demo' ),
                'subtitle' => __( 'Upload your image icom here.', 'redux-framework-demo' ),	
				'required' => array( 'aboutus_logo_image_switch', '=', true )
			),
			array(
                'id'       => 'aboutus_icon',
                'type'     => 'text',
                'title'    => __( 'About Us Icon', 'redux-framework-demo' ),
                'subtitle' => __( 'Write about us icon code', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'lab',
				'required' => array( 'aboutus_logo_image_switch', '=', false )
			),
			array(
                'id'       => 'aboutus_title',
                'type'     => 'text',
                'title'    => __( 'About Us title', 'redux-framework-demo' ),
                'subtitle' => __( 'Write about us title', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'Who & Why',			
			),
			array(
                'id'       => 'aboutus_content',
                'type'     => 'textarea',
                'title'    => __( 'About Us content', 'redux-framework-demo' ),
                'subtitle' => __( 'Write about us content', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'The gentlemen who rented the room would sometimes take their evening meal at home in the living room that was used by everyone, and so the door to this room was often kept closed in the evening. But Gregor found it easy to give up having the door open, he had, after all, often failed to make use of it when it was open and, without the family having noticed it, lain in his room in its darkest corner. One time, though, the charwoman left the door.',			
			),
			array(
                'id'       => 'aboutus_background',
                'type'     => 'select',
                'title'    => __( 'About Us Background', 'redux-framework-demo' ),
                'subtitle' => __( 'Select your backkground', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'White',
                    '2' => 'Gray',
                ),
                'default'  => '1'			
			),
			array(
                'id'          => 'aboutus_services',
                'type'        => 'slides',
                'title'       => __( 'Services', 'redux-framework-demo' ),
                'subtitle'    => __( 'Unlimited services with drag and drop sortings.', 'redux-framework-demo' ),
                'desc'        => __( '', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'Service title', 'redux-framework-demo' ),
                    'description' => __( 'Service description', 'redux-framework-demo' ),
                    'url'         => __( 'Icon name', 'redux-framework-demo' ),
                ),			
			),
			array(
                'id'       => 'service_background',
                'type'     => 'select',
                'title'    => __( 'Service Background', 'redux-framework-demo' ),
                'subtitle' => __( 'Select your backkground', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'White',
                    '2' => 'Gray',
                ),
                'default'  => '2'			
			),
			array(
                'id'       => 'service_col',
                'type'     => 'select',
                'title'    => __( 'Service Column', 'redux-framework-demo' ),
                'subtitle' => __( 'Select services column', 'redux-framework-demo' ),
                'desc'     => __( 'This is the description field, again good for additional info.', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => '2 Column',
                    '2' => '3 Column',
                    '3' => '4 Column',
                    '4' => '6 Column',
                ),
                'default'  => '2'			
			),
		)
	));
	Redux::setSection($opt_name,array(
        'title'      => __( 'Client Section', 'redux-framework-demo' ),
        'id'         => 'client_section',
        'desc'       => __( 'You can cutomize client section here', 'redux-framework-demo' ) ,
        'subsection' => true,
		'fields' => array(
			array(
                'id'       => 'client_title',
                'type'     => 'text',
                'title'    => __( 'Client title', 'redux-framework-demo' ),
                'subtitle' => __( 'Write client title', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'Clients',				
			),
			array(
                'id'          => 'clients_lists',
                'type'        => 'slides',
                'title'       => __( 'Clients', 'redux-framework-demo' ),
                'subtitle'    => __( 'Unlimited client list with drag and drop sortings.', 'redux-framework-demo' ),
                'desc'        => __( '', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'Client title', 'redux-framework-demo' ),
                    'description' => __( 'Client description', 'redux-framework-demo' ),
                    'url'         => __( 'Client url', 'redux-framework-demo' ),
                ),			
			),
		)
	));
	Redux::setSection($opt_name,array(
        'title'      => __( 'Team Section', 'redux-framework-demo' ),
        'id'         => 'team_section',
        'desc'       => __( 'You can cutomize team section here', 'redux-framework-demo' ) ,
        'subsection' => true,
		'fields' => array(
			array(
                'id'       => 'fact_title',
                'type'     => 'text',
                'title'    => __( 'Fact title', 'redux-framework-demo' ),
                'subtitle' => __( 'Write fact title', 'redux-framework-demo' ),
                'desc'     => __( 'Field Description', 'redux-framework-demo' ),
                'default'  => 'Facts',			
			),
			array(
                'id'       => 'fact_background_upload',
                'type'     => 'media',
                'title'    => __( 'Fact Backkground Image', 'redux-framework-demo' ),
                'desc'     => __( 'Upload your image', 'redux-framework-demo' ),
                'subtitle' => __( 'Upload your image here.', 'redux-framework-demo' )			
			),
			array(
                'id'            => 'fact_background_opacity',
                'type'          => 'slider',
                'title'         => __( 'Fact Background Opacity', 'redux-framework-demo' ),
                'subtitle'      => __( 'Change background opacity', 'redux-framework-demo' ),
                'desc'          => __( 'Slider description. Min: 0, max: 100, step: 10, default value: .70', 'redux-framework-demo' ),
                'default'       => 70,
                'min'           => 0,
                'step'          => 10,
                'max'           => 100,
                'display_value' => 'text'			
			),
			array(
                'id'          => 'fact_items',
                'type'        => 'slides',
                'title'       => __( 'Fact Items', 'redux-framework-demo' ),
                'subtitle'    => __( '', 'redux-framework-demo' ),
                'desc'        => __( '', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'Fact number', 'redux-framework-demo' ),
                    'description' => __( 'Fact description', 'redux-framework-demo' ),
                    'url'         => __( '', 'redux-framework-demo' ),
                ),			
			),
		)
	));
    
    /*
     * <--- END SECTIONS
     */







































?>