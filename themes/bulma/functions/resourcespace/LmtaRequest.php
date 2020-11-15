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

/*
 * This function has a major flaw, which is that it is called after the metadata is saved in the status transition period.
 * This is fixed by calling do_action before using metadata
 */
function on_all_status_transitions( $new_status, $old_status, $post )       
{
	if ( $new_status != $old_status ) {
		// A function to perform actions any time any post changes status.
		// dd("O L D   S T A T U S");
		$do = "nothing";

		if ($new_status === 'publish')
		{
			// This function has to be called so that the metadata is readied
			do_action( 'save_post', $post->ID,  $post, null );

			// create resource in resourcespace
			$resource = new ResourceSpaceController();
			$ID   			= $post->ID;
			$post_metadata 	= get_post_meta($ID);
			$title_field 	= $post_metadata["mediateka_title"][0];
			$date 			= $post_metadata["streamDate"] [0];

			$url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];

			// TODO: HERE CHECK FIRST IF RESOURCE ALREADY EXISTS WITH THIS NAME AND EDIT THAT ONE: !!!!!!!!!!!!!!!!!!!!!!!! 
			// OR NOT? WHAT IF COVER IMAGE IS UPDATED, THAT WOULD OVERRIDE THE VIDEO IN RESOURCESPACE??????
			// ONLY IF THIS IS A REAL POST, NOT A TRANSLATION (A REVISION)
			// TODO: WHEN VISITING SINGLE, IF POST IS TRANSLATION, USER THE ID OF THE PARENT POST
			if($post->post_type === 'post')
			{
				//$new_id    = $resource->createResourceV90($url, $title_field, $date, $price);
				$new_id    = $resource->createResourceV90($url, $title_field, $date, null);
			}
			//dd($post_metadata);
			//dd($new_id." : ".$url." : ".$title_field." : ".$date." : ".$ID." : ".$post_metadata); 
		}
	}
	if ( $new_status != 'publish' ) {
		// A function to perform action when new post published.
		$do = "nothing";
	}
}
add_action(  'transition_post_status',  'on_all_status_transitions', 100, 3 );	
// remove_action( 'transition_post_status',  'on_all_status_transitions', 100 );
