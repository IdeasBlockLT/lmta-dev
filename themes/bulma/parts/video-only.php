<?php

	$resource_url = get_the_author_meta( 'resource_url', 'resource_url' );
?>

<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" id="player" 
            src="<?php echo $resource_url; ?>"
            allowfullscreen>
    </iframe>
</div>





