<?php
$categories = get_categories([
    'hide_empty' => 0,
]);
$getParentCategories = [];
$parentNames = [];
foreach ($categories as $item) {
    if ($item->parent == 0) {
        array_push($getParentCategories, [$item->term_id]);
        $name = [$item->term_id => $item->name];
        $parentNames = $parentNames + $name;
    }
}

$results = [];
foreach ($parentNames as $key => $parentName) {
    foreach ($categories as $category) {
        if ($category->term_id !== $key && $category->parent === $key) {
            array_push($results, [$parentName => $category->name]);
        }
    }
}

$processed = array();
foreach ($results as $subarr) {
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


