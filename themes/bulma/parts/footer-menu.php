<?php
$footer_menu = get_menu_items('footer');

?>
<div class="container w-90 mx-auto py-5">
    <div class="row">
        <div id="first" class="col border-right mr-3">
            <ul class="text-left">
                <li class="custom-li li-label"><h3>Menu</h3></li>
                <?php foreach ($footer_menu as $item): ?>
                    <li class="custom-li">
                        <a class="custom-a" href="<?= $item->url; ?>"><?= ucfirst($item->title); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div id="contact-footer" class="col mr-3">
            <?php if (is_active_sidebar('contact')): ?>
                <?php dynamic_sidebar('contact') ?>
            <?php endif ?>
        </div>
        <div id="follow-footer" class="col border-left mr-3">
            <?php if (is_active_sidebar('follow')): ?>
                <?php dynamic_sidebar('follow') ?>
            <?php endif ?>
        </div>
    </div>
</div>