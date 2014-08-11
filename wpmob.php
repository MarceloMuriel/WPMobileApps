<?php
/*
 Plugin Name: WPMobile Apps
 Plugin URI: http://www.wp-tmobile.com
 Version: 1.0
 Description: Create a mobile WordPress website experience on your website.
 Author: SysCrunch
 Author URI: http://www.syscrunch.com/
 Text Domain: wpmob
 Domain Path: /lang
 License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 Trademark:
 */
 
ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

define('WPMOB_VERSION', '1.0.0');
define('WPMOB_DIR', dirname(__FILE__));
define('WPMOB_URL', plugins_url('', __FILE__));

/*
 * Currently there is a single Theme.
 * In the future, all the themes shall be scanned directly from the /themes folder
 * in this plugin.
 *
 * These constants and variables are defined to handle the theme.
 */
define('WPMOB_THEME_DIR', WPMOB_DIR . '/themes/mobilissimo');
define('WPMOB_THEME_URL', plugins_url('themes/mobilissimo', __FILE__));
define('WPMOB_THEME_BASE_CLASS_PATH', WPMOB_DIR . '/core/theme/class-wpmob-theme.php');
$GLOBALS['WPMOB_THEME_CLASS'] = 'WPMobilissimo';
define('WPMOB_THEME_CLASS_PATH', WPMOB_DIR . '/core/theme/class-wpmob-mobilissimo.php');
# Default theme settings
define('WPMOB_DEFAULT_THEME_NAME', 'Mobilissimo');
define('WPMOB_DEFAULT_THEME_TEMPLATE', 'mobilissimo');
define('WPMOB_DEFAULT_THEME_CSS', 'mobilissimo');

# Include the third-party embedded plugins.
include_once ('plugins/third-party/device-theme-switcher/dts_controller.php');

# Register the embedded themes.
register_theme_directory(WPMOB_DIR . '/themes');

# Load the WPMobile class
require_once (WPMOB_DIR . '/core/class-wpmob.php');
$wpmob = new WPMobile();

# Activation hook for plugin initialization
register_activation_hook( __FILE__,  array($wpmob, 'on_activation'));
register_deactivation_hook( __FILE__, array($wpmob, 'on_deactivation'));
register_uninstall_hook( __FILE__, array('WPMobile', 'on_uninstall'));
# Setup filters or plugin overrides.
add_action('plugins_loaded', array($wpmob, 'plugins_loaded'));
# Add custom action buttons in the plugin list
add_filter('plugin_action_links', array($wpmob, 'addCustomActionLinks'), 10, 2);
# Initialize immediately the plugin
$wpmob -> initialize();
?>