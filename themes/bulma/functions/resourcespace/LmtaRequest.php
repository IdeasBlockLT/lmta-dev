<?php



// Class stolen from diego
class  LmtaRequest
{
	// I dont knwo what this is for
    public function pluck()
    {}

    public function __construct()
    {
        #for the variables for the api
        $this->title = "TITULO";
    }
}


function on_all_status_transitions( $new_status, $old_status, $post )       
		{
		   // dd($old_status."_".$new_status);
		   if ( $new_status != $old_status ) {
		    // A function to perform actions any time any post changes status.
		    // dd("O L D   S T A T U S");
		   	
		    if ($new_status === 'publish')
		    {
		    	// create resource in resourcespace
		    	// dd("P U B L I S H");
		    	$resource = new ResourceSpaceController();
			    // Get Id of this post and find out in RS if there is an image 
			    // $ID = get_the_ID();
			    $ID   = $post->ID;
			    // $meta = get_post_meta($ID)["mediateka_title"][0];
			    // $data = $resource->doSearch($meta);
			    // dd($data[0]["file_extension"]);
			    // $request = new LmtaRequest();
			    // dd($request->title);


			    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
			    $image_url = "https://stage.tv.ideas-block.com/wp-content/uploads/2020/09/FFTcircle_Offset_2-01.png";
			    $new_id    = $resource->createResource($image_url);

			    dd($new_id." : ".$image_url);


		    }
		  }
		  if ( $new_status != 'publish' ) {
		    // A function to perform action when new post published.
		    
		  }
		}

add_action(  'transition_post_status',  'on_all_status_transitions', 10, 3 );	