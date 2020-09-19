<?php
    $resource_controller = new ResourceSpaceController();

    // Get Id of this post and find out in RS if there is an image 
    $ID = get_the_ID();
    $meta = get_post_meta($ID)["mediateka_title"][0];
    // $data = $resource_controller->doSearch($meta);

    $data = $resource_controller->doSearch("rast");
    // dd($data[0]["file_extension"]);
    dd($data);


//    if ($resource->hasVideo())
//    {
//        $cover = $resource->takeVideo();
//    }else{
//        $cover = $resource->takePreviewImage();
//    }
?>

<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner') ?>
<div class="container w-90 mx-auto">
    <div class="row mb-0 mb-md-5 pb-5 border-bottom">
        <div class="col-md-7 col-7 themed-grid-col mr-3">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item"
                        src=""
                        allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-4 col-4 themed-grid-col border-left">
            <div class="pb-4">
                <small><?php the_field('date'); ?></small>
                <h4>
                    <strong><?= the_title(); ?></strong>
<!--                    --><?php //if ($cover == 'mp4'): ?>
<!--                        <!-- poner information de que hay que conectarse para comprarlo -->-->
<!--                    --><?php //else: ?>
<!--                        <p>No video for this resource, get in contact if you want more.</p>-->
<!--                    --><?php //endif; ?>
                </h4>
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
