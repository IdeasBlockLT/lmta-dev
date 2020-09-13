<?php

function test(WP_REST_Request $request){
    dd('stop');
    return json_response([
        'status' => 'success'
    ]);
}
