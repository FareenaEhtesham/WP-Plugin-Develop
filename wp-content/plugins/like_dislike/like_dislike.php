<!-- https://codex.wordpress.org/
developer.wordpress.org -->
<?php

/**
 * Plugin Name:       My Basic Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Learn basics of PLugin Development
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Fareena Ehtesham
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       basics-plugin
 * Domain Path:       /languages
 * 
*/

// By Using this function we cannot access it, Good for security reason 
if(!defined('WPINC')){
    die;
}

// WPP_PLUGIN_VERSION , WPP_PLUGIN_DIR are the constants defined to easily access
// anywhere in the file to define version and directory of plugin

if(!defined('WPP_PLUGIN_VERSION')){
    define('WPP_PLUGIN_VERSION' , '1.0.0');
}

if(!defined('WPP_PLUGIN_DIR')){
    define('WPP_PLUGIN_DIR' , plugin_dir_url(__FILE__));
}



//SCRIPTS
require plugin_dir_path( __FILE__).'inc/scripts.php';

//SETTING MENU PAGE
require plugin_dir_path( __FILE__).'inc/settings.php';

//DATABASE
require plugin_dir_path( __FILE__).'inc/DB.php';
register_activation_hook( __FILE__, 'wpp_like_table');
register_deactivation_hook( __FILE__, 'wpp_like_table' );

//BUTTONS
require plugin_dir_path( __FILE__).'inc/btn.php';

