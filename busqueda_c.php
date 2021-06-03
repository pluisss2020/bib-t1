<?php
//include_once("libreria/motor.php");
include_once("libreria/carteles.php");

$str_b =  $_POST['b'];
//echo $str_b;
$cart=Cartel::buscar($str_b);

?>
<div id="popup" style="display: none;">
    <div class="content-popup">
        <div class="close" onclick="cerrarPU();"><a href="#" id="close">cerrar</a></div>
        <div>
           <h2 id="titulo_PU"></h2>
           <h3 id="texto_PU"></h3>
        </div>
    </div>
</div>
<?php
if (isset($cart)){
?>

<div class="panel panel-default " >
 
  <div class="panel-heading " >Carteles Encontrados</div> 
	<div  style="overflow: scroll;height: 350px;"> 	  
	 <table class="tabla_edicion table table-hover">
	  <thead>
			  <tr>
			  <th id="proceso">Id</th>
              <th>Titulo</th>
			  <th>Fecha</th>
			  <th>Activo</th>
			 
			  
			  </tr>
		  </thead>
	   
	  <tbody>
	 
	  
	  <?php
		  foreach($cart as $carteles){
		   echo "
		   <tr>
		   <td>$carteles[id_cartel]</td>
		   <td><div onclick='abrirPU(\"$carteles[titulo]\",\"$carteles[texto]\");'>$carteles[titulo]</div></td>
		   <td>$carteles[v_desde]</td>
		   <td>$carteles[activo]</td>";
		  	  
	     echo '<td><button class="btn btn-primary btn-xs" onclick="editar(' . $carteles['id_cartel'] . ')" >Editar</button></td>';
		 echo '<td><button class="btn btn-primary btn-xs" onclick="borrar(' . $carteles['id_cartel'] . ')" >Borrar</button></td>';
         
		  echo " </tr> ";
		   }
	  ?>
	
	  </tbody>
	  
	  </table>
  
	  </div></div>
	  </div>
	 
	  
<?php
}
?>