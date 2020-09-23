<?php
$footer_menu = get_menu_items('footer');

?>
<!--<div class="container w-90 mx-auto">-->
    <div class="row mx-auto pb-3 pt-4" id="menus-footer">
        <div id="first" class="col border-md-right mr-3 border-bottom border-md-bottom-0 pb-4 pb-md-0">
            <ul class="custom-display-footer pl-0">
                <li class="custom-li li-label"><h3>Menu</h3></li>
                <?php foreach ($footer_menu as $item): ?>
                    <li class="custom-li">
                        <a class="custom-a hover-blue" href="<?= $item->url; ?>"><?= ucfirst($item->title); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="contact-footer" class="col mr-3 border-bottom border-md-bottom-0 pb-4 pb-md-0 pt-4 pt-md-0">
            <?php if (is_active_sidebar('contact')): ?>
                <?php dynamic_sidebar('contact') ?>
            <?php endif ?>
        </div>
        <div id="follow-footer" class="col mr-3 pl-md-4 border-bottom border-md-bottom-0 border-md-left pb-4 pb-md-0 pt-4 pt-md-0">
            <?php if (is_active_sidebar('follow')): ?>
                <?php dynamic_sidebar('follow') ?>
            <?php endif ?>
        </div>
    </div>
<!--</div>-->