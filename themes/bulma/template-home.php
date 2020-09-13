<?php /* Template Name: Home */
//$argsCover = array(
//    'orderby' => 'title',
//    'order' => 'DESC',
//    'posts_per_page' => '1'
//);

$resource = new ResourceSpaceController();
//dd($resource->getResourcePath(2));
//dd($resource->getPreviews(61));
//$resource->doSearch('trevio');
//$video = $resource->coverVideo(415);
$hola = $resource->doSearch('mozart');
//dd($hola);
$sizes = $resource->getResourceAllImageSizes(1001, true);

//$a = new ResourceSpaceController();
//$a->takeFirstFour();
//dump('asd');
//dd($a);
$args = array(
    'orderby' => 'title',
    'order' => 'DESC',
    'posts_per_page' => '4'
);

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', null, ['size' => 'size1']); ?>

    <div class="container w-90 mx-auto">
        <?php $query = new WP_Query($args); ?>
        <?php if ($query->have_posts()) :$query->the_post(); ?>
        <div class="row mb-5">
            <div class="col-12 col-md-7 themed-grid-col mr-5">
                <?php get_template_part('parts/video') ?>
                <small class="d-block mt-4"><?php the_field('date'); ?></small>
                <h3 class="hover-blue"><?= the_title(); ?></h3>
                <p><?= the_excerpt(); ?></p>
            </div>
            <?php endif; ?>

            <!-- -->
            <div class="col-12 col-md-4 pl-4 themed-grid-col border-xl-left">
                <div class="pb-4">
                    <h4>
                        <strong><?php pll_e('Artimiausi renginiai'); ?></strong>
                    </h4>
                </div>
                <?php while ($query->have_posts()) :$query->the_post(); ?>
                    <div class="themed-grid-col w-100 <?php echo (!get_next_post_link()) ? '' : 'border-bottom' ?>">
                        <small><?php the_field('date'); ?></small>
                        <h5 class="hover-blue"><?php echo ucfirst(get_the_title()) ?></h5>
                        <p><?= the_excerpt(); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php get_template_part('parts/banner-words') ?>
        </div>
    </div>


<?php get_footer(); ?>