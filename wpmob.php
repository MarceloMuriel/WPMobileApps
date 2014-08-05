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

define('WPMOB_VERSION', '1.0.0');
define('WPMOB_DIR', dirname(__FILE__));
define('WPMOB_URL', plugins_url('wpmob.php', dirname(__FILE__)));

# Include the third-party embedded plugins.
include_once ('plugins/third-party/device-theme-switcher/dts_controller.php');

# Register the embedded themes.
register_theme_directory(WPMOB_DIR . '/themes');

# Load the WPMobile class
require_once (WPMOB_DIR . '/core/class-wpmob.php');
$wpmob = new WPMobile();
$wpmob -> initialize();
?>