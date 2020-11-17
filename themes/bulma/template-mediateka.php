<?php /* Template Name: Mediateka */ ?>
<?php
$searchTerm = isset($_POST["searchTerm"]) ? $_POST["searchTerm"] : "";

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$today = date("Y-m-d H:i");
$args = [
    'orderby' => 'streamDate',
    'order' => 'DESC',
    'post_type'=>'post',
    'post_status' => 'publish',
    'meta_key' => 'streamDate',
    'posts_per_page' => 9,
    'paged' => $paged,
    's' => $searchTerm,
    'meta_query' => [
        'key' => 'streamDate',
        // 'meta-value' => 'streamDate',
        'value' => $today,
        'compare' => '<',
        'type' => 'DATE',
    ]
];

$the_page = sanitize_post( $GLOBALS['wp_the_query']->get_queried_object() );
$slug = $the_page->post_name;

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header', 'custom-nav', [
    'background-color' => 'blue',
    'font-color' => 'white',
    'input-color' => 'blue',
]) ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size2',
    'background-color' => 'blue',
    'font-color' => 'white',
    'input-color' => 'blue'
])  ?>
<style>
    .card{
        background-color: #5797fb !important;
    }
</style>

<div class="container w-90 mx-auto">
    <div class="container w-90 mx-auto">
        <div id="two-columns_busimi-iviki" class="row">

            <?php get_template_part('parts/horizontal-vertical', null, array("one-line" => 'col')) ?>

            <!-- Image loader -->
            <div id="loader1" class="loader-container" style="display:none;">
                <div id="inside-loader" class="loader one"
                     style="display: none;"></div>
            </div>


        </div>

        <!--3 item column-->
        <div id="three-columns" class="row">
            <?php get_template_part('parts/three-columns', null, array("args" => $args)) ?>
        </div>

        <!--1 item column-->
        <div id="one-column" class="row mb-2" style="display: none">
            <?php get_template_part('parts/one-column', null, array("args" => $args)) ?>
        </div>

        <span id="slug" data-slug="<?php echo $slug; ?>"></span>
<!--        --><?php
//        // $searchTerm = isset($_POST["searchTerm"])? $_POST["searchTerm"] : null ;
//        //<!--3 item column-->
//        get_template_part('parts/1-item-row', null, array("args" => $args, "searchTerm" => $searchTerm));
//        //<!--1 item column-->
//        get_template_part('parts/3-item-row', null, array("args" => $args, "searchTerm" => $searchTerm));
//        ?>
    </div>
    <?php
    get_template_part('parts/mediateka-keywords');
    ?>
</div>


<?php get_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/mediateka.js'; ?>"
        type="module"></script>