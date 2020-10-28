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
<div class="row mb-5 mt-5">
    <div class="col-12 mx-auto mt-3">
        <?php foreach ($processed as $key => $item): ?>
            <h4 class="text-center mt-4 mb-0 color-white">
                Rūšiuoti pagal <?php echo $key; ?>
            </h4>
            <div class="row mx-auto mb-3 pt-0">
                <div class="col-0 col-md-2"></div>
                <div class="col col-md-8 text-center">
                    <p style="word-spacing: 20px; font-size: 1.2rem "
                       class="text-muted-custom font-weight-bold">
                        <?php foreach ($item as $category): ?>
                            <?php echo $category; ?>
                        <?php endforeach; ?>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
