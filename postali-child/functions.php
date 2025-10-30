<?php
/**
 * Theme functions.
 *
 * @package Postali Child
 * @author Postali LLC
 */
	require_once dirname( __FILE__ ) . '/includes/admin.php';
	require_once dirname( __FILE__ ) . '/includes/utility.php';
	require_once dirname( __FILE__ ) . '/includes/case-results-cpt.php'; // Custom Post Type Case Results
    require_once dirname( __FILE__ ) . '/includes/case-results-espanol-cpt.php'; // Custom Post Type Case Results
	require_once dirname( __FILE__ ) . '/includes/testimonials-cpt.php'; // Custom Post Type Testimonials
	require_once dirname( __FILE__ ) . '/includes/attorneys-cpt.php'; // Custom Post Type Attorneys
    require_once dirname( __FILE__ ) . '/includes/attorneys-espanol-cpt.php'; // Custom Post Type Attorneys
    require_once dirname( __FILE__ ) . '/includes/blog-espanol-cpt.php'; // Custom Post Type Attorneys


	add_action('wp_enqueue_scripts', 'postali_parent');
	function postali_parent() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/assets/css/styles.css' ); // Enqueue parent theme styles
	
	}  

	add_action('wp_enqueue_scripts', 'postali_child');
	function postali_child() {

		wp_enqueue_style( 'child-styles', get_stylesheet_directory_uri() . '/style.css' ); // Enqueue Child theme style sheet (theme info)
		wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/assets/css/styles.css'); // Enqueue child theme styles.css
		//wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
		
		wp_register_style( 'icomoon', 'https://cdn.icomoon.io/152819/HKDIcons/style.css?rjakoc', array() );
		wp_enqueue_style('icomoon');

		// Compiled .js using Grunt.js
		wp_register_script('custom-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',array('jquery'), null, true); 
		wp_enqueue_script('custom-scripts');

		if ( is_page_template( 'front-page.php' ) ) {

		// Home Page Javascript
		// wp_register_script('home-js', get_stylesheet_directory_uri() . '/assets/js/home.min.js', array('jquery'));
		// wp_enqueue_script('home-js');		
		}

		// Gutenberg Blocks
		if( is_page_template( 'page-gutenberg-block.php' ) ) {
			wp_enqueue_style( 'blocks-styles', get_stylesheet_directory_uri() . '/acf-blocks/assets/css/styles.css' ); // Enqueue Child theme style sheet (theme info)
			wp_register_script('slick-scripts', get_stylesheet_directory_uri(). '/acf-blocks/assets/scripts/slick-custom.min.js',array('jquery'), null, true); 
			wp_enqueue_script('slick-scripts');	
		}

		// These scripts should be conditionally enqueued only on page templates where they are needed

        //slick
        wp_register_script('slick-scripts', get_stylesheet_directory_uri() . '/assets/js/slick.min.js',array('jquery'), null, true); 
        wp_enqueue_script('slick-scripts');
        wp_register_script('slick-custom', get_stylesheet_directory_uri() . '/assets/js/slick-custom.min.js',array('jquery'), null, true); 
        wp_enqueue_script('slick-custom');
        wp_enqueue_style( 'slick-styles', get_stylesheet_directory_uri() . '/assets/css/slick.css'); // Enqueue child theme styles.css
		
        // Smooth Scroll
        // wp_register_script('smooth-scroll', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll.min.js', array('jquery'));
        // wp_enqueue_script('smooth-scroll');
        // wp_register_script('smooth-scroll-settings', get_stylesheet_directory_uri() . '/assets/js/smooth-scroll-custom.min.js', array('jquery'));
        // wp_enqueue_script('smooth-scroll-settings');
        
	}

    // Widget Logic Conditionals
    function is_child($parent) {
        global $post;
            return $post->post_parent == $parent;
        }
        
        // Widget Logic Conditionals (ancestor) 
        function is_tree( $pid ) {
        global $post;
        
        if ( is_page($pid) )
        return true;
        
        $anc = get_post_ancestors( $post->ID );
        foreach ( $anc as $ancestor ) {
            if( is_page() && $ancestor == $pid ) {
                return true;
                }
        }
        return false;
    }


    function dm_remove_wp_block_library_css(){
        wp_dequeue_style( 'wp-block-library' );
    }
    add_action( 'wp_enqueue_scripts', 'dm_remove_wp_block_library_css' );

    function add_categories_to_pages() {  
        // Add category metabox to page
        register_taxonomy_for_object_type('category', 'page');  
    }
     // Add to the admin_init hook of your theme functions.php file 
    add_action( 'init', 'add_categories_to_pages' );

    function add_categories_to_blog_esp() {  
        // Add category metabox to page
        register_taxonomy_for_object_type('category', 'blogesp');  
    }
     // Add to the admin_init hook of your theme functions.php file 
    add_action( 'init', 'add_categories_to_blog_esp' );


	// Register Site Navigations
	function postali_child_register_nav_menus() {
		register_nav_menus(
			array(
				'header-nav' => __( 'Header Navigation', 'postali' ),
                'header-nav-about-global' => __( 'Global - About', 'postali' ),
                'header-nav-practice-global' => __( 'Global - Practice Areas', 'postali' ),
                'header-nav-main-global' => __( 'Global - Testimonials, Resources, Areas Served, Results', 'postali' ),
                'header-nav-practice-bronx' => __( 'Bronx - Practice Areas', 'postali' ),
                'header-nav-practice-brooklyn' => __( 'Brooklyn - Practice Areas', 'postali' ),
                'header-nav-practice-queens' => __( 'Queens - Practice Areas', 'postali' ),
                'header-nav-esp' => __( 'Header Navigation - Spanish', 'postali' ),
				'footer-nav' => __( 'Footer Navigation', 'postali' ),
                'footer-nav-esp' => __( 'Footer Navigation - Spanish', 'postali' ),
			)
		);
	}
	add_action( 'init', 'postali_child_register_nav_menus' );

	// Add Custom Logo Support
	add_theme_support( 'custom-logo' );

	function postali_custom_logo_setup() {
		$defaults = array(
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
	}
	add_action( 'after_setup_theme', 'postali_custom_logo_setup' );

	// ACF Options Pages
	if( function_exists('acf_add_options_page') ) {
		
		acf_add_options_page(array(
			'page_title'    => 'Instructions',
			'menu_title'    => 'Instructions',
			'menu_slug'     => 'theme-instructions',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-smiley', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Customizations',
			'menu_title'    => 'Customizations',
			'menu_slug'     => 'customizations',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-admin-customizer', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Awards',
			'menu_title'    => 'Awards',
			'menu_slug'     => 'awards',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-awards', // Add this line and replace the second inverted commas with class of the icon you like
			'redirect'      => false
		));

        acf_add_options_page(array(
			'page_title'    => 'Global Schema',
			'menu_title'    => 'Global Schema',
			'menu_slug'     => 'global_schema',
			'capability'    => 'edit_posts',
			'icon_url'      => 'dashicons-media-code',
			'redirect'      => false
		));

	}

	// Save newly created fields to child theme
	add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
	function my_acf_json_save_point( $path ) {
		
		// update path
		$path = get_stylesheet_directory() . '/acf-json';
		
		// return
		return $path;
	
	}
	
	// Add ability to add SVG to Wordpress Media Library
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	//add SVG to allowed file uploads
	function add_file_types_to_uploads($file_types){

		$new_filetypes = array();
		$new_filetypes['svg'] = 'image/svg+xml';
		$file_types = array_merge($file_types, $new_filetypes );

		return $file_types;
	}
	add_action('upload_mimes', 'add_file_types_to_uploads');

    function video_block_shortcode( $atts ) {
        $attributes = shortcode_atts( array (
            'title' => "",
            'src' => "#"
        ), $atts);
        ob_start();
        get_template_part('blocks/block', 'video-embed', $attributes);
        return ob_get_clean();
    }
    add_shortcode('video-embed-block', 'video_block_shortcode');


	// Display Current Year as shortcode - [year]
	function year_shortcode () {
		$year = date_i18n ('Y');
		return $year;
		}
	add_shortcode ('year', 'year_shortcode');
	
	// WP Backend Menu area taller
	add_action('admin_head', 'taller_menus');

	function taller_menus() {
	echo '<style>
		.posttypediv div.tabs-panel {
			max-height:500px !important;
		}
	</style>';
	}

	// Customize the logo on the wp-login.php page
	function my_login_logo() { ?>
		<style type="text/css">
			#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png);
			height:45px;
			width:204px;
			background-size: 204px 45px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
			}
		</style>
	<?php }
	add_action( 'login_enqueue_scripts', 'my_login_logo' );
	// Contact Form 7 Submission Page Redirect
	add_action( 'wp_footer', 'mycustom_wp_footer' );
	
	function mycustom_wp_footer() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		location = '/form-success/';
	}, false );
	</script>
	<?php
	}

	// Add template column to page list in wp-admin
	function page_column_views( $defaults ) {
		$defaults['page-layout'] = __('Template');
		return $defaults;
	}
	add_filter( 'manage_pages_columns', 'page_column_views' );

	function page_custom_column_views( $column_name, $id ) {
		if ( $column_name === 'page-layout' ) {
			$set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
			if ( $set_template == 'default' ) {
				echo 'Default';
			}
			$templates = get_page_templates();
			ksort( $templates );
			foreach ( array_keys( $templates ) as $template ) :
				if ( $set_template == $templates[$template] ) echo $template;
			endforeach;
		}
	}
	add_action( 'manage_pages_custom_column', 'page_custom_column_views', 5, 2 );

	// Exclude pages on PPC templates from Yoast XML sitemap
function exclude_posts_from_xml_sitemaps() {
	$templates = array(
		'page-ppc-landing.php',
		'page-ppc-landing-options.php',
		'page-ppc-landing-pmax.php',
		'page-ppc-landing_v2.php'
	);

	$ppc_ids = array();
	foreach ( $templates as $template ) {
		//get_page_id_by_template($template);
		$args = [
			'post_type'  => 'page',
			'fields'     => 'ids',
			'nopaging'   => true,
			'meta_key'   => '_wp_page_template',
			'meta_value' => $template
		];

		$ppc_pages = get_posts( $args );
		$ppc_ids = array_merge($ppc_ids, $ppc_pages);
	}
	return ($ppc_ids);
}

add_filter( 'wpseo_exclude_from_sitemap_by_post_ids', 'exclude_posts_from_xml_sitemaps' );

/* ACF Register Blocks */
function postali_register_acf_blocks() {
	register_block_type( __DIR__ . '/acf-blocks/banner' );
	register_block_type( __DIR__ . '/acf-blocks/cta' );
	register_block_type( __DIR__ . '/acf-blocks/slider' );
	register_block_type( __DIR__ . '/acf-blocks/accordions' );
	register_block_type( __DIR__ . '/acf-blocks/map' );
	register_block_type( __DIR__ . '/acf-blocks/columns' );
	register_block_type( __DIR__ . '/acf-blocks/steps' );
	register_block_type( __DIR__ . '/acf-blocks/results' );
	register_block_type( __DIR__ . '/acf-blocks/video' );
	register_block_type( __DIR__ . '/acf-blocks/awards' );
	register_block_type( __DIR__ . '/acf-blocks/about' );
	register_block_type( __DIR__ . '/acf-blocks/cards' );
}
add_action( 'init', 'postali_register_acf_blocks' );

function retrieve_latest_gform_submissions() {
    $site_url = get_site_url();
    $search_criteria = [
        'status' => 'active'
    ];
    $form_ids = 2; //search all forms
    $sorting = [
        'key' => 'date_created',
        'direction' => 'DESC'
    ];
    $paging = [
        'offset' => 0,
        'page_size' => 5
    ];
    
    $submissions = GFAPI::get_entries($form_ids, null, $sorting, $paging);
    $start_date = date('Y-m-d H:i:s', strtotime('-5 day'));
    $end_date = date('Y-m-d H:i:s');
    $entry_in_last_5_days = false;
    
    foreach ($submissions as $submission) {
        if( $submission['date_created'] > $start_date  && $submission['date_created'] <= $end_date ) {
            $entry_in_last_5_days = true;
        } 
    }
    if( !$entry_in_last_5_days ) {
        wp_mail('webdev@postali.com', 'Submission Status', "No submissions in last 5 days on $site_url");
    }
}
add_action('check_form_entries', 'retrieve_latest_gform_submissions');

?>