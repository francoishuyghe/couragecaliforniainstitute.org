<?php

/**
 * Theme setup.
 */

namespace App;

use function Roots\bundle;
use WP_Query;

/**
 * Register the theme assets.
 *
 * @return void
 */
add_action('wp_enqueue_scripts', function () {

    $is_dev_request = getenv('WP_ENV') == 'development';
    $rest_url = $is_dev_request ? 'http://localhost:3005/wp/wp-admin/admin-ajax.php' : admin_url('admin-ajax.php');
  
    $ajax_params = array(
        'ajax_url' => $rest_url,
        'ajax_nonce' => wp_create_nonce('my_nonce'),
    );
  
    bundle('app')->enqueue()->localize('ajax_object', $ajax_params);;
  }, 100);

  add_action('admin_enqueue_scripts', function () {
    $ajax_params = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'ajax_nonce' => wp_create_nonce('my_nonce'),
    );
  
    wp_enqueue_script('sage/admin.js', asset('scripts/admin.js'), ['jquery'], null, true);
    wp_localize_script('sage/admin.js', 'ajax_object', $ajax_params);
  });

/**
 * Register the theme assets with the block editor.
 *
 * @return void
 */
add_action('enqueue_block_editor_assets', function () {
    bundle('editor')->enqueue();
}, 100);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from the Soil plugin if activated.
     *
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil', [
        'clean-up',
        'nav-walker',
        'nice-search',
        'relative-urls',
    ]);

    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);

    register_sidebar([
        'name'          => __('Footer Right', 'sage'),
        'id'            => 'footer-right'
    ] + $config);
    
    register_sidebar([
        'name'          => __('Footer Left', 'sage'),
        'id'            => 'footer-left'
    ] + $config);
});

// Add a cookie to display popup
$visit_time = date('F j, Y  g:i a');
     
if(!isset($_COOKIE['popup_visit_time'])) {
    // set a cookie for 1 day
    //setcookie('popup_visit_time', $visit_time, time()+86400);
}
    

// Setup a new post type: How-To
add_action('init',  __NAMESPACE__ . '\\howto_custom_init');
function HowTo_custom_init() 
{
  $labels = array(
    'name' => _x('HowTo', 'post type general name'),
    'singular_name' => _x('How-To Article', 'post type singular name'),
    'parent_item_colon' => '',
    'menu_name' => 'How-To'
  );
  
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'how-to' ),
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','thumbnail','custom-fields'),
    'taxonomies' => array('title', 'category' )
  ); 
  register_post_type('howto',$args);
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', function( $length ) {
	return 20;
}, 999 );

// AJAX LOAD MORE
function posts_load_more() {
    $cats = $_POST['cats'];
    $paged = $_POST['paged'];
    $postNum = $_POST['postNum'];
    $renderer = $_POST['renderer'];
    
    $ajaxposts = new WP_Query([
        'post_type' => 'post',
        'posts_per_page' => $postNum,
        'paged' => $paged,
        'post_status' => ['publish'],
        'post__not_in' => get_option( 'sticky_posts' )
    ]);
    
    $response = [];

  
    if($ajaxposts->have_posts()) {
      while($ajaxposts->have_posts()) : $ajaxposts->the_post();
        array_push($response,  view($renderer)->render());
      endwhile;
    } else {
      wp_send_json_success( false );
    }
  
    wp_send_json_success( $response );
  }
  add_action('wp_ajax_posts_load_more', __NAMESPACE__ . '\\posts_load_more');
  add_action('wp_ajax_nopriv_posts_load_more', __NAMESPACE__ . '\\posts_load_more');
