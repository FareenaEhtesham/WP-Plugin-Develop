
function wpp_like_btn(userID ,postID){

    // alert("Like Button Clicked");
    var user_id =userID
    var post_id = postID
    jQuery.ajax({
		url : wpp_ajax_object.ajaxurl,
		type : 'post',
		data : {
			action : 'wpp_like_btn_store',
            uid : user_id,
			pid : post_id
		},
		success : function( response ) {
            jQuery("#wppAjaxResponse span").html(response);
		}
	});
}

function wpp_dislike_btn(userID ,postID){

    // alert("Dislike Button Clicked");

    var user_id =userID
    var post_id = postID
    jQuery.ajax({
		url : wpp_ajax_object.ajaxurl,
		type : 'post',
		data : {
			action : 'wpp_dislike_btn_store',
            uid : user_id,
			pid : post_id
		},
		success : function( response ) {
            jQuery("#wppAjaxResponse span").html(response);
		}
	});
}