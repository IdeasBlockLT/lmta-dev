<!--3 item row-->
<div id="three-columns" class="row">
    <!--3 items row-->
    <?php $posts = new WP_Query($args); ?>
    <?php if ($posts): ?>
        <?php $x = 0; ?>
        <?php while ($posts->have_posts()): $posts->the_post(); ?>
            <?php $x++; ?>
            <div class="col-md-6 col-lg-4 mx-auto border-right pr-3 pl-3 qa">
                <div class="card border-0 mb-4 custom-size" style="background-color: #5797fb00">
                    <img class="bd-placeholder-img card-img-top custom-image-horizontal"
                         src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
                         alt="">
                    <div class="mt-3 mt-md-4 pt-md-2 hr-control full-card">
                        <small><?php the_field('date'); ?></small>
                        <h5>
                            <a class="hover-blue"
                               href="<?= get_the_permalink() ?>"><?= the_title(); ?>
                            </a>
                        </h5>
                        <p class="card-text"><?= the_excerpt(); ?></p>
                    </div>
                    <?php if ($x < 7): ?>
                        <hr>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
                
            </div>
        <?php endwhile; ?>
        <?php echo paginate_links($posts); ?>
        <?php
        if (function_exists('wp_bootstrap_pagination'))
            wp_bootstrap_pagination($posts);
        ?>
        <h2>pagination place</h2>
    <?php else: ?>
        <?php echo 'hello'; ?>
        <!--        --><?php //paginate_links($args); ?>
    <?php endif; ?>
</div>