<?php

add_filter('https_ssl_verify', '__return_false');

// Image Quality
add_filter('jpeg_quality', function($arg) {
  return 100;
});

add_filter( 'wp_editor_set_quality', function($arg) {
  return 100;
});

// Console
function console_log($output, $with_script_tags = true) {

    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';

    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }

    echo $js_code;

}

// Menus
register_nav_menus( array(
  'main-menu' => 'main-menu',
));

// Login & admin style
function my_wordpress_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/css/login.css' );
}

add_action( 'login_enqueue_scripts', 'my_wordpress_stylesheet' );

// Global staff
acf_add_options_page(array(
  'page_title'  => 'Web Options',
  'menu_title'  => 'Web Options',
  'menu_slug'   => 'web-options',
  'capability'  => 'edit_posts',
  'icon_url'  => 'dashicons-admin-site',
  'redirect'    => false
));

// Posts
function create_posttype() {

  register_post_type( 'portfolio',
    array(
      'labels' => array(
        'name' => __( 'Portfolio' ),
        'singular_name' => __( 'Portfolio' )
      ),
      'supports'           => array( 'title', 'editor' ),
      'public' => true,
      'show_ui' => true,
      'has_archive' => true,
      'taxonomies' => array('type'),
      'menu_icon'   => 'dashicons-portfolio'
    )
  );

  register_post_type( 'selfwork',
    array(
      'labels' => array(
        'name' => __( 'Self-Work' ),
        'singular_name' => __( 'Self-Work' )
      ),
      'supports'           => array( 'title', 'editor' ),
      'public' => true,
      'show_ui' => true,
      'has_archive' => false,
      'taxonomies' => array(),
      'menu_icon'   => 'dashicons-portfolio'
    )
  );



}

add_action( 'init', 'create_posttype' );

function wporg_register_taxonomy_portfolio() {

     $labels = array(
         'name'              => _x( 'Types', 'taxonomy general name' ),
         'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
         'search_items'      => __( 'Search Types' ),
         'all_items'         => __( 'All Types' ),
         'parent_item'       => __( 'Parent Type' ),
         'parent_item_colon' => __( 'Parent Type:' ),
         'edit_item'         => __( 'Edit Type' ),
         'update_item'       => __( 'Update Types' ),
         'add_new_item'      => __( 'Add New Type' ),
         'new_item_name'     => __( 'New Type Name' ),
         'menu_name'         => __( 'Types' ),
     );
     $args   = array(
         'hierarchical'      => true, // make it hierarchical (like categories)
         'labels'            => $labels,
         'show_ui'           => true,
         'show_admin_column' => true,
         'query_var'         => true,
     );

     register_taxonomy( 'type', [ 'portfolio' ], $args );
}

add_action( 'init', 'wporg_register_taxonomy_portfolio' );

function dashboard_redirect($url) {
  $url = '/';
  return $url;
}

add_filter('login_redirect', 'dashboard_redirect');

?>
