<?php

# Load the WPMobile class
require_once (WPMOB_DIR . '/core/admin-menu.php');

class WPMobile {

	function __construct() {

	}

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
	}

}
?>