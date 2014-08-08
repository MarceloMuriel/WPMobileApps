<?php

# Load the WPMobile class
require_once (WPMOB_DIR . '/core/wpmob-admin-menu.php');
# Load the App handler class
require_once (WPMOB_DIR . '/core/class-wpmob-app.php');

class WPMobile {

	function __construct() {

	}

	/**
	 * Initialize the theme and apps.
	 */
	function initialize() {
		# Register the menu items in the admin panel.
		add_action('admin_menu', 'wpmob_admin_build_menu');

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
		$app = new WPMobApp();
		$app -> initialize();
	}

}
?>