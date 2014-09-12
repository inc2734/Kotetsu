<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# <?php echo ( is_single() || is_page() ) ? 'fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#' : 'fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#' ?>">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php
	wp_head();
	?>
</head>
<body <?php body_class(); ?>>
<div id="container">
	<div class="global-nav row">
		<?php
		wp_nav_menu( array(
			'container_class' => 'col-12',
			'theme_location' => 'global-nav',
			'depth' => 0
		) );
		?>
	<!-- end .global-nav --></div>
	<header id="header" class="row">
		<div id="responsive-btn"></div>
		<div class="col-12">
			<div class="logo">
				<h1>
					<?php
					$header_logo = get_theme_mod( 'logo' );
					if ( !$header_logo ) {
						$header_logo = get_template_directory_uri() . '/images/common/logo.png';
					}
					?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
					</a>
				</h1>
			<!-- end .logo --></div>
		<!-- end .col-12 --></div>
	<!-- end #header --></header>
	<div id="contents">