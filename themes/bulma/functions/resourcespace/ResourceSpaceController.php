<?php

class ResourceSpaceController
{
    private $config;
    private $resourcespaceUrl;
    private $apiKey;
    private $apiUser;
    private $query;

    public function __construct()
    {
        $this->config = include('config.lmta.php');
        $this->resourcespaceUrl = $this->config['resourcespace_url'];
        $this->apiKey           = $this->config['api_key'];
        $this->apiUser          = $this->config['api_user'];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getResourcePathV90($id, $extension = null)
    {
        $this->query =  "user=" . $this->apiUser . 
                        '&function=get_resource_path'.
                        '&param1=' . $id . 
                        '&param2=false'.
                        '&param5='.$extension;
        $response = $this->runBaby();
        $response = str_replace("http","https",$response);
        return $response;
        // return $this->runBaby();
    }

    /**
     * For version 9.0 where the params must be given with the "param" word
     * @param $id
     * @return mixed
     */
    public function getResourcePath($id, $extension = null)
    {
        $this->query = "user=" . $this->apiUser . '&function=get_resource_path&ref=' . $id . '&getfilepath=false&extension='.$extension;
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

    public function createResourceV90($image_url, $title, $date, $price) 
    {

        $this->query    ="user=" . $this->apiUser . "&function=create_resource".
                        "&param1=5".
                        "&param2=0".
                        "&param3=".urlencode($image_url). 
                        "&param4=".
                        "&param5=".
                        "&param6=".
                        "&param7=". 
                        urlencode(json_encode(array(18=>$date,
                                                    8 =>$title,
                                                    10=>$price,
                                                    12=>$date))); # <--- The function to execute, and parameters
        $response = $this->runBaby();
        return $response;   
    }

    /**
     * Create a new resource with title, date and image
     * @param $image_url = the url of the cover image in the post to upload to resourcespace
     * @param $title     = the 'custom field' from the post with the post title to be saved in resourcespace
     * @param $date      = the date of the concert corresponding to this post.
     * @return mixed
     */
    public function createResourceWithMetadata($image_url, $title, $date, $price)
    {
        $this->query    ="user=" . $this->apiUser . "&function=create_resource&resource_type=5&archive=0&url=". 
                        urlencode($image_url) . 
                        "&metadata=" . 
                        urlencode(json_encode(array(18=>$date,
                                                    8 =>$title,
                                                    10=>$price,
                                                    12=>$date))); # <--- The function to execute, and parameters
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

        $this->query = $query = "user=" . $this->apiUser . "&function=do_search&param1='" . urlencode($keyword) . "'";
        return $this->runBaby();
    }


    public function runBaby()
    {
        # Sign the query using the private key
        $sign = hash("sha256", $this->apiKey . $this->query);

        # Make the request.
        $list     = [];
        $request  = $this->resourcespaceUrl . $this->query . "&sign=" . $sign;
        $data     = file_get_contents($request);
        $response = json_decode($data, true);
        // dd("<pre>".$request."</pre>");
        // return $this->resourcespaceUrl . $this->query . "&sign=" . $sign;
        return $response;
    }

}
