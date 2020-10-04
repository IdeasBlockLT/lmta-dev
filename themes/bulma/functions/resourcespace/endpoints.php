<?php

// endpoints & callbacks
add_action('rest_api_init', function () {
    register_rest_route('api', '/search', array(
        'methods' => 'POST',
        'callback' => 'search',
    ));
});
