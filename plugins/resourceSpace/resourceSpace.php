<?php
/**
 * Plugin Name: ResourceSpace - LMTA
 * Description: Custom plugin to display LMTA resourcespace media.
 * Version: 1.0
 * Author: Your Name
 * License: GPLv2 or later
 * Text Domain: ResourceSpace
 */

defined('ABSPATH') or die(''); //Block access to plugin files
include 'config.php';
include 'includes.php';

/**
 * Class MyGithub
 */
class MyResourceSpace
{
    private $test;
    private $apiKey;
    private $apiUser;
    private $resourcespaceApiUrl;
    private $method;

//    private $

    /**
     * MyGithub constructor.
     */
    public function __construct()
    {
        $this->test = RESOURCESPACE;
        $this->apiKey = API_KEY;
        $this->apiUser = API_USER;
        $this->resourcespaceApiUrl = RESOURCESPACE_URL;
    }


    public function PluginMenu()
    {
        $this->my_plugin_screen_name = add_menu_page(
            'ResourceSpace-LMTA',
            'ResourceSpace-LMTA',
            'manage_options',
            __FILE__,
            array($this, 'RenderPage'),
            plugins_url( 'resourceSpace/images/custom-logo.png',
            76)
        );
    }

    public function RenderPage(){
        ?>
        <div class='wrap'>
            <h2></h2>
        </div>
        <?php
    }

    public function InitPlugin()
    {
        add_action('admin_menu', array($this, 'PluginMenu'));
    }


    /**
     * @param $method
     * @param $queryData
     * @return mixed
     */
    public function makeApiRequest($method, $queryData)
    {
        // Formulate the API query data.
        $data = array(
            'user' => $this->apiUser,
            'function' => 'do_search',
            'param1' => '1001',
            'param2' => '1,2',
            'param3' => 'date',
            'param4' => '0',
            'param5' => '4',
            'param6' => ''
        );
        $query = http_build_query($data);
//        $query = http_build_query($queryData, '', '&');
        // Sign the request with the private key.
        $sign = hash("sha256", $this->apiKey . $query);
        $data['sign'] = $sign;
        $postdata = array();
        $postdata['query'] = http_build_query($data);;
        $postdata['sign'] = $sign;
        $postdata['user'] = $this->apiUser;

        $curl = curl_init($this->resourcespaceApiUrl);
        curl_setopt($curl, CURLOPT_HEADER, "Content-Type:application/x-www-form-urlencoded");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $head = curl_exec($curl);
//        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//        curl_close($curl);
        dd($head);
    }
}

$MyPlugin = new MyResourceSpace();
$MyPlugin->InitPlugin();

;
//
//$oop = new MyGithub();
//$oop->makeApiRequest('get_resource_data', array(
//    'resource' => '1001',
////    'getfilepath' => false,
////    'archive' => 0
//    // 'param2' => 'c.name',
//));


// Register the menu.
add_action("admin_menu", "gh_plugin_menu_func");
function gh_plugin_menu_func()
{
    add_submenu_page("options-general.php",  // Which menu parent
        "GitHub",            // Page title
        "GitHub",            // Menu title
        "manage_options",       // Minimum capability (manage_options is an easy way to target administrators)
        "github",            // Menu slug
        "gh_plugin_options"     // Callback that prints the markup
    );
}

// Print the markup for the page
function gh_plugin_options()
{

    if (!current_user_can("manage_options")) {
        wp_die(__("You do not have sufficient permissions to access this page."));
    }

    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        ?>
        <div id="message" class="updated notice is-dismissible">
            <p><?php _e("Settings updated!", "github-api"); ?></p>
            <button type="button" class="notice-dismiss">
                <span class="screen-reader-text"><?php _e("Dismiss this notice.", "github-api"); ?></span>
            </button>
        </div>
        <?php
    }

    ?>
    <form method="post" action="<?php echo admin_url('admin-post.php'); ?>">

        <input type="hidden" name="action" value="update_github_settings"/>

        <h3><?php _e("Github Repository Info", "github-api"); ?></h3>
        <p>
            <label><?php _e("Github Organization:", "github-api"); ?></label>
            <input class="" type="text" name="gh_org" value="<?php echo get_option('gh_org'); ?>"/>
        </p>

        <p>
            <label><?php _e("Github repository (slug):", "github-api"); ?></label>
            <input class="" type="text" name="gh_repo" value="<?php echo get_option('gh_repo'); ?>"/>
        </p>

        <input class="button button-primary" type="submit" value="<?php _e("Save", "github-api"); ?>"/>

    </form>

    <?php

}
