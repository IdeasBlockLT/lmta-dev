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
        <label class="calendar-input mr-4" for="Vaizdavimas" style="display: inline">Vaizdavimas</label>
        <input type="radio" name="switch" value="1" checked="checked" class="">
        <input type="radio" name="switch" value="2" class="ml-3">

        <div class="d-inline">
            <h4 class="d-inline"><strong>Būsimi renginiai</strong><span class="text-muted">/ Įvykę renginiai</span></h4>
        </div>
        <div class="col-12">
            <br>
        </div>
        <!--3 items column-->
        <?php $posts = new WP_Query($args); ?>
        <?php if ($posts): ?>
        <?php while ($posts->have_posts()): $posts->the_post(); ?>
            <section id="one" class="col-md-4 border-right border-bottom">
                <div class="card mb-4 border-0">
                    <img class="bd-placeholder-img card-img-top"
                         src="<?php bloginfo('stylesheet_directory') ?>/images/jpeg.jpg" alt="">
                    <div class="mt-3 mt-md-4 pt-md-2">
                        <small><?php the_field('date'); ?></small>
                        <h4>
                            <strong><a href="<?= get_the_permalink() ?>"><?= the_title(); ?></a></strong>
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
        <?php get_template_part('parts/banner-words') ?>
    </div>
</div>
    <?php get_footer(); ?>
