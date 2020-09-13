<?php
$primary_menu = get_menu_items('primary');
$languages = get_menu_items('language');
$current_lang = pll_current_language();
$current_lang_title = pll_current_language('name');;
?>

<nav class="navbar navbar-expand-md navbar-light border-bottom custom-border">
    <!-- Pages menu-->
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($primary_menu as $item): ?>
                <li class="nav-item <?php if ($item->active): ?>active<?php endif; ?>">
                    <a class="nav-link" href="<?= $item->url ?>"><?= ucfirst($item->title) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php get_template_part('parts/search') ?>
    <!-- Implement language plugin Polylang-->
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <?php foreach ($languages as $item): ?>
                <?php if ($current_lang_title != $item->title): ?>
                    <li class="nav-item<?php if ($item->active): ?>active<?php endif; ?><!--">
                        <a class="nav-link" href="<?= $item->url ?>">
                            <?= ucfirst($item->title) ?></a>
                    </li>
                <?php
                endif;
            endforeach; ?>
        </ul>
    </div>
</nav>
