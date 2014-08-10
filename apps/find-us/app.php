<?php
class WPMobAppFindUs {
	var $appID;

	function __construct() {
		$this -> appID = 'wpmob_app_find_us';
	}

	function render() {
		include_once (WPMOB_DIR . '/apps/find-us/view.php');
		# Enable Google Maps only if lat and long have been set.
		if (get_option($this -> appID . '_lat') && get_option($this -> appID . '_long')) {
			wp_enqueue_script('google-maps-js', 'https://maps.googleapis.com/maps/api/js', array(), '', true);
			wp_enqueue_script('wpmob-find-us-js', WPMOB_URL . '/apps/find-us/app.js', array('jquery', 'google-maps-js'), '', true);
		} else {
			wp_enqueue_script('wpmob-find-us-js', WPMOB_URL . '/apps/find-us/app.js', array('jquery'), '', true);
		}

		wp_enqueue_style('wpmob-find-us-css', WPMOB_URL . '/apps/find-us/app.css', array(), '', 'all');
	}

	static function getAdminOptions() {
		$options = array();
		$options[] = array("section" => "wpmob_apps", "type" => "heading", "title" => "Find us", "id" => "wpmob_find_us");
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => "Order", "placeholder" => "", "id" => "wpmob_app_find_us_order", "desc" => "Order", "default" => 3);
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => "Label", "placeholder" => "", "id" => "wpmob_app_find_us_label", "desc" => "Label to display.", "default" => 'Find us');
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => "Text Icon", "placeholder" => "", "id" => "wpmob_app_find_us_text_icon", "desc" => "Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "default" => 'fa fa-map-marker');
		$options[] = array("type" => "textarea", "under_section" => "wpmob_find_us", "id" => "wpmob_app_find_us_address", "name" => "<strong>Formatted address</strong>", "desc" => "Enter your address in the format you wish.", "placeholder" => "647 Broadway New York, NY 10012", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");
		$options[] = array("under_section" => "wpmob_find_us", "type" => "small_heading", "title" => "Google Maps API", );
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => "Latitude", "placeholder" => "", "id" => "wpmob_app_find_us_lat", "desc" => "Latitude as retrieved in google maps.", "default" => '');
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => "Longitude", "placeholder" => "", "id" => "wpmob_app_find_us_long", "desc" => "Longitude as retrieve in google maps..", "default" => '');
		#$this->options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => "Google Maps Api Key", "placeholder" => "", "id" => "wpmob_app_find_us_api_key", "desc" => "Enter your Google Maps key, you can get one <a href='' target='_blank'>here</a>", "default" => '');

		return $options;
	}

	static function getDefaultSettings() {
		$appSettings = array();
		$appSettings["wpmob_app_find_us"] = array();
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_base_dir"] = 'find-us';
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_slug"] = '#find-us';
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_order"] = 3;
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_label"] = 'Find us';
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_text_icon"] = 'fa fa-map-marker';
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_address"] = 'Address not available...';

		return $appSettings;
	}

}
?>