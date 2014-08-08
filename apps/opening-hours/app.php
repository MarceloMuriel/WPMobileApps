<?php
class WPMobAppOpeningHours {
	var $appID;

	function __construct($appID) {
		$this -> appID = $appID;
	}

	function render() {
		wp_enqueue_script('wpmob-opening-hours-js', WPMOB_URL . '/apps/opening-hours/app.js', array('jquery'), '', true);
		wp_enqueue_style('wpmob-opening-hours-css', WPMOB_URL . '/apps/opening-hours/app.css', array(), '', 'all');
	}

}

include_once (WPMOB_DIR . '/apps/opening-hours/view.php');
$app = new WPMobAppOpeningHours($appID);
$app -> render();
?>