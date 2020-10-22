<?php
    $primary_menu = get_menu_items('primary');

    if (is_page_template('template-mediateka.php')){
        $fontColor = 'white hover-black';
    }else{
        $fontColor = 'hover-blue';
    }
?>
<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2 mobile-hide">
    <ul class="navbar-nav mr-auto">
        <?php foreach ($primary_menu as $item): ?>
            <li class="nav-item <?php if ($item->active): ?>active<?php endif; ?>">
                <a class="nav-link <?php echo $fontColor; ?>"
                   href="<?= $item->url ?>"><?= ucfirst($item->title) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>