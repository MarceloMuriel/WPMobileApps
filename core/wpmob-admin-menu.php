<?php

function wpmob_admin_build_menu() {
	# Main menu for the plugin settings.
	add_menu_page('WPMobile Apps Settings', 'WPMobile Apps', 'manage_options', 'wpmobile', 'wpmob_admin_theme', plugins_url('/assets/icon.png', dirname(__FILE__)));
	# Add submenu page for the device-theme-switcher plugin settings.
	add_submenu_page('wpmobile', 'Theme Redirection Settings', 'Theme Activation', 'manage_options', 'wpmobile', array('DTS_Admin', 'generate_admin_settings_page'));
	# Add submenu for the theme settings
	add_submenu_page('wpmobile', 'Theme Settings', 'Theme Settings', 'manage_options', 'wpmobile-theme', array($GLOBALS['WPMOB_THEME_CLASS'], 'admin_panel'));
	# Add submenu for the apps
	add_submenu_page('wpmobile', 'Apps Menu', 'Apps', 'manage_options', 'wpmobile-apps', array('WPMobApp', 'admin_panel'));
}
?>