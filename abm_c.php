<?php
//include_once("libreria/motor.php");
include_once("libreria/carteles.php");
/*
$id_cartel,$categoria,$titulo,$texto,$imagen,$plantilla,$v_desde,$v_hasta,$activo,$link

id_cartel,categoria,titulo,texto,imagen,plantilla,v_desde,v_hasta,activo,link
*/

$datos = new Cartel();
$cartel = new Cartel();

include("menu_bs.php");

$operacion = '';
$id_cartel = '';
$categoria = '';
$titulo = '';
$texto = '';
$imagen = '';
$plantilla = '';
$v_desde = '';
$v_hasta = '';
$activo = '';
$link = '';
$texto1 = '';
$texto2 = '';
$imagen1 = '';



echo '
<script>
 
function PonerNombreArchivo(id){
    var f=["t_file","t_file1"];
	var dest=["fileToUpload","fileToUpload1"];
    var x = document.getElementById(dest[id]);
    var txt = "";
    var file = x.files[0];
                
    txt = file.name ;
           
    document.getElementById(f[id]).value = txt;
}
</script>
';

if (!empty($_POST)) {

    $operacion = isset($_GET['operacion']) ? $_GET['operacion'] : 'alta' ;
	//echo $operacion;
	if ($operacion == 'alta' && !isset($_GET['id_cart'])){
	    echo '1-alta';
		$cartel->categoria=$_POST['txtCategoria'];
		$cartel->titulo=$_POST['txtTitulo'];
		$cartel->texto=$_POST['txtTexto'];
		$cartel->imagen=$_POST['txtImagen'];
		$cartel->plantilla=$_POST['txtPlantilla'];
		$cartel->v_desde=$_POST['txtV_desde'];
		$cartel->v_hasta=$_POST['txtV_hasta'];
		
		if(isset($_POST['txtActivo']))
		 $cartel->activo=1;
		else
         $cartel->activo=0;		
		
		$cartel->link=$_POST['txtLink'];
		$cartel->texto1=$_POST['txtTexto1'];
		$cartel->texto2=$_POST['txtTexto2'];
		$cartel->imagen1=$_POST['txtImagen1'];
		
		$cartel->guardar($objConexion->enlace);
	}
	if ($operacion == 'actualizar' && isset($_GET['id_cart'])){
	    //echo '2-actualizar';
		$cartel->categoria=$_POST['txtCategoria'];
		$cartel->titulo=$_POST['txtTitulo'];
		$cartel->texto=$_POST['txtTexto'];
		$cartel->imagen=$_POST['txtImagen'];
		$cartel->plantilla=$_POST['txtPlantilla'];
		$cartel->v_desde=$_POST['txtV_desde'];
		$cartel->v_hasta=$_POST['txtV_hasta'];
		
		if(isset($_POST['txtActivo']))
		 $cartel->activo=1;
		else
         $cartel->activo=0;		
		
		$cartel->link=$_POST['txtLink'];
		$cartel->texto1=$_POST['txtTexto1'];
		$cartel->texto2=$_POST['txtTexto2'];
		$cartel->imagen1=$_POST['txtImagen1'];
		
		
		$cartel->actualizar($_GET['id_cart']);
		header("Location: ".$_SERVER['PHP_SELF']);
	}
	if ($operacion == 'borrar' && isset($_GET['id_cart'])){
	    //echo '3-eliminar';
		$cartel->borrar($_GET['id_cart']);
	}
	
	/*
    if ($operacion == 'edicion' && isset($_GET['id_cart'])) {
        //echo '3-edicion';
        
        $id = $_GET['id_cart'];

        $A=cartel::traer_datos($objConexion->enlace,$id);

        $categoria=$A['categoria'];
		$titulo=$A['titulo'];
		$texto=$A['texto'];
		$imagen=$A['año'];
		$plantilla=$A['plantilla'];
		$v_desde=$A['v_desde'];
		$v_hasta=$A['v_hasta'];
		$activo=$A['activo'];
		$link=$A['link'];
		$archivo=$A['archivo'];
		
	
    }
   */
	
	
	
		
    
}


?>
<script src="bootstrap/js/funciones_c.js"></script>
<link rel="stylesheet" href="bootstrap/carteles.css">
<div class="container-fluid">
   <nav class="navbar navbar-default " role="navigation" >
    
      <ul class="nav navbar-nav" style="padding-top: 10px;padding-bottom: 0px;">
	  <span style="padding-right: 20px;font-weight: bold;">Administracion Cartelera</span>
	  <?php 
		if (isset($_SESSION['username']) && $_SESSION['rol']=='administrador'){
		 echo '<button type="button" class="btn btn-primary  btn-sm"   onclick="cargar(\'#capa_d\',\'alta_c.php\')">Alta</button>';
	    
		}
	  ?>
       
	  </ul>      
      
      
	  
	  
      <ul class="nav navbar-nav" style="padding-top: 10px;padding-bottom: 0px;">
        <input type="text"  id="txt_b_c" placeholder="Buscar" style="position: absolute;right: 100px;" >
		<button type="button" id="btn_b_c" class="btn btn-primary btn-sm" style="position: absolute;right: 20px;">Buscar</button>
      </ul>
	 
	   
     
	 </div> 
	 
   </nav>
 </div>


<div class="row">
 
  <div class="col-sm-5">
  <div id="capa_d">
  
  </div>
  </div>
  
  <div class="col-sm-7">
  <div id="capa_L">	
  
   </div>
</div>



</div>
</div>
</body>

</html>