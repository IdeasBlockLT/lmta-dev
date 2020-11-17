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
 *  A function to perform actions any time any post changes status.
 */
function on_all_status_transitions( $new_status, $old_status, $post )       
{
   if ( $new_status != $old_status ) {
    	
	    if ($new_status === 'publish')
	    {
			// This function has to be called so that the metadata is readied
			do_action( 'save_post', $post->ID,  $post, null );

	    	// create resource in resourcespace
		    $resource = new ResourceSpaceController();
		    $ID   			= $post->ID;
		    $post_metadata 	= get_post_meta($ID);
		    $title_field 	= $post_metadata["mediateka_title"][0];
		    $date 			= $post_metadata["date"] [0];

		    $url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];

			// HERE CHECK FIRST IF RESOURCE ALREADY EXISTS WITH THIS TODO:(if yes, find resourcein resourcespace, get its id and update metadata fields)
			// This covers the case when this post is a translation. 
			// USER WILL HAVE TO SAVE TO DRAFT FIRST, CONDITION BY DESIGN. 
			$args = array(
			   'meta_query' => array(
				   array(
					   'key' => 'mediateka_title',
					   'value' => $title_field,
					   'compare' => '=',
				   )
			   )
			);
			$query_posts = get_posts($args);
// 			dd(count($query_posts).":".$title_field);
			if( ($post->post_type === 'post') && (count($query_posts)<=1) )
			{
				$new_id    = $resource->createResourceV90($url, $title_field, $date, $price);
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