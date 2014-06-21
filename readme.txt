=== Kotetsu ===

Theme Name: Kotetsu
Theme URI: https://github.com/inc2734/
Description: Kotetsu is a simple theme for the blog. This theme is responsive, supports desktop( 1280 and 1024), tablets and smartphones. Features, using Sass and PHP Class in functions.php. So this theme is for developers!
Author: inc2734
Author URI: http://2inc.org
Version: 1.0.0
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Tags: blue, white, right-sidebar, responsive-layout, editor-style, sticky-post, microformats, featured-images, custom-colors, custom-menu

== Installation ==

= Installation using "Add New Theme" =
1. From your Admin UI (Dashboard), go to Appearance => Themes. Click the "Add New" button.
2. Search for theme, or click the "Upload" button, and then select the theme you want to install.
3. Click the "Install Now" button.

= Manual installation =
1. Upload the "kotetsu" folder to the "/wp-content/themes/" directory.

= Activiation and Use =
1. Activate the Theme through the "Themes" menu in WordPress.

== Theme features ==

= Using child theme =

This is a example of customizing functions.php in child theme.

`
function kotetsu_child_theme_setup() {
	class Kotetsu extends KotetsuBaseFunctions {
		// Override constructer
		public function __construct() {
			parent::__construct();
			// Add filter
			add_filter( 'foo', array( $this, 'your_filter' ) );
		}

		public function your_filter( $bar ) {
			return $bar;
		}

		// Override parent method
		public function parent_method {
			// Your code!
		}
	}
}
add_action( 'after_setup_theme', 'kotetsu_child_theme_setup' );

// It is all right outside the class!
function your_filter( $bar ) {
	return $bar;
}
add_filter( 'foo', 'your_filter' );
`

== Changelog ==

= 1.0.0 =
* Initial Release