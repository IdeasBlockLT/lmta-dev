<?php

include 'config.php';


class ResourceSpaceController
{
    private $config;
    private $resourcespace;
    private $resourcespaceUrl;
    private $apiKey;
    private $apiUser;
    private $query;

    public function __construct()
    {
        $this->config = include('config.php');
        $this->resourcespaceUrl = $this->config['resourcespace_url'];
        $this->apiKey           = $this->config['api_key'];
        $this->apiUser          = $this->config['api_user'];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getResourcePath($id)
    {
        $this->query = "user=" . $this->apiUser . '&function=get_resource_path&param1=' . $id . '&param2=true&param3=true&param4=true&param7=true';
        return $this->runBaby();
    }

    /**
     * Get previews
     * @param $keyword
     * @param bool $resourceType
     * @return mixed
     */
    public function getPreviews($keyword, $resourceType = false)
    {
        #param1 = resourceId, param8 = thumbnail and screen sized previews
        if (!$resourceType) {
            $this->query = "user=" . $this->apiUser . "&function=search_get_previews&param1='" . $keyword . "'&param8=thm,scr";
            return $this->runBaby();
        }
        $this->query = "user=" . $this->apiUser . "&function=search_get_previews&param1='" . $keyword . "'&param2=" . $resourceType . "&param8=thm,scr";
        return $this->runBaby();
    }

    #Information about the resource itself - width, height...
    public function getResourceData($id)
    {
        $this->query = "user=" . $this->apiUser . "&function=get_resource_data&param1=" . $id . "";
        return $this->runBaby();
    }

    /**
     * Provides all the information showing in the individual resource panel
     * @param $id
     * @return mixed
     */
    public function getResourceFieldData($id)
    {
        $this->query = "user=" . $this->apiUser . "&function=get_resource_field_data&param1=" . $id . "";
        return $this->runBaby();
    }

    /**
     * Get all uploaded and generated media
     * First result is the original
     * Rest are images created for preview uses
     * @param $id
     * @return mixed
     */
    public function getResourceAllImageSizes($id, $original = false)
    {
        if (!$original) {
            $this->query = "user=" . $this->apiUser . "&function=get_resource_all_image_sizes&resource=" . $id . "";
            return $this->runBaby();
        }
        $this->query = "user=" . $this->apiUser . "&function=get_resource_all_image_sizes&resource=" . $id . "";
        $response = $this->runBaby();

        return $response[0]['url'];
    }

    public function createResource($image_url)
    {
//        $query="user=" . $this->apiUser . "&function=create_resource&resource_type=5&param7=" . urlencode(json_encode(array(1=>"Foo",8=>"Bar"))); # <--- The function to execute, and parameters
        $query="user=" . $this->apiUser . "&function=create_resource&resource_type=5&archive=0&url=".$image_url;
        dd($query);
        $response = $this->runBaby();
        return $response;
    }

    /**
     * Taking the video for the index cover
     * @param $id
     * @return mixed
     */
    public
    function coverVideo($id, $link = false)
    {
        if (!$link) {
            $this->query = "user=" . $this->apiUser . "&function=get_resource_all_image_sizes&resource=" . $id . "";
            $response = $this->runBaby();
            return $response[0]['url'];
        }
        return $link;
    }

    /*
     * Gives the same result as getPreviews but without preview images
     */
    public function doSearch($keyword)
    {
        #check if this if for mediateka

        $this->query = $query = "user=" . $this->apiUser . "&function=do_search&param1='" . $keyword . "'";
        return $this->runBaby();
    }


    public function runBaby()
    {
        # Sign the query using the private key
        $sign = hash("sha256", $this->apiKey . $this->query);

        # Make the request.
        $list = [];
        $data = file_get_contents($this->resourcespaceUrl . $this->query . "&sign=" . $sign);
        $response = json_decode($data, true);
        return $response;
    }

    public function power()
    {

//        $query="user=" . $this->apiUser . "&function=create_resource&param1=1";
//        $results=file_get_contents($this->resourcespaceUrl . $query . "&sign=" . $sign);
        # Make the request.
# Some example function calls.
#
        $user = $this->apiUser;
        # <--- The function to execute, and parameters
//$query="iiff/363792/manifest/user=" . $user . "&function=get_resource_path&param1=1001&param2=false&param3=true"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=get_user_collections"; # <--- The function to execute, and parameters
//        $query="user=" . $user . "&function=search_get_previews&search=trevio&restypes=1%2C2%2C3%2C4";
//        $query="user=" . $user . "&function=get_user_collections";
//        $query="user=" . $user . "&function=search_public_collections&search=";
//        $query="user=" . $user . "&function=get_resource_field_data&param1=1"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=create_resource&param1=get_resource_path1"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=create_collection&param1=1"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=get_user_collections&param1=1001"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=update_field&param1=1&param2=8&param3=Example"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=delete_resource&param1=1"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=copy_resource&param1=2"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=get_resource_data&param1=1010"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=get_alternative_files&param1=2"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=get_resource_types"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=add_alternative_file&param1=2&param2=Test"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=get_resource_log&param1=2"; # <--- The function to execute, and parameters
//$query="user=" . $user . "&function=upload_file_by_url&param1=2&param2=&param3=&param4=&param5=" . urlencode("http://www.montala.com/img/slideshow/montala-bg.jpg"); # <--- The function to execute, and parameters
# Create resource, add a file and add metadata in one pass.
//        $query="user=" . $user . "&function=create_resource&param1=1&param2=&param3=" . urlencode("http://www.montala.com/img/slideshow/montala-bg.jpg") . "&param4=&param5=&param6=&param7=" . urlencode(json_encode(array(1=>"Foo",8=>"Bar"))); # <--- The function to execute, and parameters

# Sign the query using the private key
        $sign = hash("sha256", $this->apiKey . $query);

# Make the request.
        $list = [];
        $results = file_get_contents($this->resourcespaceUrl . $query . "&sign=" . $sign);
        $results2 = json_decode($results, true);
        dd($results2);

# Output the JSON
//        echo "<pre>";
//        echo json_encode(json_decode($results, true));
//        echo htmlspecialchars($results);
    }

    /**
     * @param string $method
     * @param $queryData
     */
    public function makeApiRequest($method = 'get_user_collections', $queryData = '[]')
    {
        $query = "user=" . $this->apiUser . "&function=get_user_collections";
//        $sign=hash("sha256",$this->apiKey . $query);
//        $handle = curl_int();
        $curl = curl_init();
        $i = '123456';
        curl_setopt_array(
            $curl,
            array(
//                CURLOPT_URL => $this->resourcespaceUrl,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $query,
                CURLOPT_RETURNTRANSFER => true,
            )
        );

        $response = curl_exec($curl);

//This if statement doesnot work
        if ($response == 1) {
            echo 'Password is ' . $i;
        }


        curl_close($curl);
        die();

//        echo file_get_contents($this->resourcespaceUrl . $query . "&sign=" . $sign);
        // Formulate the API query data.
        $data = array(
            'user' => $this->apiUser,
            'function' => $method,
        );
        $query = http_build_query($data);

//        dd($query);
//        $query = http_build_query($queryData, '', '&');
        // Sign the request with the private key.
        $sign = hash("sha256", $this->apiKey . $query);
        $data['sign'] = $sign;
        $postdata = array();
        $postdata['query'] = http_build_query($data);;
        $postdata['sign'] = $sign;
        $postdata['user'] = $this->apiUser;
//
//        dd($this->resourcespaceUrl);
        $curl = curl_init($this->resourcespaceUrl);
//        dd($curl);
        curl_setopt($curl, CURLOPT_HEADER, "Content-Type:application/x-www-form-urlencoded");
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $head = curl_exec($curl);

    }

    public
    function getAll()
    {

    }
}
