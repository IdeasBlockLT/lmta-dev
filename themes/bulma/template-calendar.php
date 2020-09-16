<?php /* Template Name: Calendar */ ?>
<?php

$args = array(
    'orderby' => 'date',
);

$resource = new ResourceSpaceController();
//$image = $resource->getPreviews('trevio');

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size3']); ?>

<div class="container w-90 mx-auto">
    <div class="row">
        <input type="radio" name="switch" value="1" checked="checked">
        <input type="radio" name="switch" value="2">
        <div class="col-12">
            <br>
        </div>
        <!--3 items column-->
        <?php $posts = new WP_Query($args); ?>
        <?php if ($posts): ?>
        <?php while ($posts->have_posts()): $posts->the_post(); ?>
            <section id="one" class="col-md-4 border-right border-bottom">
                <div class="card mb-4 p-5 border-0">
                    <img class="bd-placeholder-img card-img-top"
                         src="<?php bloginfo('stylesheet_directory') ?>/images/jpeg.jpg" alt="">
                    <div class="card-body">
                        <small><?php the_field('date'); ?></small>
                        <h4>
                            <strong><?= the_title(); ?></strong>
                        </h4>
                        <p class="card-text"><?= the_excerpt(); ?></p>
                    </div>
                </div>


            </section>
        <?php endwhile; ?>
        <?php else: ?>
            <?php echo 'hello'; ?>
            <?php echo paginate_links($args); ?>
        <?php endif; ?>
        <!--1 item column-->
        <?php $posts = new WP_Query($args); ?>
        <?php if (have_posts()): ?>
            <?php while ($posts->have_posts()): $posts->the_post(); ?>
                <section id="two" class="w-100 mb-5 pb-5 border-bottom-0 border-md-bottom">
                    <div class="col-md-4 col-4 themed-grid-col mr-3">
                        <img class="bd-placeholder-img card-img-top"
                             src="<?php bloginfo('stylesheet_directory') ?>/images/jpeg.jpg" alt="">
                    </div>
                    <div class="col-md-8 col-8 themed-grid-col border-left">
                        <div class="pb-4">
                            <small><?php the_field('date'); ?></small>
                            <h4>
                                <strong><?= the_title(); ?></strong>
                            </h4>
                            <p><?= the_excerpt(); ?></p>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php else: ?>
            <?php echo 'hello'; ?>
            <?php echo paginate_links(); ?>
        <?php endif; ?>
        </section>
    </div>
    <script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/toggle-calendar.js'; ?>"
            type="module"></script>
    <?php get_footer(); ?>
