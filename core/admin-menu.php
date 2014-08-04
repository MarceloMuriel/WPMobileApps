<?php
#include(WPMOB_DIR . '/plugins/third-party/device-theme-switcher/inc/class.core.php');
#include(WPMOB_DIR . '/plugins/third-party/device-theme-switcher/inc/class.wp-admin.php');

function wpmob_admin_build_menu() {
	# Main menu for the plugin settings.
	add_menu_page('WPMobile Apps Settings', 'WPMobile', 'manage_options', 'wpmobile', 'wpmob_admin_menu', plugins_url('/assets/icon.png', dirname(__FILE__)));
	# Add submenu for the settings
	add_submenu_page('wpmobile', 'WPMobile Settings', 'Settings', 'manage_options', 'wpmobile', 'wpmob_admin_menu');
	# Add submenu for the apps
	add_submenu_page('wpmobile', 'Apps Menu', 'Apps', 'manage_options', 'wpmobile-apps', 'wpmob_admin_apps_menu');
	# Add submenu page for the device-theme-switcher plugin settings.
	add_submenu_page('wpmobile', 'Theme Redirection Settings', 'Theme Redirection', 'manage_options', 'wpmobile-redirection', array('DTS_Admin', 'generate_admin_settings_page'));
}

function wpmob_admin_menu() {
	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}
	echo '<h1>Settings</h1>';
}

function wpmob_admin_apps_menu() {
	if (!current_user_can('manage_options')) {
		wp_die(__('You do not have sufficient permissions to access this page.'));
	}

	echo '<h1>Apps</h1>';
}
?>