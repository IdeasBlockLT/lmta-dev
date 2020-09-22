<?php /* Template Name: Mediateka */

$resource = new ResourceSpaceController();
//$results = $resource->doSearch();
//$sizes = $resource->getResourceAllImageSizes(1001, true);
//$resource->createResource();
?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header', 'custom-nav', [
    'background-color' => 'blue',
    'font-color' => 'white',
    'input-color' => 'blue',
    'placeholder' => 'Įveskite ieškomą raktžodį' //Para traducir
]) ?>

    <div class="container w-90 mx-auto">
        <div class="row mb-5">
        </div>
    </div>
