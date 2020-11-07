<?php /* Template Name: Home */

//Query taking the first 4, ordered by newest created
// $args = array(
//     'orderby' => 'title',
//     'order' => 'DESC',
//     'posts_per_page' => '4'
// );
$today = date("Y-m-d H:i");
$args = [
    'orderby' => 'meta_value',
    'posts_per_page' => 4,
    'meta_query' => [
        'key' => 'streamDate',
        'value' => $today,
        'compare' => '>=',
        'type' => 'DATE',
    ],
    'order' => 'ASC',
];

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', null, ['size' => 'size1']); ?>
<!--refs-->
    <div class="container w-90 mx-auto text-justify__home p-2">
        <?php 
            $query = new WP_Query($args);
            $reverse = array_reverse($query ->posts);
            $query->posts = $reverse;
        ?>

        <?php if ($query->have_posts()) : $query->the_post(); ?>
        <!--Will show the first from the query.-->
        <div class="row mb-0 mb-md-5">
            <div class="col-12 col-md-7 themed-grid-col mr-4 first-post-div">
                <?php
                    get_template_part('parts/video'); 
                ?>
                <script>
                    document.cookie = "first_title=<?php the_title();?>";
                    document.cookie = "first_image=<?php the_post_thumbnail_url();?>";
                    document.cookie = "first_permalink=<?php the_permalink();?>";
                    console.log('<?php  the_field('streamDate');?>');
                </script>
                <small class="d-block mt-4 "><?php the_field('streamDate'); ?></small>
                <a class="first-post-link" style="text-decoration: none;color: black; " 
                   href="<? the_permalink(); ?>">
                   <h3 class="hover-blue first-post"><?= the_title(); ?></h3></a>
                <p class="first-post-excerpt"><?= the_excerpt(); ?></p>
                <button class="mt-auto btn btn-light custom-more hover-blue__white">
                    <a href="<?php echo get_the_permalink() ?>" class="">
                        <?php echo strtoupper(pll_e('Skaityti daugiau')); ?>
                    </a>
                </button>
            </div>
        <?php endif; ?>
            <!--The rest of the videos-->
            <!--Need custom size of columns for wider columns-->
            <div class="col-12 col-md-4 pl-4 themed-grid-col border-xl-left mt-4 mt-md-0 border-sm-top-invert">
                <div class="ml-md-3">
                    <h4>
                        <strong><?php pll_e('Artimiausi renginiai'); ?></strong>
                    </h4>
                </div>
                <?php while ($query->have_posts()) :$query->the_post(); ?>
                    <?php if (($query->current_post +1) == ($query->post_count)):?>
                    <div class="themed-grid-col w-100 pb-4 pt-1 ml-md-3">
                    <?php else: ?>
                        <div class="themed-grid-col w-100 border-bottom pb-4 pt-1 ml-md-3">
                    <?php endif; ?>
                        <br>
                        <small><?php the_field('streamDate'); ?></small>
                        <a style="text-decoration: none;color: black; "
                            href="<?php the_permalink(); ?>">
                        <h5 class="hover-blue"><?php the_title() ?></h5></a>
                        <p><?= the_excerpt(); ?></p>
                        <button class="mt-auto btn btn-light custom-more hover-blue__white">
                            <a href="<?php echo get_the_permalink() ?>" class="">
                                <?php echo strtoupper(pll_e('Skaityti daugiau')); ?>
                            </a>
                        </button>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>

