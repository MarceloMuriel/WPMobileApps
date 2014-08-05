<?php

function wpmob_admin_build_menu() {
	# Main menu for the plugin settings.
	add_menu_page('WPMobile Apps Settings', 'WPMobile', 'manage_options', 'wpmobile', 'wpmob_admin_theme', plugins_url('/assets/icon.png', dirname(__FILE__)));
	# Add submenu page for the device-theme-switcher plugin settings.
	add_submenu_page('wpmobile', 'Theme Redirection Settings', 'Theme Activation', 'manage_options', 'wpmobile', array('DTS_Admin', 'generate_admin_settings_page'));
	# Add submenu for the theme settings
	add_submenu_page('wpmobile', 'Theme Settings', 'Theme Settings', 'manage_options', 'wpmobile-theme', array($GLOBALS['WPMOB_THEME_CLASS'], 'init_panel'));
	# Add submenu for the apps
	add_submenu_page('wpmobile', 'Apps Menu', 'Apps', 'manage_options', 'wpmobile-apps', 'wpmob_admin_apps_menu');
}

function wpmob_admin_apps_menu() {
	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}

	echo '<h1>Apps</h1>';
}
?>