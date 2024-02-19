<?php

/**
 * Summary of cyn_get_url_by_page_template
 * @param string $page_template
 * @return bool|string
 */
function cyn_get_url_by_page_template( $page_template ) {
	$query = new WP_Query( [ 
		'post_type' => 'page',
		'meta_key' => '_wp_page_template',
		'meta_value' => 'templates/' . $page_template . '.php'
	] );

	$post_id = $query->posts[0]->ID;
	$url = get_permalink( $post_id );

	return $url;
}