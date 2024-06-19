<?php

/**
 * Summary of cyn_get_url_by_page_template
 * @param string $page_template
 * @return bool|string
 */
function cyn_get_url_by_page_template($page_template)
{
	$query = new WP_Query([
		'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => 'templates/' . $page_template . '.php'
	]);

	$post_id = $query->posts[0]->ID;
	$url = get_permalink($post_id);

	return $url;
}
function cyn_verify_nonce($nonce)
{
	if (!wp_verify_nonce($nonce, 'wp_rest'))
		return wp_send_json_error(['verify_nonce' => false], 403);
}
function convert_date_for_human($id, $post_type = 'post')
{

	if ('comment' === $post_type) {
		return human_time_diff(get_comment_date('U', $id), current_time('U')) . ' ' . __('پیش', 'cyn-dm');
	}

	return human_time_diff(
		get_the_time('U', $id),
		current_time('U')
	)
		. ' ' . __('پیش', 'cyn-dm');
}
function cyn_get_card($name, $args = [])
{
    get_template_part('/partials/cards/' . $name, null, $args);
}

 function is_user_likes_this_post( $id, $postsUserLiked ) {

	// if ( ! in_array( $id, $postsUserLiked ) ) {
	// 	return false;
	// }

	return $postsUserLiked[ $id ];
}


