<?php

/*
Plugin Name: Excellent Plus Demo Import
Plugin URI: https://themefreesia.com/
Description: Import your content, widgets and theme settings with one click. Theme authors! Enable simple demo import for your theme demo data.
Version: 100
Author: Theme Freesia
Author URI: https://www.themefreesia.com
License: GPL3
License URI: http://www.gnu.org/licenses/gpl.html
Text Domain: pt-ocdi
*/

// Block direct access to the main plugin file.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
add_action( 'excellent_footer_column', 'excellent_footer_column_section' );
function excellent_import_files() {
  return array(
    array(
      'import_file_name'             => 'Default Demo Content',
      'categories'                   => array( 'Default'),
      'local_import_file'            => trailingslashit( plugin_dir_path( __FILE__ ) ).'inc/plus/excellent-plus.xml',
      'local_import_widget_file'     => trailingslashit( plugin_dir_path( __FILE__ ) ).'inc/plus/excellent-plus-widgets.wie',
      'local_import_customizer_file' => trailingslashit( plugin_dir_path( __FILE__ ) ).'inc/plus/excellent-plus-export.dat',
      'import_preview_image_url'   	 => plugins_url( '/one-click-demo-import/inc/plus/screenshot.jpeg', dirname(__FILE__) ),
      'import_notice'                => __( 'Important: You have to set up slider from Customize > Slider Options > Select Category Slider. Recommended Plugins: Install WooCommerce Plugins, Contact Form 7 and Recent Posts Widget With Thumbnails to look exactly as in our demo.', 'pt-ocdi' ),
    ),
   );
}
add_filter( 'pt-ocdi/import_files', 'excellent_import_files' );

function excellent_after_import_setup($selected_import) {
		// Assign menus to their locations.
		$top_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );
		$main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
		$social_link = get_term_by( 'name', 'Add Social Icons Only', 'nav_menu' );

		set_theme_mod( 'nav_menu_locations', array(
				'topmenu' => $top_menu->term_id,
				'primary' => $main_menu->term_id,
				'footermenu' => $footer_menu->term_id,
				'social-link' => $social_link->term_id,
			)
		);

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'Home' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );

		// Assign front page and posts page (blog page).
		$front_page_id = get_page_by_title( 'My Page' );
		$blog_page_id  = get_page_by_title( 'Blog' );

		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $front_page_id->ID );
		update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'excellent_after_import_setup' );
/**
 * Main plugin class with initialization tasks.
 */
class OCDI_Plugin {
	/**
	 * Constructor for this class.
	 */
	public function __construct() {
		/**
		 * Display admin error message if PHP version is older than 5.3.2.
		 * Otherwise execute the main plugin class.
		 */
		if ( version_compare( phpversion(), '5.3.2', '<' ) ) {
			add_action( 'admin_notices', array( $this, 'old_php_admin_error_notice' ) );
		}
		else {
			// Set plugin constants.
			$this->set_plugin_constants();

			// Composer autoloader.
			require_once PT_OCDI_PATH . 'vendor/autoload.php';

			// Instantiate the main plugin class *Singleton*.
			$pt_one_click_demo_import = OCDI\OneClickDemoImport::get_instance();
		}
	}


	/**
	 * Display an admin error notice when PHP is older the version 5.3.2.
	 * Hook it to the 'admin_notices' action.
	 */
	public function old_php_admin_error_notice() {
		$message = sprintf( esc_html__( 'The %2$sOne Click Demo Import%3$s plugin requires %2$sPHP 5.3.2+%3$s to run properly. Please contact your hosting company and ask them to update the PHP version of your site to at least PHP 5.3.2.%4$s Your current version of PHP: %2$s%1$s%3$s', 'pt-ocdi' ), phpversion(), '<strong>', '</strong>', '<br>' );

		printf( '<div class="notice notice-error"><p>%1$s</p></div>', wp_kses_post( $message ) );
	}


	/**
	 * Set plugin constants.
	 *
	 * Path/URL to root of this plugin, with trailing slash and plugin version.
	 */
	private function set_plugin_constants() {
		// Path/URL to root of this plugin, with trailing slash.
		if ( ! defined( 'PT_OCDI_PATH' ) ) {
			define( 'PT_OCDI_PATH', plugin_dir_path( __FILE__ ) );
		}
		if ( ! defined( 'PT_OCDI_URL' ) ) {
			define( 'PT_OCDI_URL', plugin_dir_url( __FILE__ ) );
		}
		require_once PT_OCDI_PATH . 'tgm-plugin.php';
		// Action hook to set the plugin version constant.
		add_action( 'admin_init', array( $this, 'set_plugin_version_constant' ) );
	}


	/**
	 * Set plugin version constant -> PT_OCDI_VERSION.
	 */
	public function set_plugin_version_constant() {
		if ( ! defined( 'PT_OCDI_VERSION' ) ) {
			$plugin_data = get_plugin_data( __FILE__ );
			define( 'PT_OCDI_VERSION', $plugin_data['Version'] );
		}
	}
}

// Instantiate the plugin class.
$ocdi_plugin = new OCDI_Plugin();
