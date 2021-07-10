<?php
//THis is the function which return a page when Like/Dislike PLugin called
function wpp_plugin_page_html(){

    if(!is_admin()){
        return;
    }
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // output security fields for the register_setting($option_group)
        settings_fields( 'like-dislike' );
        // output setting sections and their fields
        //do_settings_sections(page slug)
        do_settings_sections( 'like-dislike' );
        // output save settings button
        submit_button( __( 'Save Changes' ) );
        ?>
      </form>
    </div>
    <?php

}

function wpp_sub_plugin_page_html(){
}

function register_menu_submenu(){
    // position start with 2
    add_menu_page( 'WP Like/Dislike System', 'Like/Dislike', 'manage_options',
    'like-dislike', 'wpp_plugin_page_html', 'dashicons-thumbs-up', 7 );

    add_submenu_page(
        'like-dislike',
        'Sub Menu',
        'Sub Menu',
        'manage_options',
        'sub-menu',
        'wpp_sub_plugin_page_html'
    );
}

add_action( 'admin_menu', 'register_menu_submenu');

//page slug(defined in add_menu_page) == option group(defined in register_setting) ==
// page(defined in add_settings_section)

function wpp_plugin_setting(){

    register_setting('like-dislike','wpp_like_btn_label');
    register_setting('like-dislike','wpp_dislike_btn_label');

    add_settings_section('wpp_settings_section','WPP Button Labels', 
    'wpp_plugin_setting_section_cb','like-dislike');

    //for Like button
    add_settings_field('wpp_like_label_field', 'Like Button Label',
    'wpp_like_label_field_cb', 'like-dislike' ,'wpp_settings_section' );

    //for Dislike button
    add_settings_field('wpp_dislike_label_field', 'Dislike Button Label',
    'wpp_disike_label_field_cb', 'like-dislike' ,'wpp_settings_section' );

}

add_action('admin_init' , 'wpp_plugin_setting');

function wpp_plugin_setting_section_cb(){
    echo "<p> Page appears </p>";
}

function wpp_like_label_field_cb(){

    // get the value of the setting we've registered with register_setting()
    $setting = get_option('wpp_like_btn_label');
    // output the field
    ?>
    <input type="text" name="wpp_like_btn_label" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}

function wpp_disike_label_field_cb(){
       
    $setting = get_option('wpp_dislike_btn_label');
    // output the field
    ?>
    <input type="text" name="wpp_dislike_btn_label" value="<?php echo isset( $setting ) ? esc_attr( $setting ) : ''; ?>">
    <?php
}