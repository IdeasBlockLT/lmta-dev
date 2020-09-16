<?php
    #Setting background color
    if (!isset($args['background-color'])){
        $color = '';
    }else{
        $color = esc_html($args['background-color']);
    }

    #Setting font-color
    if (!isset($args['font-color'])){
        $fontColor = '';
    }else{
        $fontColor = esc_html($args['font-color']);
    }
?>

<body class="<?= $color ?>">
<header>
    <?php get_template_part('parts/nav', 'font-color', ['font-color' => $fontColor]) ?>
</header>