<?php
//LIKE & DISLIKE BUTTON USING FILTER

function wpp_like_dislike_button($content){

    $like_btn = get_option('wpp_like_btn_label');
    $dislike_btn = get_option('wpp_dislike_btn_label');

    $user_id= get_current_user_id();
    $post_id= get_the_ID();

    $like_btn = '<a href="#" class="wpp-btn like_btn" 
    onclick="wpp_like_btn( '.$user_id.','.$post_id.' )">
    <i class="fas fa-thumbs-up">'.$like_btn.'</i></a>';

    $dislike_btn = '<a href="#" class="wpp-btn dislike_btn"
    onclick="wpp_dislike_btn('.$user_id.' , '.$post_id.')">
    <i class="fas fa-thumbs-down">'.$dislike_btn.'</i></a>'; 

    $wpp_ajax_response = `
    <div id="wppAjaxResponse"><span></span>
    </div>
    `
    ;

    $content .= $like_btn;
    $content .= $dislike_btn;
    $content .= $wpp_ajax_response;
    return $content;
}

add_filter( 'the_content', 'wpp_like_dislike_button');