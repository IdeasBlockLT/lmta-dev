<?php
$languages = get_menu_items('language');
$current_lang = pll_current_language();
$current_lang_title = pll_current_language('name');
?>
<div class="navbar-collapse collapse w-100 order-2 order-md-2 dual-collapse2 border-top border-dark border-md-top-0 mb-3 mb-md-0 mobile-hide">
    <ul class="navbar-nav ml-auto">
        <?php foreach ($languages as $item): ?>
            <?php if ($current_lang_title != $item->title): ?>
                <li class="nav-item<?php if ($item->active): ?>active<?php endif; ?><!--">
                    <a class="nav-link" href="<?= $item->url ?>">
                        <strong><?= ucfirst($item->title) ?></strong>
                    </a>
                </li>
            <?php
            endif;
        endforeach; ?>
    </ul>
</div>