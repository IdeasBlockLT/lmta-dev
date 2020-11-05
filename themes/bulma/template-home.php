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
    'order' => 'DESC',
    'posts_per_page' => 4,
    'meta_query' => [
        'key' => 'streamDate',
        'value' => $today,
        'compare' => '>=',
        'type' => 'DATE',
    ]
];

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', null, ['size' => 'size1']); ?>
<!--refs-->
    <div class="container w-90 mx-auto text-justify__home p-2">
        <?php $query = new WP_Query($args); ?>

        <?php if ($query->have_posts()) : $query->the_post(); ?>


        <!--Will show the first from the query.-->
        <div class="row mb-0 mb-md-5">
            <div class="col-12 col-md-7 themed-grid-col mr-5 first-post-div">

                <?php
                    get_template_part('parts/video'); 
                ?>

                <script>
                    document.cookie = "first_title=<?php echo(the_title());?>";
                </script>


                <small class="d-block mt-4 "><?php the_field('streamDate'); ?></small>
                <a class="first-post-link" style="text-decoration: none;color: black; " 
                   href="<? the_permalink(); ?>">
                   <h3 class="hover-blue first-post"><?= the_title(); ?></h3></a>
                <p class="first-post-excerpt"><?= the_excerpt(); ?></p>
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
                        <br>
                        <br>
                        <small><?php the_field('streamDate'); ?></small>
                        <a  style="text-decoration: none;color: black; " 
                            href="<? the_permalink(); ?>">
                        <h5 class="hover-blue"><?php the_title() ?></h5></a>
                        <p><?= the_excerpt(); ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>


<?php get_footer(); ?>