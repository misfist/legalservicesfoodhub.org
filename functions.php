<?php
/**
 * LFSH functions and definitions
 *
 * @package LFSH
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'lfsh_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lfsh_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on LFSH, use a find and replace
	 * to change 'lfsh' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'lfsh', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );

	if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'hero', 1280, 587 ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'lfsh' ),
		'footer' => __('Footer Menu','lfsh')
	) );



	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'lfsh_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // lfsh_setup
add_action( 'after_setup_theme', 'lfsh_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function lfsh_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'lfsh' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Home 1', 'lfsh' ),
		'id'            => 'home-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home 2', 'lfsh' ),
		'id'            => 'home-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home 3', 'lfsh' ),
		'id'            => 'home-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'lfsh_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lfsh_scripts() {
	wp_enqueue_style( 'lfsh-style', get_stylesheet_uri() );

	wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Playfair+Display:400,400italic|Open+Sans:300italic,600italic,300,600');

	wp_enqueue_script( 'lfsh-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'lfsh-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'lfsh-triggers', get_template_directory_uri() . '/js/triggers.js', array(), '1.0', true );

	wp_enqueue_script('modernizr' , get_template_directory_uri() . '/js/modernizr.js', array(), '1.0', false);

	wp_enqueue_script( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js', array(), '1.10.4', true );
	
	wp_enqueue_script('enquire', get_template_directory_uri() . '/js/enquire.min.js', array(), '2.1.1', true);



	if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);


/**
 * Change excerpts to display ' Read Me...' rather than [...]  - Pea
 */

function lfsh_excerpt_more( $more ) {
	return '... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( ' Read More', 'lfsh' ) . '</a>';
}
add_filter( 'excerpt_more', 'lfsh_excerpt_more' );


/**
 * Change excerpts to display 20 words (about 3 lines) - Pea
 */

function lfsh_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'lfsh_excerpt_length', 999 );

/**
 * Fix home page browser title - Pea
 */

function lfsh_wp_title_for_home( $title ) {
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( 'Home', 'lfsh' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}
add_filter( 'wp_title', 'lfsh_wp_title_for_home' );



function my_jquery_enqueue() {
   	wp_deregister_script('jquery');
   	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js", false, null);
   	wp_enqueue_script('jquery');
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
	add_action( 'wp_enqueue_scripts', 'lfsh_scripts' );

/* IE Specific stylesheets
		http://coolestguidesontheplanet.com/register-enqueue-internet-explorer-css-style-sheets-wordpress/

	 */

function ie_style_sheets () {
	wp_register_style( 'ie8', get_stylesheet_directory_uri() . '/ie-lt8.css'  );
	$GLOBALS['wp_styles']->add_data( 'ie8', 'conditional', 'lte IE 8' );

	wp_enqueue_style( 'ie8' );
	}

	add_action ('wp_enqueue_scripts','ie_style_sheets');



	
	function ie_scripts() {

		wp_register_script('css3-mediaqueries', get_template_directory_uri() . '/js/css3-mediaqueries.js', false, null);
		wp_register_script('html5shim',"http://html5shim.googlecode.com/svn/trunk/html5.js",false, null);
		$GLOBALS['wp_scripts']->add_data('css3-mediaqueries','conditional','lte IE 9');
		wp_enqueue_script('css3-mediaqueries');
		wp_enqueue_script('css3-mediaqueries');

	}

	add_action('wp_enqueue_scripts','ie_scripts' );	




	add_action( 'init', 'firm_init' );
	/**
	 * Register a firm post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	function firm_init() {
		$labels = array(
			'name'               => _x( 'Firms', 'post type general name', '' ),
			'singular_name'      => _x( 'Firm', 'post type singular name', '' ),
			'menu_name'          => _x( 'Firms', 'admin menu', '' ),
			'name_admin_bar'     => _x( 'Firm', 'add new on admin bar', '' ),
			'add_new'            => _x( 'Add New', 'Firm', '' ),
			'add_new_item'       => __( 'Add New Firm', '' ),
			'new_item'           => __( 'New Firm', '' ),
			'edit_item'          => __( 'Edit Firm', '' ),
			'view_item'          => __( 'View Firm', '' ),
			'all_items'          => __( 'All Firms', '' ),
			'search_items'       => __( 'Search Firms', '' ),
			'parent_item_colon'  => __( 'Parent Firms:', '' ),
			'not_found'          => __( 'No firms found.', '' ),
			'not_found_in_trash' => __( 'No firms found in Trash.', '' ),
			'register_meta_box_cb' => 'add_location_metaboxes',
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'firms' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' )
		);

		register_post_type( 'firms', $args );
	} 
	
	add_action("admin_init", "location_meta_boxes");   

			function location_meta_boxes(){
			    add_meta_box("firm_details_meta", "Firm Location", "firm_location_options", "firms", "side", 'low');
			}  

			function firm_location_options(){
			        global $post;
			        if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
			        $custom = get_post_custom($post->ID);
			        $firm_address = $custom["firm_address"][0];
			        $firm_city = $custom["firm_city"][0];
			        $firm_state = $custom["firm_state"][0];
			        $firm_url = $custom["firm_url"][0];
			        $firm_phone = $custom["firm_phone"][0];
			?>
			<label>Firm Address</label><br><input name="firm_address" value="<?php echo $firm_address; ?>" /><br /><br />
			<label>Firm City</label><br><input name="firm_city" value="<?php echo $firm_city; ?>" /><br /><br />
			<label>State</label><br><input name="firm_state" value="<?php echo $firm_state; ?>" /><br /><br />
			<label>Org. URL</label><br><input name="firm_url" value="<?php echo $firm_url; ?>" /><br /><br />
			<label>Phone</label><br><input name="firm_phone" value="<?php echo $firm_phone; ?>" />
			<?php
			    }

				add_action('save_post', 'save_firm_address'); 
				add_action('save_post', 'save_firm_city'); 
				add_action('save_post', 'save_firm_state');
				add_action('save_post', 'save_firm_url'); 
				add_action('save_post', 'save_firm_phone');

				function save_firm_address(){
				    global $post;  

				    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
						return $post_id;
					}else{
				    	update_post_meta($post->ID, "firm_address", $_POST["firm_address"]);
				    }
				}

				function save_firm_city(){
				    global $post;  

				    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
						return $post_id;
					}else{
				    	update_post_meta($post->ID, "firm_city", $_POST["firm_city"]);
				    }
				}

				function save_firm_state(){
				    global $post;  

				    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
						return $post_id;
					}else{
				    	update_post_meta($post->ID, "firm_state", $_POST["firm_state"]);
				    }
				}

				

				function save_firm_url(){
					global $post;

					if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
						return $post_id;
					}else{
						update_post_meta($post->ID,"firm_url", $_POST["firm_url"]);

					}
				}

				function save_firm_phone(){
				    global $post;  

				    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
						return $post_id;
					}else{
				    	update_post_meta($post->ID, "firm_phone", $_POST["firm_phone"]);
				    }
				}
	
			

			add_action('init','zipcode_taxonomy', 0);

	


	function zipcode_taxonomy () {
		$labels = array(
		'name'                       => _x( 'Zip Codes', 'taxonomy general name' ),
		'singular_name'              => _x( 'Zip Code', 'taxonomy singular name' ),
		'search_items'               => __( 'Search Zip Codes' ),
		'popular_items'              => __( 'Popular Zip Codes' ),
		'all_items'                  => __( 'All Zip Codes' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Zip Code' ),
		'update_item'                => __( 'Update Zip Code' ),
		'add_new_item'               => __( 'Add New Zip Code' ),
		'new_item_name'              => __( 'New Zip Code Name' ),
		'separate_items_with_commas' => __( 'Separate Zip Codes with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Zip Codes' ),
		'choose_from_most_used'      => __( 'Choose from the most used Zip Codes' ),
		'not_found'                  => __( 'No Zip Codes found.' ),
		'menu_name'                  => __( 'Zip Codes' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'zip-code' ),
	);

	register_taxonomy( 'zip-code', 'firms', $args );
	} 

require get_template_directory() . '/inc/firms-functions.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
