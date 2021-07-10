<?php 
//Create Table for Plugin

function wpp_like_table(){
    
    global $wpdb;

    $table_name = $wpdb->prefix . "wpp_likesystem"; 
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    time timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,
    user_id mediumint(9) NOT NULL,
    post_id mediumint(9) NOT NULL,
    like_count mediumint(9) NOT NULL,
    dislike_count mediumint(9) NOT NULL,
    PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    }