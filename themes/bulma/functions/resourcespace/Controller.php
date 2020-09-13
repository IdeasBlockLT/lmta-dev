<?php
namespace Functions\ResourceSpace;

class Controller
{

    //        parent::__construct($repositoryid, $context, $options, $readonly);
//        $this->config           = get_config('resourcespace');
//        $this->resourcespace_api_url = get_config('resourcespace', 'resourcespace_api_url');
//        $this->api_key          = get_config('resourcespace', 'api_key');
//        $this->api_user         = get_config('resourcespace', 'api_user');
//        $this->enable_help      = get_config('resourcespace', 'enable_help');
//        $this->enable_help_url  = get_config('resourcespace', 'enable_help_url');

    public $api_key;

    private function __construct()
    {
        dd(env());
//        $this->api_key =
    }
}