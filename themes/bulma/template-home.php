<?php /* Template Name: Home */


$resource = new ResourceSpaceController();
//dd($resource->doSearch());
//dd($resource->getResourcePath(2));
//dd($resource->getPreviews(61));
//$resource->doSearch('trevio');
//$video = $resource->coverVideo(415);
//$hola = $resource->doSearch('mozart');
//dd($hola);
//$sizes = $resource->getResourceAllImageSizes(1001, true);

//Query taking the first 4, ordered by newest created
$args = array(
    'orderby' => 'title',
    'order' => 'DESC',
    'posts_per_page' => '4'
);

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', null, ['size' => 'size1']); ?>
<!--refs-->
    <div class="container w-90 mx-auto text-justify__home p-2">
        <?php $query = new WP_Query($args); ?>
        <?php if ($query->have_posts()) :$query->the_post(); ?>
        <!--Will show the first from the query.-->
        <div class="row mb-0 mb-md-5">
            <div class="col-12 col-md-7 themed-grid-col mr-5">

                <?php 
                    get_template_part('parts/video'); 
                    // $is_live =  $_COOKIE['is_live'];
                    // dd($_COOKIE['is_live']);
                ?>




                <small class="d-block mt-4 "><?php the_field('date'); ?></small>
                <a style="text-decoration: none;color: black; " 
                   href="<? the_permalink(the_post()); ?>">
                   <h3 class="hover-blue first-post"><?= the_title(); ?></h3></a>
                <p><?= the_excerpt(); ?></p>
            </div>
            <?php endif; ?>

            <!--The rest of the videos-->
            <!--Need custom size of columns for wider columns-->
            <div class="col-12 col-md-4 pl-4 themed-grid-col border-xl-left">
                <div class="pb-4">
                    <h4>
                        <strong><?php pll_e('Artimiausi renginiai'); ?></strong>
                    </h4>
                </div>
                <?php while ($query->have_posts()) :$query->the_post(); ?>
                    <div class="themed-grid-col w-100 <?php echo (!get_next_post_link()) ? '' : 'border-bottom' ?>">
                        <small><?php the_field('date'); ?></small>
                        <a  style="text-decoration: none;color: black; " 
                            href="<? the_permalink(the_post()); ?>">
                        <h5 class="hover-blue"><?php echo ucfirst(get_the_title()) ?></h5></a>
                        <p><?= the_excerpt('hello'); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php get_template_part('parts/banner-words') ?>
        </div>
    </div>


<?php get_footer(); ?>