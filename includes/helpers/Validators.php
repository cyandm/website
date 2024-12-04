<?php

namespace Cyan\Theme\Helpers;


class Validators {

	public static function postType( $post_type ) {
		switch ( $post_type ) {
			case 'post':
			case 'page':
				return $post_type;
			default:
				wp_die( 'Post type not found' );
		}
	}

	public static function taxonomy( $taxonomy ) {
		switch ( $taxonomy ) {
			case 'category':
			case 'post_tag':
				return $taxonomy;
			default:
				wp_die( 'Taxonomy not found' );
		}
	}

	public static function menu( $menu ) {
		switch ( $menu ) {
			case 'header-menu':
			case 'footer-menu':
			case 'mobile-menu':
				return $menu;
			default:
				wp_die( 'menu is not found' );
		}
	}

	public static function page( $page ) {
		if ( get_page_by_path( $page ) ) {
			return $page;
		}

		wp_die( 'Page not found' );
	}

	public static function term( $term ) {
		if ( get_term_by( 'slug', $term, 'category' ) ) {
			return $term;
		}

		wp_die( 'Term not found' );
	}

}
