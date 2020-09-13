<?php

//include 'ResourceSpaceController.php';
// endpoints & callbacks
add_action('rest_api_init', function () {
    register_rest_route('api', '/cookies-accept', array(
        'methods' => 'POST',
        'callback' => 'cookies_accepted',
    ));

    register_rest_route('api', '/search', array(
        'methods' => 'POST',
        'callback' => 'test',
//        'callback' => $this->doSearch(),
    ));

    register_rest_route('api', '/news', array(
        'methods' => 'GET',
        'callback' => 'get_news',
    ));

    register_rest_route('api', '/business/map', array(
        'methods' => 'GET',
        'callback' => 'get_business_map_api',
    ));

    register_rest_route('api', '/business/contact-form', array(
        'methods' => 'POST',
        'callback' => 'send_business_contact_form',
    ));

    register_rest_route('api', '/private/map', array(
        'methods' => 'GET',
        'callback' => 'get_private_map_api',
    ));

    register_rest_route('api', '/private/wishlist-contact-form', array(
        'methods' => 'POST',
        'callback' => 'send_wishlist_contact_form',
    ));

    register_rest_route('api', '/private/contact-form', array(
        'methods' => 'POST',
        'callback' => 'send_private_contact_form',
    ));

    register_rest_route('api', '/private/buildings', array(
        'methods' => 'GET',
        'callback' => 'get_private_buildings_api',
    ));

    register_rest_route('api', '/private/floors', array(
        'methods' => 'GET',
        'callback' => 'get_private_floors_api',
    ));

    register_rest_route('api', '/private/apartments', array(
        'methods' => 'GET',
        'callback' => 'get_private_apartments_api',
    ));

    register_rest_route('api', '/wishlist', array(
        array(
            'methods' => 'POST',
            'callback' => 'wishlist_add',
        ),
        array(
            'methods' => 'DELETE',
            'callback' => 'wishlist_remove'
        )
    ));
});
