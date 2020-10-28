<?php
$getCategories = get_categories([
    'hide_empty' => 0,
]);

//Forming array [fatherCat => childCat]
$categories = array_map(function ($category){
    if ($category->parent !== 0){
        $fatherCategory = get_term($category->parent, 'category');
        return [$fatherCategory->name => $category->name];
    }
}, $getCategories);

//Removing empty
$categories = array_filter($categories, function ($category){
    return !empty($category);
});

//Removing first level of array
$processed = array();
foreach ($categories as $subarr) {
    foreach ($subarr as $id => $value) {
        if (!isset($processed[$id])) {
            $processed[$id] = array();
        }
        $processed[$id][] = $value;
    }
}

?>

<!-- Banner row -->
<div class="col border-top border-bottom mt-5 py-5">
    <h4 class="text-center mt-4 mb-0 font-weight-bold"><?php pll_e('Raktazodziai'); ?></h4>
    <div class="row mx-auto mb-3 pt-0">
        <div class="col-0 col-md-2"></div>
        <div class="col col-md-8 text-center">
            <p style="word-spacing: 20px; font-size: 1.2rem "
               class="text-muted-custom font-weight-bold">
                <?php foreach ($processed as $key => $item): ?>
                    <?php foreach ($item as $category): ?>
                        <?php echo $category; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </p>
        </div>
        <div class="col-0 col-md-2"></div>
    </div>
</div>