<?php
class WPMobAppContactUs {
	var $appID;

	function __construct($appID) {
		$this -> appID = $appID;
	}

	function render() {
		wp_enqueue_script('wpmob-contact-us-js', WPMOB_URL . '/apps/contact-us/app.js', array('jquery'), '', true);
		wp_enqueue_style('wpmob-contact-us-css', WPMOB_URL . '/apps/contact-us/app.css', array(), '', 'all');
	}

}

include_once (WPMOB_DIR . '/apps/contact-us/view.php');
$app = new WPMobAppContactUs($appID);
$app -> render();
?>