<?php
require_once (WPMOB_DIR . '/core/theme/class-wpmob-theme.php');

class WPMobilissimo extends WPMobTheme {
	function initialize() {
		include_once WPMOB_DIR . '/themes/mobilissimo/acera-options/admin-helper.php';
		add_action('admin_head', 'acera_admin_head');
	}

	static function init_panel() {
		# Include default theme options panel.
		include_once WPMOB_DIR . '/themes/mobilissimo/acera-options/options/acera_options.php';
		include_once WPMOB_DIR . '/themes/mobilissimo/acera-options/ajax-image.php';
		include_once WPMOB_DIR . '/themes/mobilissimo/acera-options/generate-options.php';

		$theme_ref = new acera_theme_options_now($options);
		$theme_ref -> acera_display_page();
	}
}
?>