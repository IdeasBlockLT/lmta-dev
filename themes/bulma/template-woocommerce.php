<?php /* Template Name: Woocommerce */


?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header') ?>
<?php get_template_part('parts/banner', null, ['size' => 'size1']); ?>
<!--refs-->
<?php //do_shortcode("woocommerce_cart"); ?>

<?php the_content();?>

<?php get_footer(); ?>

