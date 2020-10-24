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
		    	$do = "nothing";
		   	
		    if ($new_status === 'publish')
		    {
		    	// create resource in resourcespace
			    // Get Id of this post
			    $resource = new ResourceSpaceController();
			    $ID   			= $post->ID;
			    $post_metadata 	= get_post_meta($ID);
			    $title_field 	= $post_metadata["mediateka_title"][0]; // TODO: USE THIS TITLE TO GIVE METADATA TO THE NEW CREATED RESOURCE
			    $date 			= $post_metadata["date"] [0];
			    // $data = $resource->doSearch($meta);
			    // dd($data[0]["file_extension"]);

			    $url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
			    // $url = "https%3A%2F%2Fstage.tv.ideas-block.com%2Fwp-content%2Fuploads%2F2020%2F09%2FFFTcircle_Offset_2-01.png";
				// $url = 'https://stage.tv.ideas-block.com/wp-content/uploads/2020/09/FFTcircle_Offset_2-01.png';// with diagonals

				// TODO: HERE CHECK FIRST IF RESOURCE ALREADY EXISTS WITH THIS NAME AND EDIT THAT ONE: !!!!!!!!!!!!!!!!!!!!!!!! 
				// OR NOT? WHAT IF COVER IMAGE IS UPDATED, THAT WOULD OVERRIDE THE VIDEO IN RESOURCESPACE??????
				// ONLY IF THIS IS A REAL POST, NOT A TRANSLATION (A REVISION)
				// TODO: WHEN VISITING SINGLE, IF POST IS TRANSLATION, USER THE ID OF THE PARENT POST
				if($post->post_type === 'post')
				{
					$new_id    = $resource->createResourceWithMetadata($url, $title_field, $date, $price);
				}
			    // dd($new_id." : ".$url);
		    }
		  }
		  if ( $new_status != 'publish' ) {
		    // A function to perform action when new post published.
		    	$do = "nothing";
		    
		  }
		}

add_action(  'transition_post_status',  'on_all_status_transitions', 10, 3 );	
// remove_action( 'transition_post_status',  'on_all_status_transitions', int $priority = 10 )