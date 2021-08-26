<?php

include("temp/vars.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php wp_title(); ?></title>

	<!-- General meta -->
	<meta charset="<?php echo $website_charset; ?>">
	<meta name="viewport" content="minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no"/>
	<meta name="author" content="<?php echo $website_author; ?>">

	<!-- OG -->
	<meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo $permalink; ?>" />
  <meta property="description" content="<?php echo esc_html( $meta_description ); ?>" />
  <meta property="og:description" content="<?php echo esc_html( $meta_description ); ?>" />

	<!-- JS -->
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/lazyload.min.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/smooth-scrollbar.min.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/functions.js<?php echo $version; ?>"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/main.js<?php echo $version; ?>"></script>

	<!-- Style -->
  <link rel="stylesheet" href="<?php echo $website_template_url; ?>/assets/css/main.css<?php echo $version; ?>" />


</head>

<body <?php body_class(); ?> data-ajaxurl="<?php echo site_url(); ?>/wp-admin/admin-ajax.php">

<?php edit_post_link(); ?>

<div class="header">
	<a class="home" href="<?php echo $site_url; ?>"><?php echo $icons['logo']; ?></a>
	<div class="nav">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	</div>
</div>

<div id="scroll">
