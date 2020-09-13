<?php /* Template Name: Calendar */ ?>
<?php

$args = array(
    'orderby' => 'date',
);

$resource = new ResourceSpaceController();
//$image = $resource->getPreviews('trevio');

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size3']); ?>

<div class="container w-90 mx-auto">
    <div class="row">
        <?php $posts = new WP_Query($args); ?>
        <?php while ($posts->have_posts()): $posts->the_post(); ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="<?php bloginfo('stylesheet_directory') ?>/images/jpeg.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php the_title() ?></h5>
                    <p class="card-text"><?php the_excerpt(); ?></p>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>
