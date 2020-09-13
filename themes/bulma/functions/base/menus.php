<?php

// register menus
function register_menu() {
    register_nav_menu('primary',__( 'Primary menu' ));
    register_nav_menu('footer',__( 'Footer menu' ));
    register_nav_menu('language',__( 'Language picker' ));
    register_nav_menu('primary-en',__( 'Primary EN' ));

//    register_nav_menu('header_menu',__( 'Header menu' ));
//    register_nav_menu('footer_menu',__( 'Footer menu' ));
//    register_nav_menu('footer_bottom_menu',__( 'Footer bottom menu' ));
}
add_action('init', 'register_menu');

// get menu items
function get_menu_items($menu_name) {

    if(($locations = get_nav_menu_locations()) && isset($locations[$menu_name])){
        $menu = wp_get_nav_menu_object($locations[$menu_name
        ]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list = [];
        foreach((array)$menu_items as $key => $menu_item){
            $object = new stdClass;
            $object->title = $menu_item->title;
            $object->url = $menu_item->url;
            $object->active = ($menu_item->object_id == get_queried_object_id()) ? true : false;

            $menu_list[] = $object;
        }
    }

    return $menu_list;
}
