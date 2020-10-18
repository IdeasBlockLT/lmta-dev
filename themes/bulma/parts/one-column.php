<?php

$current_lang = pll_current_language();
$readMore = pll_translate_string(FIND_MORE, $current_lang);

?>
<?php $y = 0; ?>
<?php $y++; ?>
<div class="col-12">
    <div class="card flex-md-row box-shadow h-md-250 custom-borders__one_column py-5
                <?php if ($y == 9): echo 'border-remove'; endif; ?>">
        <img class="flex-auto d-none d-md-block custom-image-vertical border-right"
             src="<?php echo get_the_post_thumbnail_url(null, 'medium'); ?>"
             alt="Card image cap">
        <div class="card-body custom__card-body d-flex flex-column align-items-start border-md-left ml-md-4">
            <small>
                <?php if (get_field('streamDate')): ?>
                    <?php the_field('streamDate') ?>
                <?php endif; ?>
            </small>
            <h5>
                <a class="hover-blue"
                   href="<?= get_the_permalink() ?>"><?= the_title(); ?>
                </a>
            </h5>
            <p class="card-text"><?= the_excerpt(); ?></p>
            <button class="mt-auto btn btn-light custom-more hover-blue__white">
                <a href="' . get_the_permalink() . '" class="">
                    <?= strtoupper($readMore); ?>
                </a>
            </button>
        </div>
    </div>
</div>
