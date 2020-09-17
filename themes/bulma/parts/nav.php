<?php
$primary_menu = get_menu_items('primary');
$languages = get_menu_items('language');
$current_lang = pll_current_language();
$current_lang_title = pll_current_language('name');;


?>

<!--Order class in divs-->
<!--order-1 - small screens first position in nav-->
<!--order-md-1 - medium screens first position in nav-->
<div id="navbarHeader">
    <nav class="navbar navbar-expand-md navbar-light border-md-bottom custom-border">
        <!-- Pages menu-->
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <?php foreach ($primary_menu as $item): ?>
                    <li class="nav-item <?php if ($item->active): ?>active<?php endif; ?>">
                        <a class="nav-link <?= $args['font-color'] ?>"
                           href="<?= $item->url ?>"><?= ucfirst($item->title) ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!--Search form-->
        <?php get_template_part('parts/search') ?>
        <!--Multi languages-->
        <div class="navbar-collapse collapse w-100 order-2 order-md-2 dual-collapse2 border-top border-dark border-md-top-0 mb-3 mb-md-0">
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
        <div class="navbar-toggler mx-auto order-0 mb-2 w-100 text-center border-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</div>
