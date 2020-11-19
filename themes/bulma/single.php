<?php
    $resource = new ResourceSpaceController();

    // Get Id of this post and find out in RS if there is an image 
    $ID    = get_the_ID();
    $meta  = get_post_meta($ID);

    if(isset($meta["mediateka_title"]))
    {
        $title         = $meta["mediateka_title"][0];
        $resource_data = $resource->doSearch($title);
    }

    $date  = isset($meta["date"])  ?  $meta["date"]  : null;
    $price = isset($meta["price"]) ?  $meta["price"] : null;

    $resource_extension =  isset($resource_data[0]["file_extension"]) ? $resource_data[0]["file_extension"] : null ;
    $resource_id        =  isset($resource_data[0]["ref"])            ? $resource_data[0]["ref"]            : null ;

    if (isset($resource_id) && isset($resource_extension))
    {
        $resource_url = $resource->getResourcePathV90($resource_id, $resource_extension);
    }

    $cover_url = wp_get_attachment_image_src( get_post_thumbnail_id( $ID ), 'single-post-thumbnail' )[0];

    $array_images = array('jpg','gif','png');
    $array_video  = array('mp4');
?>

<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size2']); ?>
<div class="container w-90 mx-auto">
    <div class="row mb-0 mb-md-5 pb-5 border-bottom">
        <div class="col-md-7 col-7 themed-grid-col mr-3">
            
            
            <!-- WOOCOMMERCE PAY FOR POST, IF USER HAS PAID OR HAS ACCESS -->
            <?php if(Woocommerce_Pay_Per_Post_Helper::has_access()): ?>
                <?php if( isset($resource_url) ) : ?>
                
                    <!-- If it is an image, show it -->
                    <?php if ( (isset($resource_extension))  && in_array($resource_extension,$array_images) ): ?>
                        <?php get_template_part('parts/image-only', null, array(   'url'   => $cover_url)  ) ?>
                    <!--If it is a video, show it    -->
                    <?php elseif( (isset($resource_extension))  && in_array($resource_extension, $array_video)) : ?>
                        <?php get_template_part('parts/video-only', null, array(   'url'   => $resource_url)  ) ?>
                    <?php endif; ?>
        
                <?php else:?>
                    <?php get_template_part('parts/image-only', null, array(   'url'   => $cover_url)  ) ?>
                <?php endif; ?>
            <?php else: ?>
                <?php get_template_part('parts/image-only', null, array(   'url'   => $cover_url)  ) ?>
            <?php endif; ?> 
            
            
            
        </div>


        <div class="col-md-4 col-4 themed-grid-col border-left">
            <div class="pb-4">
                
                <small><?php the_field('date'); ?></small>
                
                <h4>
                    <strong><?= the_title(); ?></strong>
                </h4>
                
                <br>
                
                <?php if ( (isset($resource_extension))  && in_array($resource_extension,$array_images) ): ?>
                    <br>
                    <h5>
                        <!-- <strong>This event does not have video yet.</strong> -->
                    </h5>
                    <br>
                    <br>
                <?php endif; ?> 
                  
                
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
            <h3 class="font-weight-bold">Kūrėjai / atlikėjai</h3>
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
    <?php //get_template_part('parts/banner-single') ?>
    <?php //get_template_part('parts/banner-words') ?>
</div>


<?php get_footer(); ?>
