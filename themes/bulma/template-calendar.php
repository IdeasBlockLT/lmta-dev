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
    
    <div id="two-columns_busimi-iviki" class="row">
        
        <?php get_template_part('parts/busimi-ivike') ?>

        <?php get_template_part('parts/horizontal-vertical') ?>

    </div>
    
    <!--3 item column-->
    <?php get_template_part('parts/1-item-row', null, array("args"=>$args) ) ?>

    <!--1 item column-->

    <?php get_template_part('parts/3-item-row', null, array("args"=>$args)) ?>
</div>

<?php get_template_part('parts/banner-words') ?>

<?php get_footer(); ?>

<!-- <script>
    let threeColumns = $("#three-columns");
    let oneColumn = $("#one-column");
    $("#horizontal").click(function () {
        oneColumn.addClass("hide");
        oneColumn.next().find('>div').removeClass("one-column");

        threeColumns.css("display", "flex");
        threeColumns.find('>div').css("display", "block");
    });

    $("#vertical").click(function () {
        threeColumns.css("display", "none");
        threeColumns.find('>div').css("display", "none");

        oneColumn.removeClass("hide");
        oneColumn.next().find('>div').not('#calendar-menu').addClass("one-column");
    })
</script> -->
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/horizontal-vertical.js'; ?>" type="module"></script>

