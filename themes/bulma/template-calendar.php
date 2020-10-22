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

   <!-- HERE IT WAS 3 ITEM -->
    




    <!-- ============================= -->
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
    <!-- ========================== -->



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

