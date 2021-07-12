<?php

// this will check that wpp_plugin_scripts not exist in any file,& only runs when there
// is no such function described in file

if(!function_exists('wpp_plugin_scripts')){
    function wpp_plugin_scripts(){

        //load css
        wp_enqueue_style('wpp-css',WPP_PLUGIN_DIR. 'assets/css/style.css','CSS','1.0.0',false);

        //load js
        wp_enqueue_script('wpp-js',WPP_PLUGIN_DIR. 'assets/js/index.js','jQuery','1.0.0',true);
        
        //load ajax
        wp_enqueue_script('wpp-ajax',WPP_PLUGIN_DIR. 'assets/js/ajax.js','jQuery');
        wp_localize_script( 'wpp-ajax', 'wpp_ajax_object',
        array( 
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
        )
        );
        wp_enqueue_script('jquery'); // solve the error jQuery not defined

        //Font Awesome
        wp_enqueue_style( 'wpac-font-awesome', WPP_PLUGIN_DIR. 'assets/font-awesome/css/fontawesome-all.min.css', array(), NULL);
        
    }

    add_action('wp_enqueue_scripts' ,'wpp_plugin_scripts');
}