<?php
$primary_menu = get_menu_items('primary');
$languages = get_menu_items('language');
$current_lang = pll_current_language();
$current_lang_title = pll_current_language('name');

#Setting background color
if (!isset($args['background-color'])) {
    $backgroundColor = '';
} else {
    $backgroundColor = esc_html($args['background-color']);
}

#Setting font-color
if (!isset($args['font-color'])) {
    $fontColor = '';
} else {
    $fontColor = esc_html($args['font-color']);
}

#Setting input-color
if (!isset($args['input-color'])) {
    $inputColor = '';
} else {
    $inputColor = esc_html($args['input-color']);
}

#Setting placeholder text
if (!isset($args['placeholder'])) {
    $placeholder = 'Paieška';
} else {
    $placeholder = esc_html($args['placeholder']);
}
?>

<body class="color-<?= $backgroundColor ?>">
<main>
<header>
    <!--Order class in divs-->
    <!--order-1 - small screens first position in nav-->
    <!--order-md-1 - medium screens first position in nav-->
    <div id="navbarHeader">
        <nav class="navbar navbar-expand-md navbar-light border-md-bottom custom-border">
            <!-- Pages menu-->
            <?php get_template_part('parts/nav/pages-menu') ?>
            <!--Search form-->
            <?php get_template_part('parts/nav/search', 'custom-search',
                [
                    'input-color' => $inputColor,
                    'placeholder' => $placeholder,
                ]);
            ?>
            <!--Multi languages-->
            <?php get_template_part('parts/nav/languages') ?>
            <div class="mx-auto order-0 mb-5 w-100">
            </div>
        </nav>

        <!--Mobile menu-->
        <div class="mother-mobile">
            <div class="float-nav">
                <a href="#" class="menu-btn">
                    <ul>
                        <li class="line"></li>
                        <li class="line"></li>
                        <li class="line"></li>
                    </ul>
                    <div class="menu-txt">menu</div>
                </a>
            </div>

            <div class="main-nav">
                <ul>
                    <?php foreach ($primary_menu as $item): ?>
                        <li class="nav-item <?php if ($item->active): ?>active<?php endif; ?>">
                            <a class="nav-link hover-blue <?= $fontColor ?>"
                               href="<?= $item->url ?>"><?= ucfirst($item->title) ?></a>
                        </li>
                    <?php endforeach; ?>
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
        </div>
    </div>
</header>