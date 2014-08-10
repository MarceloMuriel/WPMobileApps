<?php

# Load the App handler class
require_once (WPMOB_DIR . '/core/class-wpmob-app.php');

class WPMobile {
	var $appHandler = NULL;

	function __construct() {
		# Create the app handler
		$this -> appHandler = new WPMobApp();
	}

	/**
	 * Initialize the theme and apps.
	 */
	function initialize() {
		# Register the menu items in the admin panel.
		add_action('admin_menu', array($this, 'wpmob_admin_build_menu'));

		# Initialize the current selected theme
		if (is_dir(WPMOB_THEME_DIR)) {
			require_once (WPMOB_THEME_CLASS_PATH);
			$theme = new $GLOBALS['WPMOB_THEME_CLASS']();
			$theme -> initialize();
		} else {
			if (is_file(WPMOB_THEME_BASE_CLASS_PATH)) {
				require_once (WPMOB_THEME_BASE_CLASS_PATH);
				add_action('admin_notices', array(WPMobTheme, 'invalid_theme_path'));
			} else {
				echo "No base class for WPMobTheme found at " . WPMOB_THEME_BASE_CLASS_PATH;
			}
		}
		# Initialize the App handler
		$this -> appHandler -> initialize();
	}

	function wpmob_admin_build_menu() {
		# Main menu for the plugin settings.
		add_menu_page('WPMobile Apps Settings', 'WPMobile Apps', 'manage_options', 'wpmobile', 'wpmob_admin_theme', plugins_url('/assets/icon.png', dirname(__FILE__)));
		# Add submenu page for the device-theme-switcher plugin settings.
		add_submenu_page('wpmobile', 'Theme Redirection Settings', 'Theme Activation', 'manage_options', 'wpmobile', array('DTS_Admin', 'generate_admin_settings_page'));
		# Add submenu for the theme settings
		add_submenu_page('wpmobile', 'Theme Settings', 'Theme Settings', 'manage_options', 'wpmobile-theme', array($GLOBALS['WPMOB_THEME_CLASS'], 'admin_panel'));
		# Add submenu for the apps
		add_submenu_page('wpmobile', 'Apps Menu', 'Apps', 'manage_options', 'wpmobile-apps', array($this -> appHandler, 'admin_panel'));
	}

	function on_activation() {
		if (!current_user_can('activate_plugins'))
			return;
		$plugin = isset($_REQUEST['plugin']) ? $_REQUEST['plugin'] : '';
		# Check if the current request carries a valid nonce
		check_admin_referer("activate-plugin_{$plugin}");

		$this -> appHandler -> on_activation();
	}

	function on_deactivation() {
		if (!current_user_can('activate_plugins'))
			return;
		$plugin = isset($_REQUEST['plugin']) ? $_REQUEST['plugin'] : '';
		# Check if the current request carries a valid nonce
		check_admin_referer("deactivate-plugin_{$plugin}");

		$this -> appHandler -> on_deactivation();
	}

	static function on_uninstall() {
		# Delete all options from the database
		if (!current_user_can('activate_plugins'))
			return;
		# Check if the current request carries a valid nonce
		check_admin_referer('bulk-plugins');
		
		# Delete all options and settings from the database
		global $wpdb;
		$wpdb->query("DELETE FROM wp_options WHERE option_name LIKE 'wpmob_%'");
	}

	function plugins_loaded() {

	}

}
?>