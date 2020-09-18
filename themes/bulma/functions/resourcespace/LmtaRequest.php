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

        function on_all_status_transitions( $new_status, $old_status, $post )       
		{
		   // dd($old_status."_".$new_status);
		   if ( $new_status != $old_status ) {
		    // A function to perform actions any time any post changes status.
		    // dd("O L D   S T A T U S");
		   	
		    if ($new_status === 'publish')
		    {
		    	// create resource in resourcespace
		    	dd("P U B L I S H");
		    }
		  }
		  if ( $new_status != 'publish' ) {
		    // A function to perform action when new post published.
		    
		  }
		}

		add_action(  'transition_post_status',  'on_all_status_transitions', 10, 3 );	
    }


}