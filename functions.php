<?php
/**
 * indicus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package indicus
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function indicus_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on indicus, use a find and replace
		* to change 'indicus' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'indicus', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'indicus' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'indicus_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'indicus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function indicus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'indicus_content_width', 640 );
}
add_action( 'after_setup_theme', 'indicus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function indicus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'indicus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'indicus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'indicus_widgets_init' );

require('custom-functions.php');
// //require('admin-functions.php');


function custom_color_import_menu() {
    add_menu_page(
        'Color Import',
        'Color Import',
        'manage_options',
        'color-import',
        'custom_color_import_page',
        1
    );
}

function custom_color_import_page() {
    ?>
    <div class="wrap">
        <h2>Color Import</h2>
        <form method="post" enctype="multipart/form-data" action="<?php echo esc_url(admin_url('admin-post.php?action=color_import')); ?>">
            <input type="hidden" name="action" value="color_import">
            <?php wp_nonce_field('color_import_nonce', 'color_import_nonce'); ?>
            <input type="file" name="csv_file" accept=".csv">
            <?php submit_button('Import Colors'); ?>
        </form>
    </div>
    <?php
}
//add_action('admin_menu', 'custom_color_import_menu');

function custom_handle_color_import() {
    if (isset($_POST['color_import_nonce']) && wp_verify_nonce($_POST['color_import_nonce'], 'color_import_nonce')) {
        if (isset($_FILES['csv_file'])) {
            $file = $_FILES['csv_file'];
            if ($file['error'] === UPLOAD_ERR_OK) {
                $csv_data = array_map('str_getcsv', file($file['tmp_name']));
                $newcounter = 0;
                $updatecounter = 0;

                foreach ($csv_data as $index => $row) {

                	 if ($index === 0) {
				        //echo "Skipping first element<br>";
				        continue; 
				    }

	                $shadecode = $row[1];
	                $shadename = $row[2];
	                $color = $row[6];
	                $temprature = $row[7];
	                $tonality = $row[8];
	                $colorcat = $row[9];

	                // Check if the post already exists based on title
	                $existing_post = get_page_by_title($shadename, OBJECT, 'color');

	                if ($existing_post) {
					    $post_id = $existing_post->ID;
					    wp_update_post(array(
					        'ID' => $post_id,
					        'post_content' => $shadecode,
					    ));

					    update_post_meta($post_id, 'color_code', $color);

					    if ($temprature) {
						        wp_set_object_terms($post_id, $temprature, 'temperature', true);
						}

						if ($tonality) {
						        wp_set_object_terms($post_id, $tonality, 'tonality', true);
						}

						if ($colorcat) {
						        wp_set_object_terms($post_id, $colorcat, 'colour-category', true);
						}
					    
					    $updatecounter++;
					} else {
					    $post_id = wp_insert_post(array(
					        'post_title' => $shadename,
					        'post_content' => $shadecode,
					        'post_type' => 'color',
					        'post_status' => 'publish',
					    ));

					    add_post_meta($post_id, 'color_code', $color, true);

					    if($temprature){
					    	wp_set_object_terms($post_id, $temprature, 'temperature', false);	
					    }
					    if($tonality){
					    	wp_set_object_terms($post_id, $tonality, 'tonality', false);
					    }
					    if($colorcat){
					    	wp_set_object_terms($post_id, $colorcat, 'colour-category', false);
					    }

					    $newcounter++;
					}

	            }
            
            }
        }
        echo 'Total post count is '.count($csv_data).'<br> New Added '.$newcounter.'<br> Updated '.$updatecounter.'<br>';
        exit();
    }
}

//add_action('admin_post_color_import', 'custom_handle_color_import');


/**
 * Enqueue scripts and styles.
 */
function indicus_scripts() {
	wp_enqueue_style( 'indicus-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'indicus-style', 'rtl', 'replace' );

	wp_enqueue_script( 'indicus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'indicus_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/post-functions.php';
require get_template_directory() . '/inc/webform-functions.php';

/* extra files include */


function additional_files_indicus() {
    // Enqueue styles
    wp_enqueue_style('indicus-owl', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('indicus-owl-theme', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
    wp_enqueue_style('indicus-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css');
    wp_enqueue_style('indicus-lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css');

    // Enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('indicus-owl', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    wp_enqueue_script('indicus-lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js', array('jquery'), true);

    wp_enqueue_script('indicus-custom-script', get_template_directory_uri() . '/js/custom-script.js', array('jquery', 'indicus-owl'), '1.0', true);
   	wp_localize_script('indicus-custom-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

   	wp_enqueue_script('indicus-post-script', get_template_directory_uri() . '/js/post-script.js', array('jquery'), '1.0', true);
   	wp_localize_script('indicus-post-script', 'myAjax', array('ajax_url' => admin_url('admin-ajax.php')));

}

add_action('wp_enqueue_scripts', 'additional_files_indicus');


// home_bannerslider
add_shortcode('home_bannerslider', 'banner_slider');
function banner_slider()
{
	
	ob_start();
    	?>
    <div class="home-bannerslider">
	    <div class="owl-carousel owl-theme" id="homebannerslider">
	    	 <?php 
	    	  if (have_rows('slider_repeater')) : 
        	 while (have_rows('slider_repeater')) : the_row();
            $slider_image = get_sub_field('slider_image');
             $mobile_image = get_sub_field('mobile_image');
              $slider_title = get_sub_field('slider_title');
              $slider_link = get_sub_field('slider_button_link');


        		?>
	        <div class="item">
	        	<div class="sliderblock">
	        		<div class="sliderimg">
		        		<img src="<?php echo esc_url($slider_image['url']); ?>" alt="<?php echo esc_attr($slider_image['alt']); ?>" alt="Hero Image" class="mobile-none">
		        		<img src="<?php echo esc_url($mobile_image['url']); ?>" alt="<?php echo esc_attr($mobile_image['alt']); ?>" alt="Hero Image" class="desktop-none">
		        	</div>
		        	<div class="slidercontent">
		        		
		        		<div class="slider-inner-data">
			        		<h1><?php echo esc_html($slider_title); ?></h1>
			        	<?php	
			        	if( $slider_link ): 
   						 $link_url = $slider_link['url'];
   						 $link_title = $slider_link['title'];
   						 $link_target = $slider_link['target'] ? $slider_link['target'] : '_self';
    					?>
						    <a class="btn btn-fill" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>
			       
		        		</div>
		        	
		        	</div>
	        	</div>
	        </div>
	    <?php endwhile; ?>
    <?php endif; ?>
	        
	    </div>
	</div>
<?php
    	$content = ob_get_clean();
    	return $content;
	
}



// Warranty Guide page
add_shortcode('warranty_guide', 'warranty_guide_inner');
function warranty_guide_inner()
{
	ob_start(); 
	$products = get_field('products');
	if($products === 'manual') :
		$allproduct = get_field('products_display');
	else :
		$allproduct = get_posts( array(
		  'post_type'   => 'product',
		  'post_status'    => 'publish',
		  'numberposts' => -1,
		  'order' => 'DESC',
		) );
	endif; 
	if( $allproduct ): ?>
    <div class="warr-pro-list"><?php
		foreach( $allproduct as $product ): 
			setup_postdata($product); 
			$title = get_the_title($product->ID);
			$image = get_the_post_thumbnail_url($product->ID); 
			$info = get_field('info', $product->ID);
			$guide = get_field('guide', $product->ID);?>
	    	<div class="warr-pro-number d-flex flex-wrap">
	    		<?php if($image) : ?>
	    		<div class="war-img">
	    			<img src="<?php echo $image; ?>" alt="">
	    		</div>
	    		<?php endif; ?>
	    		<div class="war-content">
	    			<h4><?php echo $title; ?></h4>
	    			<?php if($info) { echo '<p>'.$info.'</p>'; } ?>
	    			<?php if($guide) { 
	    				 $url = wp_get_attachment_url( $guide );?>
		    			<a href="<?php echo esc_html($url); ?>" target="_blank" class="btn-fill">
		    				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.625 12.3749C0.79076 12.3749 0.949732 12.4407 1.06694 12.5579C1.18415 12.6751 1.25 12.8341 1.25 12.9999V16.1249C1.25 16.4564 1.3817 16.7743 1.61612 17.0088C1.85054 17.2432 2.16848 17.3749 2.5 17.3749H17.5C17.8315 17.3749 18.1495 17.2432 18.3839 17.0088C18.6183 16.7743 18.75 16.4564 18.75 16.1249V12.9999C18.75 12.8341 18.8158 12.6751 18.9331 12.5579C19.0503 12.4407 19.2092 12.3749 19.375 12.3749C19.5408 12.3749 19.6997 12.4407 19.8169 12.5579C19.9342 12.6751 20 12.8341 20 12.9999V16.1249C20 16.7879 19.7366 17.4238 19.2678 17.8926C18.7989 18.3615 18.163 18.6249 17.5 18.6249H2.5C1.83696 18.6249 1.20107 18.3615 0.732233 17.8926C0.263392 17.4238 0 16.7879 0 16.1249V12.9999C0 12.8341 0.065848 12.6751 0.183058 12.5579C0.300269 12.4407 0.45924 12.3749 0.625 12.3749Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M9.55825 14.8175C9.61631 14.8757 9.68528 14.9219 9.76121 14.9534C9.83714 14.9849 9.91855 15.0011 10.0008 15.0011C10.083 15.0011 10.1644 14.9849 10.2403 14.9534C10.3162 14.9219 10.3852 14.8757 10.4433 14.8175L14.1933 11.0675C14.3106 10.9501 14.3765 10.791 14.3765 10.625C14.3765 10.459 14.3106 10.2999 14.1933 10.1825C14.0759 10.0651 13.9167 9.99921 13.7508 9.99921C13.5848 9.99921 13.4256 10.0651 13.3083 10.1825L10.6258 12.8663V1.875C10.6258 1.70924 10.5599 1.55027 10.4427 1.43306C10.3255 1.31585 10.1665 1.25 10.0008 1.25C9.83499 1.25 9.67602 1.31585 9.55881 1.43306C9.4416 1.55027 9.37575 1.70924 9.37575 1.875V12.8663L6.69326 10.1825C6.5759 10.0651 6.41672 9.99921 6.25076 9.99921C6.08479 9.99921 5.92561 10.0651 5.80826 10.1825C5.6909 10.2999 5.62497 10.459 5.62497 10.625C5.62497 10.791 5.6909 10.9501 5.80826 11.0675L9.55825 14.8175Z" fill="white"></path></svg> WARRANTY GUIDE
		    			</a>
		    		<?php } ?>
	    		</div>
	    	</div><?php
		endforeach;
		 ?>
    </div>
<?php
wp_reset_postdata();
endif;
	$content = ob_get_clean();
	return $content;
}


// home_WATCH OUR STORIES

add_shortcode('watch_our_storys', 'storyvideo_block');

function storyvideo_block()
{
    ob_start();

    
    if (have_rows('video_items')) {

        echo '<div class="video-slide owl-carousel nav-style">';

        
        while (have_rows('video_items')) : the_row();

            // Get sub-field values.
            $video_url = get_sub_field('video_url');
            $video_title = get_sub_field('video_title');

            
            $video_id = get_youtube_video_id($video_url);

            
            echo '<div class="item">';
            echo '<iframe width="100%" height="580" src="' . esc_attr($video_url) . '" title="' . esc_attr($video_title) . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
            echo '</div>';

        // End loop.
        endwhile;

        echo '</div>';

    } else {
        echo 'No video items found.';
    }

    $content = ob_get_clean();
    return $content;
}

function get_youtube_video_id($url)
{
    parse_str(parse_url($url, PHP_URL_QUERY), $params);
    return isset($params['v']) ? $params['v'] : '';
}




add_shortcode('header_search_block', 'header_search');

function header_search()
{
    ob_start();
    ?>
    <div class="hsearch-area">
        <div class="search-inner">
            <div class="top-se-area">
                <span class="top-se-icon">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <g clip-path="url(#clip0_573_4018)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.051 13.0526C13.1671 12.9364 13.305 12.8442 13.4567 12.7813C13.6085 12.7184 13.7711 12.686 13.9354 12.686C14.0997 12.686 14.2623 12.7184 14.4141 12.7813C14.5658 12.8442 14.7037 12.9364 14.8198 13.0526L19.6323 17.8651C19.8668 18.0995 19.9987 18.4175 19.9988 18.7491C19.9989 19.0807 19.8673 19.3987 19.6329 19.6333C19.3985 19.8678 19.0806 19.9997 18.749 19.9998C18.4174 19.9999 18.0993 19.8683 17.8648 19.6339L13.0523 14.8214C12.9361 14.7053 12.8439 14.5674 12.781 14.4157C12.718 14.2639 12.6857 14.1013 12.6857 13.937C12.6857 13.7727 12.718 13.6101 12.781 13.4583C12.8439 13.3066 12.9361 13.1687 13.0523 13.0526H13.051Z" fill="#333333"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.125 15C9.02784 15 9.92184 14.8222 10.7559 14.4767C11.5901 14.1312 12.348 13.6248 12.9864 12.9864C13.6248 12.348 14.1312 11.5901 14.4767 10.7559C14.8222 9.92184 15 9.02784 15 8.125C15 7.22216 14.8222 6.32817 14.4767 5.49405C14.1312 4.65994 13.6248 3.90204 12.9864 3.26364C12.348 2.62524 11.5901 2.11883 10.7559 1.77333C9.92184 1.42783 9.02784 1.25 8.125 1.25C6.30164 1.25 4.55295 1.97433 3.26364 3.26364C1.97433 4.55295 1.25 6.30164 1.25 8.125C1.25 9.94836 1.97433 11.697 3.26364 12.9864C4.55295 14.2757 6.30164 15 8.125 15V15ZM16.25 8.125C16.25 10.2799 15.394 12.3465 13.8702 13.8702C12.3465 15.394 10.2799 16.25 8.125 16.25C5.97012 16.25 3.90349 15.394 2.37976 13.8702C0.856024 12.3465 0 10.2799 0 8.125C0 5.97012 0.856024 3.90349 2.37976 2.37976C3.90349 0.856024 5.97012 0 8.125 0C10.2799 0 12.3465 0.856024 13.8702 2.37976C15.394 3.90349 16.25 5.97012 16.25 8.125V8.125Z" fill="#333333"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_573_4018">
                                <rect width="20" height="20" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </span>
                <form class="pro-filter">
                    <input type="text" placeholder="Product Search" name="search_query" id="search_query" >
                </form>
                <span class="top-se-close">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0.970279 0.968875C1.03995 0.899031 1.12271 0.843616 1.21383 0.805806C1.30495 0.767997 1.40263 0.748535 1.50128 0.748535C1.59993 0.748535 1.69761 0.767997 1.78873 0.805806C1.87985 0.843616 1.96261 0.899031 2.03228 0.968875L6.00128 4.93938L9.97028 0.968875C10.04 0.899143 10.1228 0.843829 10.2139 0.80609C10.305 0.768352 10.4027 0.748928 10.5013 0.748928C10.5999 0.748928 10.6975 0.768352 10.7887 0.80609C10.8798 0.843829 10.9625 0.899143 11.0323 0.968875C11.102 1.03861 11.1573 1.12139 11.1951 1.2125C11.2328 1.30361 11.2522 1.40126 11.2522 1.49988C11.2522 1.59849 11.2328 1.69614 11.1951 1.78725C11.1573 1.87836 11.102 1.96114 11.0323 2.03088L7.06178 5.99988L11.0323 9.96887C11.102 10.0386 11.1573 10.1214 11.1951 10.2125C11.2328 10.3036 11.2522 10.4013 11.2522 10.4999C11.2522 10.5985 11.2328 10.6961 11.1951 10.7873C11.1573 10.8784 11.102 10.9611 11.0323 11.0309C10.9625 11.1006 10.8798 11.1559 10.7887 11.1937C10.6975 11.2314 10.5999 11.2508 10.5013 11.2508C10.4027 11.2508 10.305 11.2314 10.2139 11.1937C10.1228 11.1559 10.04 11.1006 9.97028 11.0309L6.00128 7.06037L2.03228 11.0309C1.96255 11.1006 1.87976 11.1559 1.78865 11.1937C1.69755 11.2314 1.5999 11.2508 1.50128 11.2508C1.40266 11.2508 1.30501 11.2314 1.2139 11.1937C1.12279 11.1559 1.04001 11.1006 0.970279 11.0309C0.900547 10.9611 0.845233 10.8784 0.807494 10.7873C0.769756 10.6961 0.750332 10.5985 0.750332 10.4999C0.750332 10.4013 0.769756 10.3036 0.807494 10.2125C0.845233 10.1214 0.900547 10.0386 0.970279 9.96887L4.94078 5.99988L0.970279 2.03088C0.900434 1.96121 0.84502 1.87844 0.80721 1.78733C0.769401 1.69621 0.749939 1.59853 0.749939 1.49988C0.749939 1.40122 0.769401 1.30354 0.80721 1.21242C0.84502 1.12131 0.900434 1.03854 0.970279 0.968875Z" fill="black"/>
                    </svg>
                </span>
            </div>
            <div id="rolling" style="display:none;">
                <img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/Rolling-1s-200px.gif">
            </div>
            <div class="pro-block product-img-block" id="productblockholder" style="display:none;">
            	<h3>Products</h3>
				<ul class="serarch-pro-list" id="productholder">					
				</ul>
			</div>
			<div class="pro-block product-color-block" id="colorblockholder" style="display:none;">
				<h3>Colors</h3>
				<ul class="serarch-pro-list" id="colorholder">
				</ul>
			</div>
			<div id="no-result" class="pro-block no-result"  style="display: none;">
				<h4>No Results Found</h4>
				<p>Sorry, but nothing matched your search terms for colors or products. Please try again with different keywords.</p>
			</div>
        </div>
    </div>

    

    <?php
    $content = ob_get_clean();
    return $content;
}

// Gallery page
add_shortcode('gallery_img', 'gallery_img_blog');

function gallery_img_blog()
{
    ob_start();
    ?>
   
   <div class="gallery-inner">
   		<ul class="gallery-ilist">
			<li>
				<a href="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall01.png" data-fancybox="images">
		      		<img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall01.png" alt="" class="img-fluid w-100">
		    	</a>
			</li>
			<li>
				<a href="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall02.png" data-fancybox="images">
		      		<img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall02.png" alt="" class="img-fluid w-100">
		    	</a>
			</li>
			<li>
				<a href="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall03.png" data-fancybox="images">
		      		<img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall03.png" alt="" class="img-fluid w-100">
		    	</a>
			</li>
			<li>
				<a href="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall04.png" data-fancybox="images">
		      		<img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall04.png" alt="" class="img-fluid w-100">
		    	</a>
			</li>
			<li>
				<a href="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall05.png" data-fancybox="images">
		      		<img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall05.png" alt="" class="img-fluid w-100">
		    	</a>
			</li>
			<li>
				<a href="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall06.png" data-fancybox="images">
		      		<img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall06.png" alt="" class="img-fluid w-100">
		    	</a>
			</li>
			<li>
				<a href="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall07.png" data-fancybox="images">
		      		<img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall07.png" alt="" class="img-fluid w-100">
		    	</a>
			</li>
			<li>
				<a href="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall08.png" data-fancybox="images">
		      		<img src="https://indicus.hipl-staging1.com/wp-content/uploads/2023/12/gall08.png" alt="" class="img-fluid w-100">
		    	</a>
			</li>
		</ul>
		<div class="pagination">
			<ul>
				<li><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></li>
				<li><a href="javascript:void(0)" class="active">1</a></li>
				<li><a href="javascript:void(0)">2</a></li>
				<li><a href="javascript:void(0)">3</a></li>
				<li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
			</ul>
		</div>
   </div>

    <?php
    $content = ob_get_clean();
    return $content;
}


// AJAX handler for product search
add_action('wp_ajax_search_all', 'search_all');
add_action('wp_ajax_nopriv_search_all', 'search_all');

function search_all()
{
    $search_query = sanitize_text_field($_POST['search_query']);
    $products_query = new WP_Query(array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        's' => $search_query,
    ));

    $colors_query = new WP_Query(array(
        'post_type' => 'color',
        'posts_per_page' => -1,
        's' => $search_query,
    ));

    ob_start();

    $products_content = array();
    $colors_content = array();;
    if ($products_query->have_posts()) {
    	$producthtm = '';
        while ($products_query->have_posts()) : $products_query->the_post();
        	$productid= get_the_ID();
        	$subheading = get_field('sub_heading', $productid);
            $producthtm .= '<li>';
            $producthtm .= '<div class="inner-search-list">';
            $producthtm .= '<a href="' . get_permalink() . '">';
            if(has_post_thumbnail()) {
	            $producthtm .= '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'large') . '" alt="' . get_the_title() . '">';
	        }
            $producthtm .= '<h5>' . get_the_title() . '</h5>';
            $producthtm .= '<p>' . esc_html($subheading) . '</p>';
             $producthtm .= '</a>'; 
            $producthtm .= '</div>';
            $producthtm .= '</li>';
        endwhile;
        wp_reset_postdata();
        $products_content['total'] = $products_query->found_posts;
        $products_content['html'] = $producthtm;
    } else {
    	$products_content['total'] = 0;
        $products_content['html'] = '<li>No products found</li>';
    }

    if ($colors_query->have_posts()) {
    	$clrhtml = '';
        while ($colors_query->have_posts()) : $colors_query->the_post();
            $clrhtml .= '<li>';
            $clrhtml .= '<div class="color-shape"></div>';
            $clrhtml .= '<p>' . get_the_title() . '<span>' . get_the_content() . '</span></p>';
            $clrhtml .= '</li>';
        endwhile;
        wp_reset_postdata();
        $colors_content['total'] = $colors_query->found_posts;
        $colors_content['html'] = $clrhtml;
    } else {
    	$colors_content['total'] = 0;
        $colors_content['html'] = '<li>No colors found</li>';
    }

    echo json_encode(array('products' => $products_content, 'colors' => $colors_content));
    wp_die(); 
}

/* color category filter */
function indicus_color_categories_filter() {
    $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : 0;
    $term_ids = isset($_POST['term_ids']) ? $_POST['term_ids'] : array();
    
    
    if($term_ids){
    	$tempterms = array();
		$tonalityterms = array();
	    foreach ($term_ids as $term_name) {
		    $all_terms = get_terms();
		    foreach ($all_terms as $term) {
		        if ($term->name === $term_name) {
		            if ($term->taxonomy === 'temperature') {
		                $tempterms[] = $term->term_id;
		            } elseif ($term->taxonomy === 'tonality') {
		                $tonalityterms[] = $term->term_id;
		            }
		        }
		    }
		}
    }else{
    	$tonalityterms = isset($_POST['tonality']) ? $_POST['tonality'] : array();
    	$tempterms = isset($_POST['temprature']) ? $_POST['temprature'] : array();
    }
    

	$all_empty = empty($tempterms) && empty($tonalityterms) && empty($categoryId);

    $args = array(
        'post_type'      => 'color',
        'posts_per_page' => -1,
        'post_status'	 => 'publish',
    );

    $args['tax_query'] = array();

    if($categoryId){
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'colour-category',
                'field' => 'term_id',
                'terms' => $categoryId,
            )
        );
    }

    if(!empty($tempterms)){
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'temperature',
                'field' => 'term_id',
                'terms' => $tempterms,
            )
        );
    }

    if(!empty($tonalityterms)){
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'tonality',
                'field' => 'term_id',
                'terms' => $tonalityterms,
            )
        );
    }

    if ($all_empty) {
        unset($args['tax_query']);
    }

    $color_query = new WP_Query($args);

    if ($color_query->have_posts()) :
        while ($color_query->have_posts()) : $color_query->the_post();
        	 $colorid= get_the_ID();
             $colorselcet = get_post_meta($colorid, 'color_code', true); 
            ?>
            <li>
                <div>
                    <div class="color-box" style="background-color: <?php echo esc_attr($colorselcet); ?>;"></div>
                    <span class="color-name"><?php the_title(); ?></span>
                    <span class="color-name ccode"><?php the_content(); ?></span>
                </div>
            </li>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<li>No colors found</li>';
    endif;

    wp_die();
}

add_action('wp_ajax_indicus_color_categories_filter', 'indicus_color_categories_filter');
add_action('wp_ajax_nopriv_indicus_color_categories_filter', 'indicus_color_categories_filter');



/* color filter */
function indicus_color_filter() {
    $categoryId = isset($_POST['categoryId']) ? $_POST['categoryId'] : 0;
    $term_ids = isset($_POST['term_ids']) ? $_POST['term_ids'] : array();
    $tempterms = array();
	$tonalityterms = array();
    foreach ($term_ids as $term_name) {
	    $all_terms = get_terms();
	    foreach ($all_terms as $term) {
	        if ($term->name === $term_name) {
	            if ($term->taxonomy === 'temperature') {
	                $tempterms[] = $term->term_id;
	            } elseif ($term->taxonomy === 'tonality') {
	                $tonalityterms[] = $term->term_id;
	            }
	        }
	    }
	}

	$all_empty = empty($tempterms) && empty($tonalityterms) && empty($categoryId);

    $args = array(
        'post_type'      => 'color',
        'posts_per_page' => -1,
        'post_status'	 => 'publish',
    );

    $args['tax_query'] = array();

    if($categoryId){
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'colour-category',
                'field' => 'term_id',
                'terms' => $categoryId,
            )
        );
    }

    if(!empty($tempterms)){
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'temperature',
                'field' => 'term_id',
                'terms' => $tempterms,
            )
        );
    }

    if(!empty($tonalityterms)){
        $args['tax_query'][] = array(
            array(
                'taxonomy' => 'tonality',
                'field' => 'term_id',
                'terms' => $tonalityterms,
            )
        );
    }

    if ($all_empty) {
        unset($args['tax_query']);
    }

    $color_query = new WP_Query($args);

    if ($color_query->have_posts()) :
        while ($color_query->have_posts()) : $color_query->the_post();
        	 $colorid= get_the_ID();

        	 $colorselcet=get_post_meta($colorid, 'color_code', true);

             // $color_picker = get_field('color_code', $colorid); 
             // $red= $color_picker['red'];
             // $green= $color_picker['green'];
             // $blue= $color_picker['blue'];
             // $alpha= $color_picker['alpha'];
             // $colorselcet= "rgb($red, $green, $blue, $alpha)";
           
            ?>
            <li>
                <div>
                    <div class="color-box" style="background-color: <?php echo esc_attr($colorselcet); ?>;"></div>
                    <span class="color-name"><?php the_title(); ?></span>
                    <span class="color-name ccode"><?php the_content(); ?></span>
                </div>
            </li>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<li>No colors found</li>';
    endif;

    wp_die();
}

add_action('wp_ajax_indicus_color_filter', 'indicus_color_filter');
add_action('wp_ajax_nopriv_indicus_color_filter', 'indicus_color_filter');
 	
/* Madarth */
function add_page_name_to_body_class($classes) {
    global $post;

    if (is_single() || is_page()) {
        $classes[] = 'page-name-' . $post->post_name;
    }

    return $classes;
}

add_filter('body_class', 'add_page_name_to_body_class');
