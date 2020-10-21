<?php /* Template Name: About */ ?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size1']); ?>
<div class="container w-90 mx-auto">
<!--    --><?php //echo do_shortcode("[resourcespace id=1001]"); ?>
<!--    --><?php //echo do_shortcode("[resourcespace id=1035 size_id=thm]"); ?>
    <div class="row mb-0 mb-md-5">
        <div class="columncontent__about p-2">
            <?php the_content(); ?>
        </div>
        <?php get_template_part('parts/banner-words') ?>
    </div>

</div>


<?php get_footer(); ?>
