<?php

# Load the WPMobile class
require_once (WPMOB_DIR . '/core/admin-menu.php');

class WPMobile {

	function __construct() {

	}

	function initialize() {
		add_action('admin_menu', 'wpmob_admin_build_menu');
	}

}
?>