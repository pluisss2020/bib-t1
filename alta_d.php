<?php
include_once("libreria/motor.php");
include_once("libreria/libro_d.php");



$datos = new Libro_d();
$libro_d = new Libro_d();

$operacion = '';
$id_libro = '';
$autor = '';
$titulo = '';
$edicion = '';
$anio = '';
$origen = '';
$tipo = '';
$area = '';
$materia = '';
$comentario = '';
$archivo = '';
if (!empty($_POST)) {
    
    //$operacion = $_GET['operacion']  ;
	$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : 'alta' ;
	
	//echo "*".$operacion."*";
	
	if ($operacion == 'alta' && !isset($_GET['id_lib'])){
	    echo '1-alta';
		$libro_d->autor=$_POST['txtAutor'];
		$libro_d->titulo=$_POST['txtTitulo'];
		$libro_d->edicion=$_POST['txtEdicion'];
		$libro_d->anio=$_POST['txtAnio'];
		$libro_d->origen=$_POST['txtOrigen'];
		$libro_d->tipo=$_POST['txtTipo'];
		$libro_d->area=$_POST['txtArea'];
		$libro_d->materia=$_POST['txtMateria'];
		$libro_d->comentario=$_POST['txtComentario'];
		$libro_d->archivo=$_POST['txtArchivo'];
		$libro_d->guardar();
	}
}
?>

 
<div class="container">
  
<div class="row" >
 
  <div class="col-sm-6" >
  <div id="capa_d">
   
  <form  role="form" method="POST" action="">
   <legend>Registro Publicaciones Digitales</legend>
   <div class="row">
   
	 <div class="form-group">
		 <div class="col-xs-12">
		   <label>Autor</label>
		   <input type="text"  size="20" name="txtAutor" class="form-control" id="aut_nombre"
				   placeholder="nombre del Autor">
		 </div>
		
		 <div class="col-xs-12">
		  <label>Titulo</label>
		  <input type="text"  size="20" name="txtTitulo" class="form-control" id="tit_nombre"
				   placeholder="Nombre de la publicacion">
		 </div>		   
	 </div> 
   
	 
	 
	  <div class="form-group">
	  <div class="col-xs-6">
	   <div class="ui-widget">
		<label for="tit_origen">Idioma</label>
		<input type="text"  size="10" name="txtOrigen" class="form-control" id="tit_origen"
			   placeholder="Origen de la edición">
		</div>	   
	   </div>
	    <div class="col-xs-6">
		<label>Año de Publicación</label>
		<input type="text"  size="10" name="txtAnio" class="form-control" id="tit_anio"
			   placeholder="Año de la edición">
	    </div>	   
	   </div> 
	  
	  <div class="form-group">
	  <div class="col-xs-8">
		<label>Edicion</label>
		<input type="text"  size="10" name="txtEdicion" class="form-control" id="tit_edicion"
			   placeholder="Detalles de la edición">
		</div>	   
	   
     <div class="col-xs-4">	 
	 <label>Tipo</label>
	   <select class="form-control" name="txtTipo">
	   
		  <option>Libro</option>
		  <option>Revista</option>
		  <option>Video</option>
		  <option>Audio</option>
		  <option>AudioTexto</option>
		  <option>Otros</option>
	   </select>
	 </div>  
	 </div>   
	 
	 
	 <div class="form-group">
	 <div class="col-xs-6">
		<label>Area</label>
		<input type="text"  size="20" name="txtArea" class="form-control" id="tit_Area"
			   placeholder="">
	  </div> 
	  
	  <div class="col-xs-6">
		<label>Materia</label>
		<input type="text"  size="20" name="txtMateria" class="form-control" id="tit_Materia"
			   placeholder="">
	  </div>	   
	  </div>
	  
	  <div class="form-group">
	  <div class="col-xs-12">
		<label for="ejemplo_Observaciones">Comentario</label>
		<input type="text"  size="40" name="txtComentario" class="form-control" id="tit_Comentario"
			   placeholder="">
	  </div>		   
	  </div>
	   
	 <div class="form-group">
	    <div class="col-xs-12">
	     <label>Archivo</label>
		 <input  id="t_file" type="text"   name="txtArchivo" class="form-control" 
			  value="">
	  </div>
	  </div>
	  
	  
	   
  </div>

 <button method="post" type="submit" class="btn btn-default">Agregar</button>

	 </form> 

<form>
		  <div class="form-group">
			<label>Subir archivo</label>
				<center><input type="file"  id="fileToUpload" onchange="upload_pdf();PonerNombreArchivo();"></center>
			
		  </div>
		  <div class="upload-msg"></div><!--Para mostrar la respuesta del archivo llamado via ajax -->
		 
</form>
		
 </div>
  </div>
  

</div>
</div>
<script>
$( "#tit_origen" ).autocomplete({
  
   source: "sugerir.php",
   minLength: 1,
   select: function(event,ui){
    
    }
   
});

</script>