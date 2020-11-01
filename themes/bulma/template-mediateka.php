<?php
$searchTerm = isset($_POST["searchTerm"])? $_POST["searchTerm"] : "" ;

$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'orderby' => 'date',
    'posts_per_page' => 9,
    'paged' => $page,
    's' => $searchTerm
);

?>
<?php get_template_part('parts/head') ?>
<?php get_template_part('parts/header', 'custom-nav', [
    'background-color' => 'blue',
    'font-color' => 'white',
    'input-color' => 'blue',
    'placeholder' => 'Įveskite ieškomą raktžodį' //Para traducir
]) ?>
<?php get_template_part('parts/banner', 'banner', ['size' => 'size1',
													'background-color' => 'blue',
												    'font-color' => 'white',
												    'input-color' => 'blue',
												    'placeholder' => 'Įveskite ieškomą raktžodį']) //Para traducir]); ?>

    <div class="container w-90 mx-auto">


    	<div class="container w-90 mx-auto">
    
		    <div id="two-columns_busimi-iviki" class="row">
		        

		        <?php get_template_part('parts/horizontal-vertical') ?>

		    </div>
		    
		    <script>
		    	// alert("simon");
		    	alert("<? echo ($searchTerm); ?>");
		    </script>
		    <?php 
		    // $searchTerm = isset($_POST["searchTerm"])? $_POST["searchTerm"] : null ;
		    
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


<?php get_footer(); ?>

<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/horizontal-vertical.js'; ?>" type="module"></script>