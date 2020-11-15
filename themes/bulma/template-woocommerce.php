<?php /* Template Name: Woocommerce */


?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', null, ['size' => 'size1']); ?>
<!--refs-->
<div class="container w-60 mx-auto text-justify__home p-2">
<?php the_content();?>
</div>

<?php get_footer(); ?>

