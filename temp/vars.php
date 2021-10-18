<?php

$fields_options = get_fields('options');

$permalink                	=		  get_the_permalink();
$site_url                	  =			site_url();
$website_url                =			get_bloginfo('url');
$website_template_url       =			get_bloginfo('template_url');

$website_author             =     "Annvil";
$meta_description           =     function_exists( 'the_seo_framework' ) ? the_seo_framework()->get_description() : '';

$icons							=				array(
  'logo' => file_get_contents('wp-content/themes/annvil/assets/svg/logo.svg'),
  'arrow' => file_get_contents('wp-content/themes/annvil/assets/svg/arrow.svg'),
  'lines' => file_get_contents('wp-content/themes/annvil/assets/svg/lines.svg'),
  'hamburger' => file_get_contents('wp-content/themes/annvil/assets/svg/hamburger.svg'),
  'close' => file_get_contents('wp-content/themes/annvil/assets/svg/close.svg'),
);

$dev = $fields_options['dev'];

if ( $dev  ) {

  $version = '?'.date('His');

  if ( !is_user_logged_in() ) {
    header("Location: /wp-admin");
  	die();
  }

} else {

  $version = '?1.0';

}

$all_portfolio_terms = get_terms([
  'taxonomy' => 'type',
  'hide_empty' => false,
]);

$all_news_terms = get_terms([
  'taxonomy' => 'category',
  'hide_empty' => false,
]);

?>
