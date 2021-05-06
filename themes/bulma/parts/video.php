<?php 
	$url = get_option("youtube_link_field","https://www.youtube.com/embed/live_stream?channel=UCws-DeDqDVzDRjYD6AXzjww&enablejsapi=1");
	if($url == "" || $url == " " || $url == null){
		$url = "https://www.youtube.com/embed/live_stream?channel=UCws-DeDqDVzDRjYD6AXzjww&enablejsapi=1";
	}
?>
<div class="embed-responsive embed-responsive-16by9">
<!-- <div class="wrap1">	 -->
    <iframe 
    		class="embed-responsive-item"
    		id="player" 
            src="<?php echo($url);?>"
            allowfullscreen scrolling='no' >
    </iframe>
</div>


<script src="https://www.youtube.com/iframe_api"></script>

<!-- Detect a dead link and give another video instead -->
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/youtube_functions.js'; ?>" type="module"></script>





