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
        <?php 
        	if(isset($_POST["searchTerm"]))
			{
				$searchTerm = $_POST['searchTerm'];
				
			}
			get_template_part('parts/mediateka-keywords', null, array(   'searchTerm'   => $search_term));
         ?>
    </div>
