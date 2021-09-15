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
  'header-menu' => 'header-menu',
  'footer-menu' => 'footer-menu',
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

function getAbout() { ?>

  <?php

  $team = get_field('team',163);

  ?>

  <div class="lines">
    <svg width="1386" height="1276" viewBox="0 0 1386 1276" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1241.74 600.858C965.451 1177.78 374.501 1206.15 222.287 1174.77" stroke="#F8F8F8" stroke-miterlimit="10"/>
    <path d="M1097.84 520.596C1235.34 664.827 1343.43 897.77 1385 1275.55" stroke="#F8F8F8" stroke-miterlimit="10"/>
    <path d="M1131.77 366.708C1099.79 277.393 982.112 106.609 731.406 1" stroke="#F8F8F8" stroke-miterlimit="10"/>
    <path d="M965.451 489.818C845.214 396.279 696.198 348.604 523.517 348.604C323.336 348.604 137.865 413.177 1 529.648" stroke="#F8F8F8" stroke-miterlimit="10"/>
    </svg>
  </div>

  <div class="about-wrapper">

    <a class="more white" href="#">
      <span>Go Back</span>
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 10H20" stroke="black" stroke-width="1.5"/>
      <path d="M20 10C17 10 10 8 10 0" stroke="black" stroke-width="1.5"/>
      <path d="M20 10C17 10 10 12 10 20" stroke="black" stroke-width="1.5"/>
      </svg>
    </a>

    <div class="about-text">
      <h1><?php the_field('about_title',163); ?></h1>
      <div class="text">
        <?php the_field('about_text',163); ?>
      </div>
    </div>

    <?php if ($team): ?>

      <div class="our-team">

        <div class="team-wrapper">

          <h2><?php the_field('team_title',163); ?></h2>

          <div class="list">

            <?php foreach ($team as $person): ?>
              <div class="person">
                <div class="picture lazy" data-bg="<?php echo $person['picture']['sizes']['large']; ?>"></div>
                <div class="name">
                  <p><?php echo $person['name']; ?></p>
                  <span><?php echo $person['role']; ?></span>
                </div>
                <div class="text">
                  <?php echo $person['text']; ?>
                </div>
              </div>
            <?php endforeach; ?>

          </div>

        </div>

      </div>

    <?php endif; ?>

  </div>


<?php die(); } ?>

<?php

add_action( 'wp_ajax_nopriv_getAbout', 'getAbout' );
add_action( 'wp_ajax_getAbout', 'getAbout' );

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

?>
