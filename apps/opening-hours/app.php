<?php
class WPMobAppOpeningHours {
	var $appID;

	function __construct() {
		$this -> appID = 'wpmob_app_opening_hours';
	}

	function render() {
		include_once (WPMOB_DIR . '/apps/opening-hours/view.php');
		wp_enqueue_script('wpmob-opening-hours-js', WPMOB_URL . '/apps/opening-hours/app.js', array('jquery'), '', true);
		wp_enqueue_style('wpmob-opening-hours-css', WPMOB_URL . '/apps/opening-hours/app.css', array(), '', 'all');
	}

	static function getAdminOptions() {
		$options = array();
		$options[] = array("section" => "wpmob_apps", "type" => "heading", "title" => "Opening hours", "id" => "wpmob_opening_hours");
		$options[] = array("under_section" => "wpmob_opening_hours", "type" => "text", "name" => "Order", "placeholder" => "", "id" => "wpmob_app_opening_hours_order", "desc" => "Order", "default" => 2);
		$options[] = array("under_section" => "wpmob_opening_hours", "type" => "text", "name" => "Label", "placeholder" => "", "id" => "wpmob_app_opening_hours_label", "desc" => "Label to display.", "default" => 'Opening hours');
		$options[] = array("under_section" => "wpmob_opening_hours", "type" => "text", "name" => "Text Icon", "placeholder" => "", "id" => "wpmob_app_opening_hours_text_icon", "desc" => "Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "default" => 'fa fa-clock-o');
		$options[] = array("type" => "textarea", "under_section" => "wpmob_opening_hours", "id" => "wpmob_app_opening_hours_desc", "name" => "Opening Hours", "desc" => "Describe your opening hours.", "placeholder" => "", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");

		return $options;
	}

	static function getDefaultSettings() {
		$appSettings = array();
		$appSettings["wpmob_app_opening_hours"] = array();
		$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_base_dir"] = 'opening-hours';
		$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_slug"] = '#opening-hours';
		$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_order"] = 2;
		$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_label"] = 'Opening hours';
		$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_text_icon"] = 'fa fa-clock-o';
		$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_desc"] = 'Opening hours...';

		return $appSettings;
	}

}
?>