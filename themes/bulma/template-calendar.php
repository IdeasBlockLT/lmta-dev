<?php /* Template Name: Calendar */ ?>
<?php
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

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size2']); ?>

<div class="container w-90 mx-auto">

    
    <div id="two-columns_busimi-iviki" class="row">
        
        <?php get_template_part('parts/busimi-ivike') ?>

        <?php get_template_part('parts/horizontal-vertical') ?>

        <!-- Image loader -->
        <div id="loader1" class="loader-container" style="display:none;">
            <div id="inside-loader" class="loader one" style="display: none;"></div>
        </div>


    </div>

    <!--3 item column-->
    <?php get_template_part('parts/1-item-row', null, array("args"=>$args) ) ?>

    <!--1 item column-->

    <?php get_template_part('parts/3-item-row', null, array("args"=>$args)) ?>
    
</div>


<?php get_footer(); ?>

