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
        <?php get_template_part('parts/busimi-ivike'); ?>

        <?php get_template_part('parts/horizontal-vertical'); ?>
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
