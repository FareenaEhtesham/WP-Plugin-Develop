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

add_action( 'wp_ajax_wpp_like_btn_store' ,'wpp_like_btn_store' );
add_action( 'wp_ajax_nopriv_wpp_like_btn_store' ,'wpp_like_btn_store' );// nopriv for non authenticated users

add_action( 'wp_ajax_wpp_dislike_btn_store' ,'wpp_dislike_btn_store' );
add_action( 'wp_ajax_nopriv_wpp_dislikelike_btn' ,'wpp_dislike_btn_store' );// nopriv for non authenticated users

function wpp_like_btn_store(){

    global $wpdb;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $table_name = $wpdb->prefix . "wpp_likesystem";
    if(isset($_POST['pid']) && isset($_POST['uid'])) {

        $user_id = $_POST['uid'];
        $post_id = $_POST['pid'];

        $check_like = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE user_id='$user_id' AND post_id='$post_id' AND like_count=1 " );

        if($check_like > 0) {
            ?>
            <script>
            alert "Sorry, buyt you already liked this post!";
            </script>
            <?php
        }
        else {
            $wpdb->insert( 
                ''.$table_name.'', 
                array( 
                    'post_id' => $_POST['pid'], 
                    'user_id' => $_POST['uid'],
                    'like_count' => 1
                ), 
                array( 
                    '%d', 
                    '%d',
                    '%d'
                )
            );
            if($wpdb->insert_id) {
                echo "Thank you for loving this post!";
            }
        }
        
    }
    wp_die();
}

function wpp_dislike_btn_store(){
    global $wpdb;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    $table_name = $wpdb->prefix . "wpp_likesystem";
    if(isset($_POST['pid']) && isset($_POST['uid'])) {

        $user_id = $_POST['uid'];
        $post_id = $_POST['pid'];

        $check_like = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE user_id='$user_id' AND post_id='$post_id' AND like_count=1 " );

        if($check_like > 0) {
            ?>
            <script>
            alert "Sorry, buyt you already liked this post!";
            </script>
            <?php
        }
        else {
            $wpdb->insert( 
                ''.$table_name.'', 
                array( 
                    'post_id' => $_POST['pid'], 
                    'user_id' => $_POST['uid'],
                    'dislike_count' => 1
                ), 
                array( 
                    '%d', 
                    '%d',
                    '%d'
                )
            );
            if($wpdb->insert_id) {
                echo "Thank you for loving this post!";
            }
        }
        
    }
    wp_die();
}