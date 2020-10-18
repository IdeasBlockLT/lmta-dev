<?php

$current_lang = pll_current_language();
$readMore = pll_translate_string(FIND_MORE, $current_lang);

?>
<?php $x = 0; ?>
<?php $x++; ?>
<div class="col-md-6 col-lg-4 border-right pr-3 pl-3 qa">
    <div class="card border-0 mb-4 custom-size">
        <img class="bd-placeholder-img card-img-top custom-image-horizontal"
             src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
             alt="">
        <div class="mt-3 mt-md-4 pt-md-2 hr-control">
            <small>
                <?php if (get_field('streamDate')): ?>
                    <?php the_field('streamDate') ?>
                <?php endif; ?>
            </small>
            <h5>
                <a class="hover-blue"
                   href="<?= get_permalink() ?>"><?= the_title(); ?>
                </a>
            </h5>
            <p class="card-text"><?= the_excerpt(); ?></p>
            <button class="mt-auto btn btn-light custom-more hover-blue__white mb-3">
                <a href="<?php echo get_permalink() ?>" class="">
                    <?= strtoupper($readMore); ?>
                </a>
            </button>
        </div>
        <?php if (empty(esc_html($args['border-adjust']))) : ?>
        <hr>
        <?php endif; ?>
    </div>
</div>