<?php
/**
 * Kotetsu_Customizer
 * Version: 1.0.0
 * Author: inc2734
 * Author URI: http://2inc.org
 */
class Kotetsu_Customizer {
	/**
	 * customize_register
	 */
	public function customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

		$wp_customize->add_section( 'kotetsu_design', array(
			'title'    => __( 'settings', 'kotetsu' ),
			'priority' => 100,
		) );

		require_once get_template_directory() . '/inc/kotetsu-logo-control.php';
		$wp_customize->add_setting( 'logo', array(
			'default'   => get_template_directory_uri() . '/images/common/logo.png',
			'transport' => 'postMessage',
		) );
		$wp_customize->add_control( new Kotetsu_Logo_Control( $wp_customize, 'logo', array(
			'label'    => __( 'Logo', 'kotetsu' ),
			'section'  => 'kotetsu_design',
			'settings' => 'logo',
		) ) );

		$wp_customize->add_setting( 'gnav_color' , array(
			'default'     => '#377ab1',
			'transport'   => 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gnav_color', array(
			'label'    => __( 'Global navigation color', 'kotetsu' ),
			'section'  => 'colors',
			'settings' => 'gnav_color',
		) ) );

		$wp_customize->add_setting( 'gnav_rollover_color' , array(
			'default'     => '#3370A1',
			'transport'   => 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gnav_rollover_color', array(
			'label'    => __( 'Global navigation rollover color', 'kotetsu' ),
			'section'  => 'colors',
			'settings' => 'gnav_rollover_color',
		) ) );

		$wp_customize->add_setting( 'font_color' , array(
			'default'     => '#000',
			'transport'   => 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font_color', array(
			'label'    => __( 'Font color', 'kotetsu' ),
			'section'  => 'colors',
			'settings' => 'font_color',
		) ) );

		$wp_customize->add_setting( 'link_color' , array(
			'default'     => '#377ab1',
			'transport'   => 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
			'label'    => __( 'Link color', 'kotetsu' ),
			'section'  => 'colors',
			'settings' => 'link_color',
		) ) );
	}

	/**
	 * customize_css
	 */
	public function customize_css() {
		?>
		<style>
		<?php if ( get_theme_mod( 'font_color' ) ) : ?>
		body,
		.hentry .entry-title a {
			color: <?php echo get_theme_mod( 'font_color' ); ?>;
		}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'link_color' ) ) : ?>
		a,
		.hentry .entry-title a:hover,
		.hentry .entry-title a:active {
			color: <?php echo get_theme_mod( 'link_color' ); ?>;
		}
		.entries .hentry .entry-thumbnail a {
			background-color: <?php echo get_theme_mod( 'link_color' ); ?>;
		}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'gnav_color' ) ) : ?>
		.global-nav,
		.global-nav ul li a {
			background-color: <?php echo get_theme_mod( 'gnav_color' ); ?>;
		}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'gnav_rollover_color' ) ) : ?>
		.global-nav ul li.current-menu-ancestor > a,
		.global-nav ul li.current-menu-item > a,
		.global-nav ul li.current_page_item > a,
		.global-nav ul li a:hover {
			background-color: <?php echo get_theme_mod( 'gnav_rollover_color' ); ?>;
		}
		<?php endif; ?>
		</style>
		<?php
	}

	/**
	 * customize_preview_js
	 */
	public function customize_preview_js() {
		wp_enqueue_script( 'customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '16', true );
	}
}