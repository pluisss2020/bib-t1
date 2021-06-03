<?php
include("libreria/motor.php");
include_once("libreria/libro_d.php");


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

    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : 'actualizar' ;
	//echo $operacion;
	if ($operacion == 'edicion' || $operacion == 'ver'){
	  
	  
	    $id=$_POST['id_lib'];
	  
	    $A=Libro_d::traer_datos($objConexion->enlace,$id);
	  
	    $autor=$A['Autor'];
		$titulo=$A['Titulo'];
		$edicion=$A['edicion'];
		$anio=$A['año'];
		$origen=$A['origen'];
		$tipo=$A['tipo'];
		$area=$A['Area'];
		$materia=$A['Materia'];
		$comentario=$A['Comentario'];
		$archivo=$A['Archivo'];
	  
	   
		$accion=$_SERVER['HTTP_REFERER'].'?operacion=actualizar&id_lib='. $id;
		$btn_txt='Actualizar';
		$leyenda='Modificar datos ';
		if ($operacion == 'ver')
		  $leyenda='DATOS ';
		
	}
	
	if ($operacion == 'baja'){
	  
	  
	  $id=$_POST['id_lib'];
	  
	  $A=Libro_d::traer_datos($objConexion->enlace,$id);
	  
	    $autor=$A['Autor'];
		$titulo=$A['Titulo'];
		$edicion=$A['edicion'];
		$anio=$A['año'];
		$origen=$A['origen'];
		$tipo=$A['tipo'];
		$area=$A['Area'];
		$materia=$A['Materia'];
		$comentario=$A['Comentario'];
		$archivo=$A['Archivo'];
		
		$accion=$_SERVER['HTTP_REFERER'].'?operacion=borrar&id_lib='. $id;
		$btn_txt='Borrar';
		$leyenda='Eliminar';
	}
	
	
	
    
}

?>



<div class="container">
  
<div class="row" >
 
  <div class="col-sm-6" >
  <div id="capa_d">
   
  <form  role="form" method="POST" action="<?php echo $accion;?>">
   <legend><?php echo $leyenda;?></legend>
   <?php 
	 if (isset($operacion)){
			if ($operacion == 'edicion' || $operacion == 'baja' ) {
			    /*echo $nombre;*/
				?>
				<label for="id_usuario" >ID:</label>
				<input id="id_lib" name="id_lib" type="text" class="form-control" disabled value="<?php echo $id; ?>"/>
				<?php
			}
		}	
        ?> 
   
   <div class="row">
   
	 <div class="form-group">
		 <div class="col-xs-12">
		   <label>Autor</label>
		   <input type="text"  size="20" name="txtAutor" class="form-control" 
				   placeholder="nombre del Autor" value="<?php echo $autor; ?>">
		 </div>
		
		 <div class="col-xs-12">
		  <label>Titulo</label>
		  <input type="text"  size="20" name="txtTitulo" class="form-control" 
				   placeholder="Nombre de la publicacion" value="<?php echo $titulo; ?>">
		 </div>		   
	 </div> 
   
	 
	 
	  <div class="form-group">
	  <div class="col-xs-6">
	 
		<label>Idioma</label>
		<input type="text"  size="10" name="txtOrigen" class="form-control" 
			   placeholder="Origen de la edición" value="<?php echo $origen; ?>">
		</div>  
	   
	    <div class="col-xs-6">
		<label>Año de Publicación</label>
		<input type="text"  size="10" name="txtAnio" class="form-control" 
			   placeholder="Año de la edición" value="<?php echo $anio; ?>">
	    </div>	   
	   </div> 
	  
	  <div class="form-group">
	  <div class="col-xs-8">
		<label>Edicion</label>
		<input type="text"  size="10" name="txtEdicion" class="form-control" 
			   placeholder="Detalles de la edición" value="<?php echo $edicion; ?>">
		</div>	   
	   
     <div class="col-xs-4">	 
	 <label>Tipo</label>
	   <select class="form-control" name="txtTipo">
	        <option><?php echo $tipo; ?></option>
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
		<input type="text"  size="20" name="txtArea" class="form-control" 
			   placeholder="" value="<?php echo $area; ?>">
	  </div> 
	  
	  <div class="col-xs-6">
		<label>Materia</label>
		<input type="text"  size="20" name="txtMateria" class="form-control" 
			   placeholder="" value="<?php echo $materia; ?>">
	  </div>	   
	  </div>
	  
	  <div class="form-group">
	  <div class="col-xs-12">
		<label for="ejemplo_Observaciones">Comentario</label>
		<input type="text"  size="40" name="txtComentario" class="form-control" 
			   placeholder="" value="<?php echo $comentario; ?>">
	  </div>		   
	  </div>
	   
	 <div class="form-group">
	    <div class="col-xs-12">
	     <label>Archivo</label>
		 <input  id="t_file" type="text"   name="txtArchivo" class="form-control" 
			  value="<?php echo $archivo; ?>">
	  </div>
	  </div>
	  
	
	   
  </div>
<?php
if ($operacion != 'ver'){
echo '<button method="post" type="submit" class="btn btn-default">'.$btn_txt.'</button>';
}
?>
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
