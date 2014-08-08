<?php
require_once (WPMOB_DIR . '/core/util/device-detection.php');

class WPMobApp {
	function __construct() {

	}

	/**
	 * It registers the necessary actions to start the apps.
	 */
	function initialize() {
		$appsDisabled = get_option('wpmob_disable_apps') == 'true';
		if (!$appsDisabled) {
			# Load the UI after the theme loading
			add_action('after_setup_theme', array($this, 'load_frontend_ui'));
			add_action('wp_enqueue_scripts', array($this, 'register_frontend_scripts'), 100);
		}
		add_action('admin_head', array($this, 'register_admin_scripts'));
	}

	function register_frontend_scripts() {
		# Do not load this scripts in the administration panel.
		$appsDisabled = get_option('wpmob_disable_apps') == 'true';
		if (!is_admin() && !$appsDisabled) {
			wp_enqueue_script('carousel-js', WPMOB_URL . '/core/js/owl.carousel.min.js', array('jquery'), '', true);
			wp_enqueue_script('wpmob-panel-js', WPMOB_URL . '/core/js/app-panel.js', array('jquery', 'carousel-js'), '', true);
			wp_enqueue_style('carousel-css', WPMOB_URL . '/core/css/owl.carousel.css', array(), '', 'all');
			wp_enqueue_style('font-awesome-css', WPMOB_URL . '/core/css/font-awesome.min.css', array(), '', 'all');
			wp_enqueue_style('wpmob-panel-css', WPMOB_URL . '/core/css/app-panel.css', array(), '', 'all');
		}
	}

	/**
	 * It loads the UI in the frontend.
	 */
	function load_frontend_ui() {
		# Do not load this content in the administration panel or in desktop mode.
		if ((!is_admin() && detect_users_device() != 'desktop') || (isset($_GET['theme']) && $_GET['theme'] != 'desktop')) {
			$appsDisabled = get_option('wpmob_disable_apps') == 'true';
			if (!$appsDisabled) {
				require_once (WPMOB_DIR . '/core/css/app-panel-fonts.css.php');
				require_once (WPMOB_DIR . '/core/inc/app-panel.html.inc.php');
			}
		}
	}

	/**
	 * Load the Apps administration panel scripts and styles.
	 */
	function register_admin_scripts() {
		# Do not load on the frontend.
		if (is_admin()) {
			echo '<link rel="stylesheet" href="' . WPMOB_URL . '/core/css/app-panel-admin.css" />';
			echo '<script type="text/javascript" src="' . WPMOB_URL . '/core/js/app-panel-admin.js"></script>';
		}
	}

	/**
	 * It initializes the configuration panel in the wordpres
	 * administration. This method is called with the add_action()
	 * hook in the admin-menu.php file.
	 */
	static function admin_panel() {
		# Include the necessary files
		require_once (WPMOB_DIR . '/core/wpmob-app-admin-options.php');
		require_once (WPMOB_DIR . '/core/class-wpmob-app-admin-options.php');
		# Register app IDs, merge with existing IDs.
		update_option('wpmob_app_ids', array_unique(array_merge(is_array(($IDs = get_option('wpmob_app_ids'))) ? $IDs : array(), array_keys($appSettings))));
		# Register the settings for each app
		foreach ($appSettings as $appID => $settings) {
			foreach ($settings as $settingID => $setting) {
				update_option($settingID, $setting);
			}
		}
		# Load the panel
		$panel = new WPMobOptions($options);
		$panel -> wpmob_display_page();
	}

}
?>