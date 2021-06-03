<?php
//include_once("libreria/motor.php");
include_once("libreria/carteles.php");


$cats=Cartel::categorias();

$datos = new Cartel();
$cartel = new Cartel();

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
$texto1 = '';
$texto2 = '';
$imagen1 = '';

if (!empty($_POST)) {
    
    //$operacion = $_GET['operacion']  ;
	$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : 'alta' ;
	
	//echo "*".$operacion."*";
	
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
		$cartel->guardar();
	}
}
?>

 
<div class="container">
  
<div class="row" >
 
  <div class="col-sm-5" >
  <div id="capa_d">
   
  <form  role="form" method="POST" action="">
   <legend>Registro Cartelera</legend>
   <div class="row">
   
	 <div class="form-group">
	 
	     <div class="col-xs-12">
		  <label>Titulo</label>
		  <input type="text"  size="20" name="txtTitulo" class="form-control" id="tit_titulo"
				   placeholder="Encabezado/Titulo de la publicacion">
		 </div>
		 
		 <div class="col-xs-12">
		   <label>Texto</label>
		   <textarea  rows="3" cols="30" name="txtTexto" class="form-control" id="aut_texto">
		   </textarea> 		   
		 </div>
		 
		 <div class="col-xs-12">
		   <label>Otro Texto</label>
		   <textarea  rows="3" cols="30" name="txtTexto1" class="form-control" id="aut_texto1">
		   </textarea> 		   
		 </div>
		 
		 <div class="col-xs-12">
		   <label>Mas Texto</label>
		   <textarea  rows="3" cols="30" name="txtTexto2" class="form-control" id="aut_texto2">
		   </textarea> 		   
		 </div>
		
		 		   
	 </div> 
   
	 
	 
	   
	  <div class="form-group">
	  <div class="col-xs-8">
		<label>Link</label>
		<input type="url"  size="10" name="txtLink" class="form-control" id="tit_link"
			   placeholder="Un enlace optativo">
		</div>	   
	   
     <div class="col-xs-4">	 
	 <label>Categoria</label>
	   <input type="text" class="form-control" name="txtCategoria" id="tit_categoria">
	   <select class="form-control" id="sel_categoria" onchange="poner_cat();">
	   <?php
		  foreach($cats as $cat){
           echo '<option>'.$cat['categoria'].'</option>';
          }?> </select> 
	 </div>  
	 </div>   
	 
	<div class="form-group">
	  <div class="col-xs-6">
	   <div class="ui-widget">
		<label for="tit_origen">Fecha Desde</label>
		<input type="text"  size="20" name="txtV_desde" class="form-control" id="tit_fechaD"
			   placeholder="Fecha de inicio de la publicacion">
		</div>	   
	   </div>
	    <div class="col-xs-6">
		<label>Fecha Hasta</label>
		<input type="text"  size="20" name="txtV_hasta" class="form-control" id="tit_fechaH"
			   placeholder="Fecha de finalizacion de la publicacion">
	    </div>	   
	   </div> 
	  
	 <div class="form-group">
	 <div class="col-xs-12">
		<label>Plantilla</label>
		<input type="text"  size="20" name="txtPlantilla" class="form-control" id="tit_Plantilla"
			   placeholder="Modelo de diseño">
	  </div> 
	  </div>
	  
	  <div class="form-group">
	  <div class="col-xs-6">
			Activo<input type="checkbox"  name="txtActivo"  id="tit_activo" checked  >
	  </div>	   
	  </div>
	   
	 <div class="form-group">
	    <div class="col-xs-12">
	     <label>Imagen Cuerpo</label>
		 <input  id="t_file" type="text"   name="txtImagen" class="form-control" 
			  value="">
	  </div>
	  </div>
	  
	 <div class="form-group">
	    <div class="col-xs-12">
	     <label>Imagen Encabezado</label>
		 <input  id="t_file1" type="text"   name="txtImagen1" class="form-control" 
			  value="">
	  </div>
	  </div>
	 
	  </div>

 <button method="post" type="submit" class="btn btn-default">Agregar</button>

	 </form>  

<form>
		  <div class="form-group">
			<label>Subir Imagen Cuerpo</label>
				<center><input type="file"  id="fileToUpload" onchange="upload_image(0);PonerNombreArchivo(0);"></center>
			
		  </div>
		  <div class="upload-msg"></div><!--Para mostrar la respuesta del archivo llamado via ajax -->
		 
	</form>
	<form>
		  <div class="form-group">
			<label>Subir Imagen Encabezado</label>
				<center><input type="file"  id="fileToUpload1" onchange="upload_image(1);PonerNombreArchivo(1);"></center>
			
		  </div>
		  <div class="upload-msg"></div><!--Para mostrar la respuesta del archivo llamado via ajax -->
		 
	</form>
  	 
 </div>
  </div>
  

</div>
</div>

</script>