<?php /* Template Name: About */ ?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size1']); ?>
<h1>ABOUT</h1>
<div class="container w-90 mx-auto">
    <div class="row mb-5 pb-5 w-100">
        <div class="columncontent">
            <?php the_content(); ?>
        </div>
    </div>
    <?php get_template_part('parts/banner-words') ?>
</div>

<?php get_footer(); ?>
