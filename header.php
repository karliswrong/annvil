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
	<meta property="og:image" content="<?php echo $fields_options['share_image']; ?>" />

	<!-- JS -->
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/jquery-3.6.0.min.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/jquery.drawsvg.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/lazyload.min.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/smooth-scrollbar.min.js"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/functions.js<?php echo $version; ?>"></script>
	<script type="text/javascript" src="<?php echo $website_template_url; ?>/assets/js/main.js<?php echo $version; ?>"></script>

	<!-- FAV -->
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $website_template_url; ?>/assets/images/misc/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $website_template_url; ?>/assets/images/misc/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $website_template_url; ?>/assets/images/misc/favicon-16x16.png">
	<link rel="manifest" href="<?php echo $website_template_url; ?>/assets/images/misc/site.webmanifest">
	<link rel="mask-icon" href="<?php echo $website_template_url; ?>/assets/images/misc/safari-pinned-tab.svg" color="#0042d4">
	<link rel="shortcut icon" href="<?php echo $website_template_url; ?>/assets/images/misc/favicon.ico">
	<meta name="msapplication-TileColor" content="#0042d4">
	<meta name="msapplication-config" content="<?php echo $website_template_url; ?>/assets/images/misc/browserconfig.xml">
	<meta name="theme-color" content="#0042D4">

	<!-- Style -->
  <link rel="stylesheet" href="<?php echo $website_template_url; ?>/assets/css/main.css<?php echo $version; ?>" />

	<script>

    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-898952-34', 'annvil.lv');
    ga('send', 'pageview');

    LANG = 'en';
  </script>


</head>

<body <?php body_class(); ?> data-ajaxurl="<?php echo site_url(); ?>/wp-admin/admin-ajax.php">

<?php edit_post_link(); ?>

<div class="about-popup">

</div>

<div class="mobile-nav">

	<a href="#" class="close-mob-nav">
		<?php echo $icons['close']; ?>
	</a>

	<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>

	<div class="inst">
			<a href="<?php echo $fields_options['instagram_url']; ?>" target="_blank">Our Instagram</a>
	</div>


</div>

<div class="header">
	<a class="home" href="<?php echo $site_url; ?>"><?php echo $icons['logo']; ?></a>
	<div class="nav">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</div>
	<a href="#" class="show-mob-nav">
		<?php echo $icons['hamburger']; ?>
	</a>
</div>

<div id="scroll">
