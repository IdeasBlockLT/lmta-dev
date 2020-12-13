<!--1 item row-->
<div id="one-column" class="row hide mb-2">

    <?php 
        $args = $args['args'];
        $posts = new WP_Query($args); 
    ?>
    <?php if (have_posts()): ?>
        <?php while ($posts->have_posts()): $posts->the_post(); ?>
            <div class="col-12">
                <div class="card flex-md-row box-shadow h-md-250 custom-borders__one_column py-5"
                     style="background-color: #5797fb00">
                    <a href="<?php echo get_the_permalink() ?>">
                        <img class="flex-auto d-none d-md-block custom-image-vertical border-right"
                             src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
                             alt="Card image cap">
                    </a>
                    <div class="card-body custom__card-body d-flex flex-column align-items-start border-md-left ml-md-4">
                        <small><?php the_field('date'); ?></small>
                        <h5>
                            <a class="hover-blue"
                               href="<?= get_the_permalink() ?>"><?= the_title(); ?>
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
    <?php else: ?>
        <?php echo 'hello'; ?>
        <?php //echo paginate_links(); ?>
    <?php endif; ?>
</div>