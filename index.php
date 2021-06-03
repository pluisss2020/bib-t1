<?php

include("menu_bs.php");
echo '
<div class="container-fluid" id="capa_T">
	<div class="row">
	 
	  <div class="col-sm-3">
	  <div id="capa_d">
	  <H3>BIBLIOTECA T1</H3>
	  <H4>Publicaciones Digitales</H4>
	  <ul class="nav nav-pills nav-stacked">
	    <li><a href="#"><span onclick="cargar(\'#capa_C\',\'txts/origen.html\')">Origen</span></a></li>
        <li><a href="#"><span onclick="cargar(\'#capa_C\',\'txts/objetivo.html\')">Objetivo</span></a></li>
        <li><a href="#"><span onclick="cargar(\'#capa_C\',\'txts/tecnologias.html\')">Tecnologias</span></a></li>
        <li><a href="#"><span onclick="cargar(\'#capa_C\',\'txts/proyectos.html\')">Proyectos</a></span></li>
		<li><a href="#"><span onclick="cargar(\'#capa_C\',\'txts/referencias.html\')">Referencias</a></span></li>
           
	  </ul>
	  </div>
	  </div>
	  
	  <div class="col-sm-6">
	  <div id="capa_C">	
	  <div id="titulo">	</div>
	  <div id="contenido">	</div>
	  <H3></H3>
	  </div>
	  </div>
	  
	  <div class="col-sm-3" >
	  <H4>
	  <div id="n_proyecto"  style="position: fixed;color: RED"></div>
	  <br><br></H4>
	  
	  <div id="capa_P" style="position: absolute">	
	  
	  </div>
	  </div>

	</div>
 </div>
 
';
echo "<script>";
echo "cargar('#capa_C','mostrar_cartelera.php?b=Portada');";
echo "</script>";
?>

