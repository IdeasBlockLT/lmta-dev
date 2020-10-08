<?php
    $resource = new ResourceSpaceController();

    // Get Id of this post and find out in RS if there is an image 
    $ID    = get_the_ID();
    $meta  = get_post_meta($ID);
    $title = $meta["mediateka_title"][0];
    $date  = $meta["date"][0];

    $resource_data      = $resource->doSearch($title);
	$resource_extension = $resource_data[0]["file_extension"];

	$array_images = array('jpg','gif','png');
	$array_video  = array('mp4');

	$url = wp_get_attachment_image_src( get_post_thumbnail_id( $ID ), 'single-post-thumbnail' )[0];

?>

<!-- If we have image extension, we have only image on the resource -->
<?php if (in_array($resource_extension,$array_images)): ?>

	<div class="embed-responsive embed-responsive-16by9">
	    <iframe class="embed-responsive-item" id="player" 
	            src="<?php echo $url; ?>"
	            allowfullscreen>
	    </iframe>
	</div>
	<script>
		alert("ok, don't pay for the video");
	</script>

<?php elseif(in_array($resource_extension, $array_video)) : ?>

    <div class="embed-responsive embed-responsive-16by9">
	    <iframe class="embed-responsive-item" id="player" 
	            src="https://www.youtube.com/embed/live_stream?channel=UCws-DeDqDVzDRjYD6AXzjww&enablejsapi=1"
	            allowfullscreen>
	    </iframe>
	</div>

	<script>
		alert("pay for the video");
	</script>

<?php endif; ?>



