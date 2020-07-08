<?php
show_admin_bar(false);

if ( ! function_exists( 'twentytwenty_setup' ) ) :
	function twentytwenty_setup() {
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'twentytwenty' ),
			'footer_menu' => esc_html__( 'Footer menu', 'twentytwenty' ),
		) );	
	}
endif;
add_action( 'after_setup_theme', 'twentytwenty_setup' );

/**
  *	Add styles and scripts
**/
add_action( 'wp_enqueue_scripts', 'twentytwenty_scripts' );
function twentytwenty_scripts() {
    // Load our main stylesheet.
    $parent_style = 'parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version') );
    wp_enqueue_style( 'fontawesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css', array(), '5.11.2' );
    wp_enqueue_style('owl-style', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css');
    wp_enqueue_style('owl-theme-style', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css');

    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/css/main.css');
    // Load our main script.
    wp_enqueue_script( 'my-jquery',  'https://code.jquery.com/jquery-3.5.1.min.js', array(),'3.5.1', true);
    wp_enqueue_script('owl-js', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(), false, true);
 
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), false, true);
}
/**
* 	Hero slider
**/
add_action('init', 'twentytwenty_slider');
function twentytwenty_slider(){
	register_post_type('slider', array(
		'labels'             => array(
			'name'               => 'Slider',
			'singular_name'      => 'Slider',
			'add_new'            => 'Add new ',
			'add_new_item'       => 'Add new slider',
			'edit_item'          => 'Edit slider',
			'new_item'           => 'New slider',
			'view_item'          => 'View slider',
			'search_items'       => 'Search slider',
			'not_found'          =>  'Slider not found',
			'not_found_in_trash' => 'Slider not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Slider',
		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show in rest'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-slides',
    	'menu_position'      => 7,
		'supports'           => array('title', 'editor', 'thumbnail')
	) );
}

/**
 * Custom thumbnail
 **/
function twentytwenty_thumbnail(){
    if( get_the_post_thumbnail_url($post = null, 'full') ){
       return ' style="background-image: url(' . get_the_post_thumbnail_url($post, 'full') . '); "';
    }
    return null;
}
/**
* 	Services posts
**/
add_action('init', 'twentytwenty_service');
function twentytwenty_service(){
	register_post_type('services', array(
		'labels'             => array(
			'name'               => 'Service',
			'singular_name'      => 'Service',
			'add_new'            => 'Add new ',
			'add_new_item'       => 'Add new service',
			'edit_item'          => 'Edit service',
			'new_item'           => 'New service',
			'view_item'          => 'View service',
			'search_items'       => 'Search service',
			'not_found'          =>  'Service not found',
			'not_found_in_trash' => 'Service not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Service',
		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show in rest'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-text-page',
    	'menu_position'      => 8,
		'supports'           => array('title', 'editor', 'thumbnail')
	) );
}
/**
* 	Porfolio posts
**/
add_action('init', 'twentytwenty_portfolio');
function twentytwenty_portfolio(){
	register_post_type('portfolio', array(
			'labels'             => array(
			'name'               => 'Portfolio',
			'singular_name'      => 'Portfolio',
			'add_new'            => 'Add new ',
			'add_new_item'       => 'Add new portfolio',
			'edit_item'          => 'Edit portfolio',
			'new_item'           => 'New portfolio',
			'view_item'          => 'View portfolio',
			'search_items'       => 'Search portfolio',
			'not_found'          =>  'Portfolio not found',
			'not_found_in_trash' => 'Portfolio not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Portfolio',
		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show in rest'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-images-alt',
    	'menu_position'      => 9,
		'supports'           => array('title', 'thumbnail')
	) );
}
/**
*	Contact info
**/
function twentytwenty_phone_item(){
		add_settings_field(
		'phone', 
		'Phone', 
		'display_phone',
		'general' 
	);
    
	register_setting(
		'general', 
		'my_phone' 
	);
}
add_action('admin_init', 'twentytwenty_phone_item');
function display_phone(){
	echo "<input type='text' class='regular-text' name='my_phone' value='" . esc_attr(get_option('my_phone')) . "'>";
}
function twentytwenty_mail_item(){
		add_settings_field(
		'mail', 
		'E-mail', 
		'display_mail',
		'general' 
	);
    
	register_setting(
		'general', 
		'my_mail' 
	);
}
add_action('admin_init', 'twentytwenty_mail_item');
function display_mail(){
	echo "<input type='text' class='regular-text' name='my_mail' value='" . esc_attr(get_option('my_mail')) . "'>";
}
function twentytwenty_address_item(){
		add_settings_field(
		'address', 
		'Address', 
		'display_address',
		'general' 
	);
    
	register_setting(
		'general', 
		'my_address' 
	);
}
add_action('admin_init', 'twentytwenty_address_item');
function display_address(){
	echo "<input type='text' class='regular-text' name='my_address' value='" . esc_attr(get_option('my_address')) . "'>";
}
/**
* 	Copyright
**/
function twentytwenty_copyright_options(){
		add_settings_field(
		'copyright', 
		'Copyright', 
		'display_copyright',
		'general' 
	);
    
	register_setting(
		'general', 
		'twentytwenty_copyright' 
	);
}
add_action('admin_init', 'twentytwenty_copyright_options');
function display_copyright(){
	echo "<input type='text' class='regular-text' name='twentytwenty_copyright' value='" . esc_attr(get_option('twentytwenty_copyright')) . "'>";
}