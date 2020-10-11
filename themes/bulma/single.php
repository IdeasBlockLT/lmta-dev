<?php
    $resource = new ResourceSpaceController();

    // Get Id of this post and find out in RS if there is an image 
    $ID    = get_the_ID();
    $meta  = get_post_meta($ID);

    if(isset($meta["mediateka_title"]))
    {
        $title = $meta["mediateka_title"][0];
        $resource_data      = $resource->doSearch($title);
    }

    if(isset($meta["date"]))
    {
        $date  = $meta["date"][0];
    }
    

    if(isset($resource_data[0]))
    {
        $resource_extension = $resource_data[0]["file_extension"];
        $resource_id        = $resource_data[0]["ref"];
        $resource_url       = $resource->getResourcePath($resource_id, $resource_extension);

        // set_query_var( 'resource_url', $resource_url);
    }

    $cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $ID ), 'single-post-thumbnail' )[0];

    $array_images = array('jpg','gif','png');
    $array_video  = array('mp4');


?>

<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner') ?>
<div class="container w-90 mx-auto">
    <div class="row mb-0 mb-md-5 pb-5 border-bottom">
        <div class="col-md-7 col-7 themed-grid-col mr-3">

            <?php get_template_part('parts/video-only', null, array(   'url'   => $resource_url)  ) ?>

            <!-- If we have image extension, we have only image on the resource -->
            <?php if ( (isset($resource_extension))  && in_array($resource_extension,$array_images) ): ?>

                <script>
                    alert("ok, don't pay for the video");
                </script>

            <?php elseif( (isset($resource_extension))  && in_array($resource_extension, $array_video)) : ?>

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



        </div>
        <div class="col-md-4 col-4 themed-grid-col border-left">
            <div class="pb-4">
                <small><?php the_field('date'); ?></small>
                <h4>
                    <strong><?= the_title(); ?></strong>
                </h4>
                <button type="button" class="btn btn-buy">Mokėti</button>
            </div>
        </div>
    </div>
    <div class="row mb-5 pb-5 mt-5 pt-3 border-bottom">
        <div class="columncontent__single p-2">
            <?php the_content(); ?>
        </div>
    </div>
    <div class="row mt-5 pt-3">
        <div class="col border-right">
            <h3 class="font-weight-bold">Kurejai / atlikejai</h3>
            <div>
                <?php if (get_field('atlikejai')): ?>
                    <?php the_field('atlikejai') ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="col">
            <h3 class="font-weight-bold">Programa</h3>
            <?php if (get_field('programa')): ?>
                <?php the_field('programa') ?>
            <?php endif; ?>
        </div>
    </div>
    <?php get_template_part('parts/banner-single') ?>
    <?php get_template_part('parts/banner-words') ?>
</div>


<?php get_footer(); ?>
