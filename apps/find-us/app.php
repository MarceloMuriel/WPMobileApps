<?php
class WPMobAppFindUs {
	var $appID;

	function __construct($appID) {
		$this -> appID = $appID;
	}

	function render() {
		# Enable Google Maps only if lat and long have been set.
		if (get_option($this -> appID . '_lat') && get_option($this -> appID . '_long')) {
			wp_enqueue_script('google-maps-js', 'https://maps.googleapis.com/maps/api/js', array(), '', true);
			wp_enqueue_script('wpmob-find-us-js', WPMOB_URL . '/apps/find-us/app.js', array('jquery', 'google-maps-js'), '', true);
		} else {
			wp_enqueue_script('wpmob-find-us-js', WPMOB_URL . '/apps/find-us/app.js', array('jquery'), '', true);
		}

		wp_enqueue_style('wpmob-find-us-css', WPMOB_URL . '/apps/find-us/app.css', array(), '', 'all');
	}

}

include_once (WPMOB_DIR . '/apps/find-us/view.php');
$app = new WPMobAppFindUs($appID);
$app -> render();
?>