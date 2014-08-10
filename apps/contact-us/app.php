<?php
class WPMobAppContactUs {
	var $appID;

	function __construct() {
		$this -> appID = 'wpmob_app_contact_us';
	}

	function render() {
		include_once (WPMOB_DIR . '/apps/contact-us/view.php');
		wp_enqueue_script('wpmob-contact-us-js', WPMOB_URL . '/apps/contact-us/app.js', array('jquery'), '', true);
		wp_enqueue_style('wpmob-contact-us-css', WPMOB_URL . '/apps/contact-us/app.css', array(), '', 'all');
	}

	static function getAdminOptions() {
		$options = array();
		$options[] = array("section" => "wpmob_apps", "type" => "heading", "title" => "Contact us", "id" => "wpmob_contact_us");
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => "Order", "placeholder" => "", "id" => "wpmob_app_contact_us_order", "desc" => "Order", "default" => 4);
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => "Label", "placeholder" => "", "id" => "wpmob_app_contact_us_label", "desc" => "Label to display.", "default" => 'Contact us');
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => "Text Icon", "placeholder" => "", "id" => "wpmob_app_contact_us_text_icon", "desc" => "Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "default" => 'fa fa-envelope');
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => "Contact e-mail", "placeholder" => "", "id" => "wpmob_app_contact_us_address", "desc" => "E-mail address where to send the contact information.");
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => "Subject prefix", "placeholder" => "Subject prefix", "id" => "wpmob_app_contact_us_subject", "desc" => "Prefix before subject", "default" => "[Contact form]");
		$options[] = array("type" => "textarea", "under_section" => "wpmob_contact_us", "id" => "wpmob_app_contact_us_body", "name" => "Body text", "desc" => "Enter a short text", "placeholder" => "Message", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");
		$options[] = array("type" => "textarea", "under_section" => "wpmob_contact_us", "id" => "wpmob_app_contact_us_conf", "name" => "Confirmation message", "desc" => "This message will be shown after e-mail was sent successfully. Leave empty if none.", "placeholder" => "", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");

		return $options;
	}

	static function getDefaultSettings() {
		$appSettings = array();
		$appSettings["wpmob_app_contact_us"] = array();
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_base_dir"] = 'contact-us';
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_slug"] = '#contact-us';
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_name"] = array("label" => "", "placeholder" => "Name", "default" => "", "required" => FALSE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_email"] = array("label" => "", "placeholder" => "E-mail", "default" => "", "required" => TRUE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_subject"] = array("label" => "", "placeholder" => "Subject", "default" => "", "required" => TRUE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_message"] = array("label" => "", "placeholder" => "Message", "default" => "", "required" => TRUE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_submit"] = array("label" => "Send Message", "placeholder" => "", "default" => "", "required" => FALSE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_order"] = 4;
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_label"] = 'Contact us';
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_text_icon"] = 'fa fa-envelope';
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_address"] = get_option('admin_email');
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_subject"] = '[Contact form]';
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_conf"] = 'Thank you!';

		return $appSettings;
	}

}
?>