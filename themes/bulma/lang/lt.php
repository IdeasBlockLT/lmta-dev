<?php
/**
 * String translations, adding would show in wp-dashboard > languages > Strings Translations
 */

//Loads all categories to show as strings translations
$categories = get_categories();
foreach ($categories as $category){
    dump($category);
    pll_register_string(strtolower($category->name), $category->name);
}

pll_register_string(strtolower('soon_events'), 'Artimiausi renginiai');
pll_register_string(strtolower('read_more'), 'Skaityti daugiau');


