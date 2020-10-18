<?php
$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'orderby' => 'date',
    'posts_per_page' => 9,
    'paged' => $page
);

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header', 'custom-nav', [
    'background-color' => 'blue',
    'font-color' => 'white',
    'input-color' => 'blue',
    'placeholder' => 'Įveskite ieškomą raktžodį' //Para traducir
]) ?>

    <div class="container w-90 mx-auto">


    	<div class="container w-90 mx-auto">
    
		    <div id="two-columns_busimi-iviki" class="row">
		        
		        <?php get_template_part('parts/busimi-ivike') ?>

		        <?php get_template_part('parts/horizontal-vertical') ?>

		    </div>
		    

		    <?php 
		    $searchTerm = isset($_POST["searchTerm"])? $_POST["searchTerm"] : null ;
		    
			//<!--3 item column-->
	   		get_template_part('parts/1-item-row', null, array("args"=>$args, "searchTerm" => $searchTerm) );
	    	//<!--1 item column-->
	    	get_template_part('parts/3-item-row', null, array("args"=>$args, "searchTerm" => $searchTerm) ); 
				
			?>

		    
		</div>


        <?php 
			get_template_part('parts/mediateka-keywords');
         ?>


    </div>
