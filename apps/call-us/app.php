<?php
class WPMobAppCallUs {
	var $appID;

	function __construct($appID) {
		$this -> appID = $appID;
	}

	function render() {
		wp_enqueue_script('wpmob-call-us-js', WPMOB_URL . '/apps/call-us/app.js', array('jquery'), '', true);
		wp_enqueue_style('wpmob-call-us-css', WPMOB_URL . '/apps/call-us/app.css', array(), '', 'all');
	}

}

include_once (WPMOB_DIR . '/apps/call-us/view.php');
$app = new WPMobAppCallUs($appID);
$app -> render();
?>