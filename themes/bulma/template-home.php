<?php /* Template Name: Home */

//Query taking the first 3, ordered by soonest streamDate
// minus 3 hours to make it 5 (bcs of offset) to not move into past events straight away, but after 5hours from streamDate
// $today = date("Y-m-d H:i");
$today = date("Y-m-d H:i", strtotime('-3 hours'));
// $args = [
//     'orderby' => 'streamDate',
//     'posts_per_page' => 3,
//     'post_status' => 'publish',
// 	'meta_key'=>'streamDate',
//     'meta_query' => [
//         'key' => 'streamDate',
//         'value' => $today,
//         'compare' => '>=',
//         'type' => 'DATETIME',
//     ],
//     'order' => 'ASC',
// ];

$args = [
    'orderby' => 'streamDate',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'meta_key'=>'streamDate',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'streamDate',
            'value' => $today,
            'compare' => '>=',
            'type' => 'DATETIME',
        ),
        array(
            'add_to_mediateka'=>false,
        ),
    ),
    'order' => 'ASC',
];

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', null, ['size' => 'size2']); ?>
<!--refs-->
    <div class="container w-90 mx-auto text-justify__home p-2">
        <?php
            $query = new WP_Query($args);
//             $reverse = array_reverse($query ->posts);
//             $query->posts = $reverse;
        ?>

        <?php if ($query->have_posts()) : $query->the_post(); ?>
        <!--Will show the first from the query.-->
        <div class="row mb-0 mb-md-5">
            <div class="col-12 col-md-7 themed-grid-col mr-4 first-post-div">
				<?php
                    get_template_part('parts/video');
                ?>
                <script>
                    document.cookie = "first_title=<?php //the_title();?>";
                    document.cookie = "first_image=<?php the_post_thumbnail_url();?>";
                    document.cookie = "first_permalink=<?php the_permalink();?>";
                    document.cookie = "first_date=<?php //the_field('streamDate');?>";
                </script>
                
                <div class="date"><small class="first-date d-block mt-4 "><?php //the_field('streamDate'); ?></small></div>
                <a class="first-post-link" style="text-decoration: none;color: black; "
                   href="<?php //the_permalink(); ?>">
                   <h3 class="hover-blue first-post"><?php //the_title();?></h3></a>
                <div class="first-post-excerpt"><p ><?php //the_excerpt();?></p></div>
<!--                 <button class="mt-auto btn btn-light custom-more hover-blue__white">
                    <a href="<?php //the_permalink(); ?>" class="first-btn-a">
                        <?php //echo strtoupper(pll_e('Skaityti daugiau')); ?>
                    </a>
                </button> -->
            </div>
        <?php $query->rewind_posts();?>
        <?php endif; ?>
        <!-- maybe do post post  -->
            <!--The rest of the videos-->
            <!--Need custom size of columns for wider columns-->
            <div class="col-12 col-md-4 pl-4 themed-grid-col border-xl-left mt-4 mt-md-0 border-sm-top-invert">
                <div class="ml-md-3 mb-0">
                    <h4>
                        <strong><?php pll_e('Artimiausi renginiai'); ?></strong>
                    </h4>
                </div>
                <?php while ($query->have_posts()) :$query->the_post(); ?>
                    <?php if (($query->current_post +1) == ($query->post_count)):?>
                    <div class="themed-grid-col w-100 pb-2 pb-lg-4 ml-md-3">
                    <?php else: ?>
                        <div class="themed-grid-col w-100 border-bottom pb-2 pb-lg-4 ml-md-3">
                    <?php endif; ?>
                        <br>
                        <small><?php the_field('streamDate'); ?></small>
                        <a style="text-decoration: none;color: black; "
                            href="<?php the_permalink(); ?>">
                        <h5 class="hover-blue"><?php the_title() ?></h5></a>
                        <p><?= the_excerpt(); ?></p>
                        <button class="mt-auto btn btn-light custom-more hover-blue__white">
                            <a href="<?php the_permalink(); ?>" class="">
                                <?php echo strtoupper(pll_e('Skaityti daugiau')); ?>
                            </a>
                        </button>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>

