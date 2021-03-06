<?php

#Setting input-color
if (!isset($args['background-color'])) {
    $background_color = 'white';
    $text_color = "black";
} else {
    $background_color = esc_html($args['background-color']);
    $text_color = "whitesmoke";
}
if ($text_color === "whitesmoke"){
    $logo = 'logo_lmta_white.png';
}
else{
    $logo = 'logo_lmta.png';
}

?>
<!-- Banner row -->
<div class="blog-header py-4 mb-2">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col pt-1">
            <a class="text-muted" href="#"></a>
        </div>
        <div class="col-10 text-center" style="background-color: #5797fb00">
            <p class="d-inline-block align-center custom-banner <?= esc_html($args['size']) ?>"   style="background-color: #5797fb00">
                <a href="<?php echo home_url(); ?>">
                    <img id="banner-logo" style="width: 6%" class="mx-auto d-inline-block align-self-center mr-3 img-thumbnail border-0 w-50 color-<?= $background_color ?>"
                         src="<?php bloginfo('stylesheet_directory') ?>/assets/images/<?php echo($logo);?>" alt="" style="background-color: #5797fb00">
                </a>
                <strong style="color:<?php echo($text_color); ?>;" class="custom-size-banner"><?php bloginfo('name') ?> <small id="tv" class="text-uppercase" style="color:<?php echo($text_color); ?>; display: table-caption"><?php bloginfo('description') ?></small></strong>
            </p>
        </div>
        <div class="col d-flex justify-content-end align-items-center">
        </div>
    </div>
</div>