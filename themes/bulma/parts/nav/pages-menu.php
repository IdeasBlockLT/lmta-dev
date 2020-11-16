<?php
    $primary_menu = get_menu_items('primary');

    if (is_page_template('template-mediateka.php')){
        $fontColor = 'black hover-white';
        $active = 'active-white';
    }else{
        $fontColor = 'hover-blue';
        $active = 'active-blue';
    }
?>
<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2 mobile-hide">
    <ul class="navbar-nav mr-auto">
        <?php foreach ($primary_menu as $item): ?>
            <li class="nav-item <?php if ($item->active): ?><?php echo $active; ?><?php endif; ?>">
                <a class="nav-link <?php echo $fontColor; ?>"
                   href="<?= $item->url ?>"><?= ucfirst($item->title) ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>