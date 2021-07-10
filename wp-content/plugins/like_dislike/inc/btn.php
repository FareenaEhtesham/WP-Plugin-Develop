<?php
//LIKE & DISLIKE BUTTON USING FILTER

function wpp_like_dislike_button($content){

    $like_btn = '<a href="#" class="wpp-btn like_btn"><i class="fas fa-thumbs-up"></i></a>';
    $dislike_btn = '<a href="#" class="wpp-btn dislike_btn"><i class="fas fa-thumbs-down"></i></a>';

    $content .= $like_btn;
    $content .= $dislike_btn;

    return $content;
}

add_filter( 'the_title', 'wpp_like_dislike_button');