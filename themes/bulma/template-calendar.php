<?php /* Template Name: Calendar */ ?>
<?php
$current_lang = pll_current_language();
$readMore = pll_translate_string(FIND_MORE, $current_lang);

$page = (get_query_var('paged')) ? get_query_var('paged') : 1;

$today = date("Y-m-d H:i");
$args = [
    'orderby' => 'streamDate',
    'order' => 'DESC',
    'meta_key' => 'streamDate',
    'posts_per_page' => 9,
    'meta_query' => [
        'key' => 'streamDate',
        'meta-value' => 'streamDate',
        'value' => $today,
        'compare' => '>=',
        'type' => 'CHAR',
    ]
];

$resource = new ResourceSpaceController();

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size1']); ?>
<div class="container w-90 mx-auto">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="mb-4 custom-size">
                <h4 class="d-inline">
                    <span value=">=" id="future-events">
                        Būsimi renginiai
                    </span>
                    <span value="<" id="past-events" class="text-muted">
                        / Įvykę renginiai
                    </span>
                </h4>
            </div>
        </div>
        <div class="col-md-6 mx-auto">
            <div class="mb-4 custom-size" style="text-align: right">
                <strong><label class="mr-4" for="Vaizdavimas"
                               style="display: inline">Vaizdavimas</label>
                </strong>
                <button type="button" autofocus="true" name="switch" value="1"
                        class="inputs" id="horizontal">
                    <i class="fas fa-grip-horizontal" style="color: black"></i>
                </button>
                <button type="button" name="switch" value="1"
                        class="inputs" id="vertical">
                    <i class="fas fa-grip-lines"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Image loader -->
    <div id="loader1" class="loader-container" style="display:none;">
        <div id="inside-loader" class="loader one" style="display: none;"></div>
    </div>
    <!--3 items column-->
    <div id="three-columns" class="row">
        <?php $posts = new WP_Query($args); ?>
        <?php if ($posts): ?>
            <?php $x = 0; ?>
            <?php while ($posts->have_posts()): $posts->the_post(); ?>
                <?php $x++; ?>
                <?php get_template_part('three-columns') ?>

            <?php endwhile; ?>
            <?php if ($x < get_option( 'posts_per_page' )): ?>

            <?php endif; ?>
        <?php else: ?>
        <?php endif; ?>

    </div>
    <!--1 item column-->
    <div id="one-column" class="row hide mb-2">
        <?php $posts = new WP_Query($args); ?>
        <?php if (have_posts()): ?>
            <?php $y = 0; ?>
            <?php while ($posts->have_posts()): $posts->the_post(); ?>
            <?php get_template_part('one-column'); ?>
                <?php $y++; ?>

            <?php endwhile; ?>

        <?php else: ?>
            <?php echo 'hello'; ?>
            <?php echo paginate_links(); ?>
        <?php endif; ?>
    </div>
    <?php get_template_part('parts/banner-words') ?>
</div>
<?php get_footer(); ?>
