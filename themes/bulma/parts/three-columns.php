<?php $x = 0; ?>
<?php $x++; ?>
<?php
$queryArgs = $args['args'];
$wp_query = new WP_Query($queryArgs);
//dd($wp_query);
$maxPosts = $queryArgs['posts_per_page'];
$maxPostsFullRow = $maxPosts - 5;
$postCount = $wp_query->found_posts;

?>
<?php if ($wp_query->have_posts()): ?>
    <?php $x = 0; ?>
    <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
        <?php $x++; ?>
        <div class="col-md-6 col-lg-4 border-right pr-4 pl-4 qa">
            <div class="card border-0 mb-4 custom-size">
                <img class="bd-placeholder-img card-img-top custom-image-horizontal"
                     src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
                     alt="">
                <div class="mt-3 mt-md-4 pt-md-2 hr-control">
                    <small>
                        <?php if (get_field('streamDate')): ?>
                            <?php the_field('streamDate') ?>
                        <?php endif; ?>
                    </small>
                    <h5>
                        <a class="hover-blue"
                           href="<?= get_permalink() ?>"><?= the_title(); ?>
                        </a>
                    </h5>
                    <p class="card-text"><?= the_excerpt(); ?></p>
                    <button class="mt-auto btn btn-light custom-more hover-blue__white mb-3">
                        <a href="<?php echo get_permalink() ?>"
                           class="text-uppercase">
                            <?php echo(pll_e('Skaityti daugiau')); ?>
                        </a>
                    </button>
                </div>
                <?php if ($x < $maxPostsFullRow): ?>
                    <hr>
                <?php else: ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
    <?php if ($postCount > $queryArgs['posts_per_page']): ?>
        <div class="d-block w-100 pr-3 pl-3 pt-4 border-top mt-4">
            <div id="pagination" class="">
                <?php

                if (!isset($args['slug'])){
                    $the_page = sanitize_post($GLOBALS['wp_the_query']->get_queried_object());
                    $slug = $the_page->post_name;
                }else{
                    $slug = $args['slug'];
                }

                $paginationArgs = array(
                    'base' => home_url( $slug . '%_%' ),
                    'format' => '/page/%#%/',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                );

                if( isset($_GET['s']) ){
                    $paginationArgs['add_args'] = array(
                        's' => $_GET['s'] // your search query passed via your ajax function
                    );
                }
                echo paginate_links( $paginationArgs );
                ?>
            </div>
        </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
<?php endif; ?>
