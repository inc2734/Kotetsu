<?php get_header(); ?>

<div class="row">
	<div class="col-12">
		<div class="row">

<main id="main" role="main" class="col-9">
	<article class="hentry">
		<?php Kotetsu::the_bread_crumb(); ?>
		<h1 class="entry-title"><?php wp_title( '', true, '' ); ?></h1>

		<div class="entry-content">
			<p>
				<?php _e( 'Woops! Page not found.', Kotetsu::DOMAIN ); ?><br />
				<?php _e( 'The page you are looking for may be moved or deleted.', Kotetsu::DOMAIN ); ?><br />
				<?php _e ( 'Please search this serch box.', Kotetsu::DOMAIN ); ?>
			</p>
			<p>
				<?php get_search_form(); ?>
			</p>
		<!-- end .entry-content --></div>

		<?php Kotetsu::the_link_pages(); ?>
	</article>
<!-- end #main --></main>

<?php get_sidebar(); ?>

		<!-- end .row --></div>
	<!-- end col-12 --></div>
<!-- end .row --></div>

<?php get_footer(); ?>