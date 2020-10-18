<?php /* Template Name: Calendar */ ?>
<?php
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'orderby' => 'date',
    'posts_per_page' => 9,
    'paged' => $page
);

$resource = new ResourceSpaceController();
//$image = $resource->getPreviews('trevio');

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size1']); ?>

<div class="container w-90 mx-auto">
    <div id="two-columns_busimi-iviki class="row">
        <div class="col-md-6 mx-auto">
            <div class="mb-4 custom-size">
                <h4 class="d-inline">
                    <strong>Būsimi renginiai</strong><span class="text-muted">/ Įvykę renginiai</span>
                </h4>
            </div>
        </div>
        <div class="col-md-6 mx-auto">
            <div class="mb-4 custom-size" style="text-align: right">
                <strong><label class="mr-4" for="Vaizdavimas"
                               style="display: inline">Vaizdavimas</label>
                </strong>
                <button type="button" autofocus="true" name="switch" value="1"
                        checked="true"
                        class="inputs" id="horizontal">
                    <i class="fas fa-grip-horizontal"></i>
                </button>
                <button type="button" name="switch" value="1" checked="true"
                        class="inputs" id="vertical">
                    <i class="fas fa-grip-lines"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="three-columns" class="row">
        <!--3 items column-->
        <?php $posts = new WP_Query($args); ?>
        <?php if ($posts): ?>
            <?php $x = 0; ?>
            <?php while ($posts->have_posts()): $posts->the_post(); ?>
                <?php $x++; ?>
                <div class="col-md-6 col-lg-4 mx-auto border-right pr-3 pl-3 qa">
                    <div class="card border-0 mb-4 custom-size">
                        <img class="bd-placeholder-img card-img-top custom-image-horizontal"
                             src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
                             alt="">
                        <div class="mt-3 mt-md-4 pt-md-2 hr-control">
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

    <!--1 item column-->
    <div id="one-column" class="row hide mb-2">
        <?php $posts = new WP_Query($args); ?>
        <?php if (have_posts()): ?>
            <?php while ($posts->have_posts()): $posts->the_post(); ?>
            <div class="col-12">
                <div class="card flex-md-row box-shadow h-md-250 custom-borders__one_column py-5">
                    <img class="flex-auto d-none d-md-block custom-image-vertical border-right" src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>" alt="Card image cap">
                    <div class="card-body custom__card-body d-flex flex-column align-items-start border-md-left ml-md-4">
                        <small><?php the_field('date'); ?></small>
                        <h5>
                            <a class="hover-blue"
                               href="<?= get_the_permalink() ?>"><?= the_title(); ?>
                            </a>
                        </h5>
                        <p class="card-text"><?= the_excerpt(); ?></p>
                        <button class="mt-auto btn btn-light custom-more hover-blue__white">
                            <a href="' . get_the_permalink() . '" class="">
                                Read more
                            </a>
                        </button>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        <?php else: ?>
            <?php echo 'hello'; ?>
            <?php echo paginate_links(); ?>
        <?php endif; ?>
    </div>
    
    

</div>

<?php get_template_part('parts/banner-words') ?>

<?php get_footer(); ?>
<script>
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
</script>
