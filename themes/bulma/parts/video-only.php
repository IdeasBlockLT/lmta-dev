

<!-- If we have image extension, we have only image on the resource -->
<?php if ( (isset($resource_extension))  && in_array($resource_extension,$array_images) ): ?>

	<div class="embed-responsive embed-responsive-16by9">
	    <iframe class="embed-responsive-item" id="player" 
	            src="<?php echo $cover_url; ?>"
	            allowfullscreen>
	    </iframe>
	</div>
	<script>
		alert("ok, don't pay for the video");
	</script>

<?php elseif( (isset($resource_extension))  && in_array($resource_extension, $array_video)) : ?>

    <div class="embed-responsive embed-responsive-16by9">
	    <iframe class="embed-responsive-item" id="player" 
	            src="<?php echo $resource_url; ?>"
	            allowfullscreen>
	    </iframe>
	</div>

	<script>
		alert("pay for the video");
	</script>

<?php else:?>

	<div class="embed-responsive embed-responsive-16by9">
	    <iframe class="embed-responsive-item" id="player" 
	            src="<?php bloginfo('stylesheet_directory') ?>/images/jpeg.jpg"
	            allowfullscreen>
	    </iframe>
	</div>

<?php endif; ?>



