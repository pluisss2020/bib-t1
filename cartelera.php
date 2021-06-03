<?php
include("menu_bs.php");

include_once("libreria/carteles.php");


$cats=Cartel::categorias();


echo '
<div class="container-fluid" >

<div class="row">
 
  <div class="col-sm-4">
  <div id="capa_d">
 
	  <H3>BIBLIOTECA T1</H3>
	  <H4>Cartelera</H4>
	  <ul class="nav nav-pills nav-stacked">';

foreach($cats as $cat){
echo '<li><a href="#"><span onclick="cargar(\'#capa_C\',\'mostrar_cartelera.php?b='.$cat['categoria'].'\')">'.$cat['categoria'].'</span></a></li>'  ; $cat['categoria'];
}	  
	   
		echo '           
	  </ul>
	</div>
    </div>
	<div class="col-sm-8">
	  <div id="capa_C">	
	  
	  </div>
	</div>	
	  
	  </div>
	 
 </div>
';
?>

