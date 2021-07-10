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

if(!defined('WPP_PLUGIN_VERSION')){
    define('WPP_PLUGIN_VERSION' , '1.0.0');
}

if(!defined('WPP_PLUGIN_DIR')){
    define('WPP_PLUGIN_DIR' , plugin_dir_url(__FILE__));
}

// WPP_PLUGIN_VERSION , WPP_PLUGIN_DIR are the constants defined to easily access
// anywhere in the file to define version and directory of plugin

// this will check that wpp_plugin_function not exist in any file,& only runs when there
// is no such function described in file

if(!function_exists('wpp_plugin_scripts')){
    function wpp_plugin_scripts(){

        //load css
        wp_enqueue_style('wpp-css',WPP_PLUGIN_DIR. 'assets/css/style.css','CSS','1.0.0',false);

        //load js
        wp_enqueue_script('wpp-js',WPP_PLUGIN_DIR. 'assets/js/index.js','jQuery','1.0.0',true);
    }

    add_action('wp_enqueue_scripts' ,'wpp_plugin_scripts');
}

//Settings Menu and Page

require plugin_dir_path( __FILE__).'inc/settings.php';