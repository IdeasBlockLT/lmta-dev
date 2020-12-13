<?php
$queryArgs = $args['args'];
$wp_query = new WP_Query($queryArgs);
$postCount = $wp_query->found_posts;

global $template;

if ( basename( $template ) === 'template-mediateka.php'  ) {
    $hoverColor = 'hover-white';
}else{
    $hoverColor = 'hover-blue';
}

?>
<?php if ($wp_query->have_posts()): ?>
    <?php $x = 0; ?>
    <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>
        <?php $x++; ?>
        <?php if ($x > 1): ?>
            <div class="col-12 pb-4 pt-4">
                <hr>
            </div>
        <?php endif; ?>
        <div class="col-12">
            <div class="card flex-md-row box-shadow h-md-250 custom-borders__one_column">
<!--                 <img class="flex-auto d-none d-md-block custom-image-vertical" -->
					<div class='image-container'>
						<div class='image-container' style="display:block; overflow:hidden; margin:auto;">
							<img class="center-image bd-placeholder-img card-img-top custom-image-horizontal"
							
							 src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
							 alt="Card image cap">
						</div>
					</div>
                <div class="col card-body custom__card-body d-flex flex-column align-items-start border-md-left ml-md-4"
					 style="width:70%;">
                    <small>
                        <?php if (get_field('streamDate')): ?>
                            <?php the_field('streamDate') ?>
                        <?php endif; ?>
                    </small>
                    <h5>
                        <a class="<?php echo $hoverColor; ?>>" href="<?= get_permalink() ?>">
                            <?= the_title(); ?>
                        </a>
                    </h5>
                    <p class="card-text"><?= the_excerpt(); ?></p>
                        <a href="<?php echo get_the_permalink() ?>"
                           class="mt-auto btn btn-light custom-more hover-blue__white">
                            <?php echo strtoupper(pll_e('Skaityti daugiau')); ?>
                        </a>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
    <?php if ($postCount > $queryArgs['posts_per_page']): ?>
        <div class="d-block w-100 pr-3 pl-3 pt-4 border-top">
            <div id="pagination" class="">
                <?php

                if (!isset($args['slug'])) {
                    $the_page = sanitize_post($GLOBALS['wp_the_query']->get_queried_object());
                    $slug = $the_page->post_name;
                } else {
                    $slug = $args['slug'];
                }

                $paginationArgs = array(
                    'base' => home_url($slug . '%_%'),
                    'format' => '/page/%#%/',
                    'current' => max(1, get_query_var('paged')),
                    'total' => $wp_query->max_num_pages,
                );

                if (isset($_GET['s'])) {
                    $paginationArgs['add_args'] = array(
                        's' => $_GET['s'] // your search query passed via your ajax function
                    );
                }
                echo paginate_links($paginationArgs);
                ?>
            </div>
        </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
<?php endif; ?>

