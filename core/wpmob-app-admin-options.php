<?php
/**
 * The options to enable the user to tune the app options.
 */
$options = array();
/**
 * The settings are values directly stored in the options table. The user does not have (or doesn't need )
 * to change them.
 */
$appSettings = array();
/**
 * General Settings main section
 **/
$options[] = array("type" => "section", "icon" => "dashicons-admin-generic", "title" => "General Settings", "id" => "general", "expanded" => "true");
/**
 * General section
 **/
$options[] = array("section" => "general", "type" => "heading", "title" => "General", "id" => "general-visual");
$options[] = array("under_section" => "general-visual", "type" => "checkbox", "name" => "Disable All Apps", "id" => array("wpmob_disable_apps"), "options" => array("Disable"), "desc" => "Checking this option will not show any apps in your theme.", "default" => array("not"));
/**
 * App main section
 */
$options[] = array("type" => "section", "icon" => "dashicons-admin-tools", "title" => "App Settings", "id" => "apps", "expanded" => "true");
/**
 * Call us app
 */
$options[] = array("section" => "apps", "type" => "heading", "title" => "Call us", "id" => "call-us");
$appSettings["wpmob_app_call_us"] = array();
$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_base_dir"] = 'call-us';
$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_main_class"] = 'app.php';
$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_slug"] = '#call-us';
$options[] = array("under_section" => "call-us", "type" => "text", "name" => "Label", "placeholder" => "", "id" => "wpmob_app_call_us_label", "desc" => "Label to display.", "default" => "Call us");
$options[] = array("under_section" => "call-us", "type" => "text", "name" => "Text Icon", "placeholder" => "", "id" => "wpmob_app_call_us_text_icon", "desc" => "Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "default" => 'fa fa-phone');
$options[] = array("under_section" => "call-us", "type" => "text", "name" => "<strong>Phone number</strong>", "placeholder" => "+1 415 599 2671", "id" => "wpmob_app_call_us_phone", "desc" => "Please enter your phone number.");
/**
 * Find us app
 */
$options[] = array("section" => "apps", "type" => "heading", "title" => "Find us", "id" => "find-us");
$appSettings["wpmob_app_find_us"] = array();
$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_base_dir"] = 'find-us';
$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_main_class"] = 'app.php';
$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_slug"] = '#find-us';
$options[] = array("under_section" => "find-us", "type" => "text", "name" => "Label", "placeholder" => "", "id" => "wpmob_app_find_us_label", "desc" => "Label to display.", "default" => 'Find us');
$options[] = array("under_section" => "find-us", "type" => "text", "name" => "Text Icon", "placeholder" => "", "id" => "wpmob_app_find_us_text_icon", "desc" => "Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "default" => 'fa fa-map-marker');
$options[] = array("type" => "textarea", "under_section" => "find-us", "id" => "wpmob_app_find_us_address", "name" => "<strong>Formatted address</strong>", "desc" => "Enter your address in the format you wish.", "placeholder" => "647 Broadway New York, NY 10012", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");
$options[] = array("under_section" => "find-us", "type" => "small_heading", "title" => "Google Maps API", );
$options[] = array("under_section" => "find-us", "type" => "text", "name" => "Latitude", "placeholder" => "", "id" => "wpmob_app_find_us_lat", "desc" => "Latitude as retrieved in google maps.", "default" => '');
$options[] = array("under_section" => "find-us", "type" => "text", "name" => "Longitude", "placeholder" => "", "id" => "wpmob_app_find_us_long", "desc" => "Longitude as retrieve in google maps..", "default" => '');
#$options[] = array("under_section" => "find-us", "type" => "text", "name" => "Google Maps Api Key", "placeholder" => "", "id" => "wpmob_app_find_us_api_key", "desc" => "Enter your Google Maps key, you can get one <a href='' target='_blank'>here</a>", "default" => '');
/**
 * Opening hours app
 */
$options[] = array("section" => "apps", "type" => "heading", "title" => "Opening hours", "id" => "opening-hours");
$appSettings["wpmob_app_opening_hours"] = array();
$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_base_dir"] = 'opening-hours';
$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_main_class"] = 'app.php';
$appSettings["wpmob_app_opening_hours"]["wpmob_app_opening_hours_slug"] = '#opening-hours';
$options[] = array("under_section" => "opening-hours", "type" => "text", "name" => "Label", "placeholder" => "", "id" => "wpmob_app_opening_hours_label", "desc" => "Label to display.", "default" => 'Opening hours');
$options[] = array("under_section" => "opening-hours", "type" => "text", "name" => "Text Icon", "placeholder" => "", "id" => "wpmob_app_opening_hours_text_icon", "desc" => "Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "default" => 'fa fa-clock-o');
$options[] = array("type" => "textarea", "under_section" => "opening-hours", "id" => "wpmob_app_opening_hours_desc", "name" => "Opening Hours", "desc" => "Describe your opening hours.", "placeholder" => "", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");
/**
 * Contact us app
 */
$options[] = array("section" => "apps", "type" => "heading", "title" => "Contact us", "id" => "contact-us");
$appSettings["wpmob_app_contact_us"] = array();
$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_base_dir"] = 'contact-us';
$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_main_class"] = 'app.php';
$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_slug"] = '#contact-us';
$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_name"] = array("label" => "", "placeholder" => "Name", "default" => "", "required" => FALSE);
$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_email"] = array("label" => "", "placeholder" => "E-mail", "default" => "", "required" => TRUE);
$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_subject"] = array("label" => "", "placeholder" => "Subject", "default" => "", "required" => TRUE);
$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_message"] = array("label" => "", "placeholder" => "Message", "default" => "", "required" => TRUE);
$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_submit"] = array("label" => "Send Message", "placeholder" => "", "default" => "", "required" => FALSE);
$options[] = array("under_section" => "contact-us", "type" => "text", "name" => "Label", "placeholder" => "", "id" => "wpmob_app_contact_us_label", "desc" => "Label to display.", "default" => 'Contact us');
$options[] = array("under_section" => "contact-us", "type" => "text", "name" => "Text Icon", "placeholder" => "", "id" => "wpmob_app_contact_us_text_icon", "desc" => "Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "default" => 'fa fa-envelope');
$options[] = array("under_section" => "contact-us", "type" => "text", "name" => "Contact e-mail", "placeholder" => "", "id" => "wpmob_app_contact_us_address", "desc" => "E-mail address where to send the contact information.");
$options[] = array("under_section" => "contact-us", "type" => "text", "name" => "Subject prefix", "placeholder" => "Subject prefix", "id" => "wpmob_app_contact_us_subject", "desc" => "Prefix before subject", "default"=>"[Contact form]");
$options[] = array("type" => "textarea", "under_section" => "contact-us", "id" => "wpmob_app_contact_us_body", "name" => "Body text", "desc" => "Enter a short text", "placeholder" => "Message", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");
$options[] = array("type" => "textarea", "under_section" => "contact-us", "id" => "wpmob_app_contact_us_conf", "name" => "Confirmation message", "desc" => "This message will be shown after e-mail was sent successfully. Leave empty if none.", "placeholder" => "", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");
?>