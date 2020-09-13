<?php /* Template Name: Search */ ?>
<?php

$args = array(
    'orderby' => 'date',
);

$resource = new ResourceSpaceController();
//$data = $resource->getResourceData(1001);
$fieldData = $resource->getResourceFieldData(1001);
$sizes = $resource->getResourceAllImageSizes(1001, true);
dd($sizes);

$results = $resource->getPreviews('mvl000002');
//dd($results);

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner') ?>

<div class="container w-90 mx-auto">
<!--    <div class="row">-->
<!--        --><?php //$posts = new WP_Query($args); ?>
<!--        --><?php //while ($posts->have_posts()): $posts->the_post(); ?>
<!--            <div class="col">-->
<!--                <div class="card" style="width: 18rem;">-->
<!--                    <img src="--><?php //echo $image[0]['url_scr'] ?><!--" class="card-img-top" alt="...">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title">--><?php //the_title() ?><!--</h5>-->
<!--                        <p class="card-text">--><?php //the_excerpt(); ?><!--</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //endwhile; ?>
<!--    </div>-->

    <div class="row">
        <?php foreach ($results as $item): ?>

            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo $item['url_thm'] ?>" class="card-img-top img-thumbnail" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $item['field8']; ?></h5>
                        <p class="card-text"><?= $item['field3']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php get_footer(); ?>
