<?php
class WPMobAppCallUs {
	var $appID;

	function __construct() {
		$this -> appID = 'wpmob_app_call_us';
	}

	function render() {
		include_once (WPMOB_DIR . '/apps/call-us/view.php');
		wp_enqueue_script('wpmob-call-us-js', WPMOB_URL . '/apps/call-us/app.js', array('jquery'), '', true);
		wp_enqueue_style('wpmob-call-us-css', WPMOB_URL . '/apps/call-us/app.css', array(), '', 'all');
	}

	static function getAdminOptions() {
		$options = array();
		$options[] = array("section" => "wpmob_apps", "type" => "heading", "title" => "Call us", "id" => "wpmob_call_us");
		$options[] = array("under_section" => "wpmob_call_us", "type" => "text", "name" => "Order", "placeholder" => "", "id" => "wpmob_app_call_us_order", "desc" => "Order", "default" => 1);
		$options[] = array("under_section" => "wpmob_call_us", "type" => "text", "name" => "Label", "placeholder" => "", "id" => "wpmob_app_call_us_label", "desc" => "Label to display.", "default" => "Call us");
		$options[] = array("under_section" => "wpmob_call_us", "type" => "text", "name" => "Text Icon", "placeholder" => "", "id" => "wpmob_app_call_us_text_icon", "desc" => "Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "default" => 'fa fa-phone');
		$options[] = array("under_section" => "wpmob_call_us", "type" => "text", "name" => "<strong>Phone number</strong>", "placeholder" => "+1 415 599 2671", "id" => "wpmob_app_call_us_phone", "desc" => "Please enter your phone number.");

		return $options;
	}

	static function getDefaultSettings() {
		$appSettings = array();
		$appSettings["wpmob_app_call_us"] = array();
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_base_dir"] = 'call-us';
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_slug"] = '#call-us';
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_order"] = 1;
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_label"] = 'Call us';
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_text_icon"] = 'fa fa-phone';

		return $appSettings;
	}

}
?>