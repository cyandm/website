<?php

namespace Cyan\Theme\Helpers;

class Menu {

	public static function getMenuByLocation( $location ) {

		// wordpress does not group child menu items with parent menu items
		$menuLocations = get_nav_menu_locations();
		$navbar_items = wp_get_nav_menu_items( $menuLocations[ $location ] );
		$child_items = [];

		// pull all child menu items into separate object
		foreach ( $navbar_items as $key => $item ) {
			if ( $item->menu_item_parent ) {
				array_push( $child_items, $item );
				unset( $navbar_items[ $key ] );
			}
		}

		// push child items into their parent item in the original object
		foreach ( $navbar_items as $item ) {
			foreach ( $child_items as $key => $child ) {
				if ( $child->menu_item_parent == $item->ID ) {
					if ( ! $item->child_items ) {
						$item->child_items = [];
					}

					array_push( $item->child_items, $child );
					unset( $child_items[ $key ] );
				}
			}
		}

		// return navbar object where child items are grouped with parents
		return $navbar_items;
	}

	//Only works for menu items that are posts or pages
	public static function isCurrentPageMenuItem( $menu_item ) {
		return intval( $menu_item->object_id ) === intval( get_queried_object_id() );
	}

}
