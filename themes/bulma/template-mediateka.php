<?php /* Template Name: Mediateka */

$resource = new ResourceSpaceController();
$sizes = $resource->getResourceAllImageSizes(1001, true);

$args = array(
    'orderby' => 'title',
    'order' => 'DESC',
    'posts_per_page' => '4'
);

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size3']); ?>

    <div class="container w-90 mx-auto">
        <?php $query = new WP_Query($args); ?>
        <?php if ($query->have_posts()) :$query->the_post(); ?>
        <div class="row mb-5">
            <div class="col-md-7 col-7 themed-grid-col mr-5">
                <?php get_template_part('parts/video') ?>
                <small><?php the_field('date'); ?></small>
                <h3><?= the_title(); ?></h3>
                <p><?= the_excerpt(); ?></p>
                <button type="button" class="btn btn-primary">Primary</button>
            </div>
            <?php endif; ?>
            <div class="col-md-4 col-4 themed-grid-col border-left">
                <div class="pb-4">
                    <h4>
                        <strong>Artimiausi renginiai</strong>
                    </h4>
                </div>
                <?php while ($query->have_posts()) :$query->the_post(); ?>
                    <div class="themed-grid-col p-3 <?php echo (!get_next_post_link()) ? '' : 'border-bottom' ?>">
                        <small><?php the_field('date'); ?></small>
                        <h5><?php echo ucfirst(get_the_title()) ?></h5>
                        <p><?= the_excerpt(); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php get_template_part('parts/banner-words') ?>
        </div>
    </div>
<?php get_footer(); ?>