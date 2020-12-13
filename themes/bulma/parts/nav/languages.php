<?php
$languages = get_menu_items('language');
$current_lang = pll_current_language();
$current_lang_title = pll_current_language('name');
$activeLang = [];

foreach ($languages as $lang) {
    if ($lang->title === $current_lang_title) {
        $activeLang = $lang;
    }
}

if (is_page_template('template-mediateka.php')){
    $fontColor = 'black hover-white-extended';
    $active = 'active-white';
    $color = 'white';
}else{
    $fontColor = 'hover-blue-extended';
    $active = 'active-blue';
    $color = 'blue';
}
?>
<div class="navbar-collapse collapse w-100 order-2 order-md-2 dual-collapse2 border-top border-dark border-md-top-0 mb-3 mb-md-0 mobile-hide">
    <ul class="navbar-nav ml-auto">
        <?php foreach ($languages as $item): ?>
            <?php if ($current_lang_title !== $item->title): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $item->url ?>">

<!--                         <i class="fas fa-long-arrow-alt-right mr-md-3 <?php //echo $fontColor; ?>"></i> -->
                        <strong class="extended-<?php echo $color; ?>"><?= ucfirst($item->title) ?>&nbsp;</strong>
                         &nbsp;<span id="separator">|</span>

                    </a>
                </li>
            <?php else: ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <li class="nav-item <?php echo $active; ?>">
            <a class="nav-link" href="<?= $activeLang->url ?>">
                <strong><?= ucfirst($activeLang->title) ?></strong>
            </a>
        </li>
    </ul>
</div>