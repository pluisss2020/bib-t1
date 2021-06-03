<?php
//include("libreria/motor.php");
include_once("libreria/carteles.php");

$cartel = new Cartel();
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

$cats=Cartel::categorias();

if (!empty($_POST)) {

    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : 'actualizar' ;
	//echo $operacion;
	if ($operacion == 'edicion'){
	  
	  
	  $id=$_POST['id_cart'];
	  
	  $A=Cartel::traer_datos($id);
	  
	    $categoria=$A['categoria'];
		$titulo=$A['titulo'];
		$texto=$A['texto'];
		$imagen=$A['imagen'];
		$plantilla=$A['plantilla'];
		$v_desde=$A['v_desde'];
		$v_hasta=$A['v_hasta'];
		$activo=$A['activo'];
		$link=$A['link'];
		$texto1=$A['texto1'];
		$texto2=$A['texto2'];
		$imagen1=$A['imagen1'];
	
		
		$accion=$_SERVER['HTTP_REFERER'].'?operacion=actualizar&id_cart='. $id;
		$btn_txt='Actualizar';
		$leyenda='Modificar Publicacion de Cartelera ';
		
	}
	
	if ($operacion == 'baja'){
	  
	  
	  $id=$_POST['id_cart'];
	  
	  $A=Cartel::traer_datos($id);
	  
	    $categoria=$A['categoria'];
		$titulo=$A['titulo'];
		$texto=$A['texto'];
		$imagen=$A['imagen'];
		$plantilla=$A['plantilla'];
		$v_desde=$A['v_desde'];
		$v_hasta=$A['v_hasta'];
		$activo=$A['activo'];
		$link=$A['link'];
		$texto1=$A['texto1'];
		$texto2=$A['texto2'];
		$imagen1=$A['imagen1'];
		
		$accion=$_SERVER['HTTP_REFERER'].'?operacion=borrar&id_cart='. $id;
		$btn_txt='Borrar';
		$leyenda='Eliminar';
	}
	
	
	
    
}

?>

<div id="capa_d"> 
<div class="container">
  
<div class="row" >
 
<div class="col-sm-5" >
  <legend><?php echo $leyenda;?></legend>
  <form  role="form" method="POST" action="<?php echo $accion;?>">
  <div class="row"> 
      <div class="col-xs-2">
        
        
     <?php 
	 if (isset($operacion)){
			if ($operacion == 'edicion' || $operacion == 'baja' ) {
			    /*echo $nombre;*/
				?>
				<label for="id_usuario" >ID:</label>
				<input id="id_cart" name="id_cart" type="text" class="form-control" disabled value="<?php echo $id; ?>"/>
				<?php
			}
		}	
        ?> 
      </div>  	 
	  <div class="col-xs-8">
	  <a href="#"><span onclick="cargar('#capa_L','mostrar_cartelera.php?b=<?php echo $id; ?>')">Vista Previa</span></a>
	  <span id="preview" onclick="preview();">Preview</span>
	  </div>

<div class="form-group">
	 
	     <div class="col-xs-12">
		  <label>Titulo</label>
		  <input type="text"  size="20" name="txtTitulo" class="form-control" id="tit_titulo"
				   placeholder="Encabezado/Titulo de la publicacion" value="<?php echo $titulo; ?>">
		 </div>
		 
		 <div class="col-xs-12">
		   <label>Texto</label>
		   <textarea rows="3" cols="30" name="txtTexto" class="form-control" id="aut_texto"><?php echo $texto; ?></textarea> 	   
		 </div>
		 
		 <div class="col-xs-12">
		   <label>Otro Texto</label>
		   <textarea rows="3" cols="30" name="txtTexto1" class="form-control" id="aut_texto1"><?php echo $texto1; ?></textarea> 	   
		 </div>
		 <div class="col-xs-12">
		   <label>Mas Texto</label>
		   <textarea rows="3" cols="30" name="txtTexto2" class="form-control" id="aut_texto2"><?php echo $texto2; ?></textarea> 	   
		 </div>
		 
</div> 	  

</div>

<div class="form-group">
	  <div class="col-xs-8">
		<label>Link</label>
		<input type="url"  size="10" name="txtLink" class="form-control" id="tit_link"
			   placeholder="Un enlace optativo" value="<?php echo $link; ?>">
		</div>	   
	   
     <div class="col-xs-4">	 
	 <label>Categoria</label>
	   <input type="text" class="form-control" name="txtCategoria" id="tit_categoria" value="<?php echo $categoria; ?>">
	   <select class="form-control" id="sel_categoria" onchange="poner_cat();">
	   <?php
		  foreach($cats as $cat){
           echo '<option>'.$cat['categoria'].'</option>';
          }?> </select> 

	   </select>
	 </div>  
	 </div>   
	 
<div class="form-group">
	  <div class="col-xs-6">
	   <div class="ui-widget">
		<label for="tit_origen">Fecha Desde</label>
		<input type="text"  size="20" name="txtV_desde" class="form-control" id="tit_fechaD"
			   placeholder="Fecha de inicio de la publicacion" value="<?php echo $v_desde; ?>">
		</div>	   
	   </div>
	    <div class="col-xs-6">
		<label>Fecha Hasta</label>
		<input type="text"  size="20" name="txtV_hasta" class="form-control" id="tit_fechaH"
			   placeholder="Fecha de finalizacion de la publicacion" value="<?php echo $v_hasta; ?>">
	    </div>	   
	   </div> 

<div class="form-group">
	 <div class="col-xs-12">
		<label>Plantilla</label>
		<input onchange="preview();" type="text"  size="2" name="txtPlantilla" class="form-control" id="tit_Plantilla"
			   placeholder="Modelo de diseño" value="<?php echo $plantilla; ?>">
	  </div> 
	  </div>
	  
	 
	   
<div class="form-group">
	  <div class="col-xs-6">
	  <?php
				 
				 if($activo==1){
				  $ch_a="checked";
				 }
				 if($activo==0){
				  $ch_a="unchecked";
				 }
				 
				 ?>
			Activo<input type="checkbox"  name="txtActivo"  id="tit_activo" <?php echo $ch_a; ?> >
	  </div>	   
	  </div>
	   	 	 	
	   <div class="form-group">
	    <div class="col-xs-12">
	     <label>Imagen Cuerpo</label>
		 <input  id="t_file" type="text"   name="txtImagen" class="form-control" 
			  value="<?php echo $imagen; ?>">
	  </div>
	  <div class="form-group">
	    <div class="col-xs-12">
	     <label>Imagen Encabezado</label>
		 <input  id="t_file1" type="text"   name="txtImagen1" class="form-control" 
			  value="<?php echo $imagen1; ?>">
	  </div>
	  
	  </div>
	  
	  
	   
  
	 <button method="post" type="submit" class="btn btn-default" ><?php echo $btn_txt;?></button>
   
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
