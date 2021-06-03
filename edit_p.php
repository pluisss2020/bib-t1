<?php
//include("libreria/motor.php");
include_once("libreria/persona.php");

$persona = new Persona();
$nombre="";
$apellido="";
$sexo="";
$dni="";
$carrera="";
$telefono="";
$email="";
$user="";
$passwd="";
$rol="";

if (!empty($_POST)) {

    $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : 'actualizar' ;
	//echo $operacion;
	if ($operacion == 'edicion'){
	  
	  
	  $id=$_POST['id_pers'];
	  
	  $A=Persona::traer_datos($id);
	  
	    $nombre=$A['nombre'];
		$apellido=$A['apellido'];
		$sexo=$A['sexo'];
		$dni=$A['dni'];
		$carrera=$A['carrera'];
		$telefono=$A['telefono'];
		$email=$A['email'];
		$user=$A['user'];
		$passwd=$A['passwd'];
		$rol=$A['rol'];
		
		$accion=$_SERVER['HTTP_REFERER'].'?operacion=actualizar&id_pers='. $id;
		$btn_txt='Actualizar';
		$leyenda='Modificar datos ';
		
	}
	
	if ($operacion == 'baja'){
	  
	  
	  $id=$_POST['id_pers'];
	  
	  $A=Persona::traer_datos($id);
	  
	    $nombre=$A['nombre'];
		$apellido=$A['apellido'];
		$sexo=$A['sexo'];
		$dni=$A['dni'];
		$carrera=$A['carrera'];
		$telefono=$A['telefono'];
		$email=$A['email'];
		$user=$A['user'];
		$passwd=$A['passwd'];
		$rol=$A['rol'];
		
		$accion=$_SERVER['HTTP_REFERER'].'?operacion=borrar&id_pers='. $id;
		$btn_txt='Borrar';
		$leyenda='Eliminar';
	}
	
	
	
    
}

?>

<div id="capa_d"> 
<div class="container">
  
<div class="row" >
 
<div class="col-sm-6">
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
				<input id="id_pers" name="id_pers" type="text" class="form-control" disabled value="<?php echo $id; ?>"/>
				<?php
			}
		}	
        ?> 
      </div>  	   
      <div class="col-xs-5">
			 <div class="form-group">
			   <label for="ejemplo_apellido">Nombre</label>
			   <input type="text"  size="20" name="txtNombre" class="form-control" id="ejemplo_nombre"
					   placeholder="Introduce el nombre" value="<?php echo $nombre; ?>"/>
			 </div>
	   </div>		   
	  
	   <div class="col-xs-5">
			 <div class="form-group">
			  <label for="ejemplo_nombre">Apellido</label>
			  <input type="text"  size="20" name="txtApellido" class="form-control" id="ejemplo_Apellido"
					   placeholder="Introduce el Apellido" value="<?php echo $apellido; ?>"/>
			 </div> 
	   </div>  
	  </div>
	  
	 <div class="row">   
		   <div class="col-xs-6">
			 <div  class="form-group">
			 <label>Sexo</label>
			    <div class="radio">
			     <label>
				 <?php
				 if($sexo==NULL){
				 $ch_m="checked";$ch_f="";}
				 if($sexo=='Masculino'){
				  $ch_m="checked";$ch_f="";
				 }
				 if($sexo=='Femenino'){
				  $ch_m="";$ch_f="checked";
				 }
				 
				 ?>
				  <input type="radio" name="txtSexo" id="sexo_1" value="Femenino" <?php echo $ch_f; ?>>
				  Femenino
			     </label>
			    </div>			  
			    <div class="radio">
			     <label>
				  <input type="radio" name="txtSexo" id="sexo_2" value="Masculino"  <?php echo $ch_m; ?>>
				  Masculino
			     </label>
			    </div>				 
			 </div> 
		   </div>
	  
	  
		<div class="col-xs-6">
			  <div class="form-group">
				<label for="ejemplo_dni">DNI</label>
				<input type="text"  size="20" name="txtDni" class="form-control" id="ejemplo_dni"
				<input type="text"  size="20" name="txtni" class="form-control" id="ejemplo_dni"
					   placeholder="Introduce el DNI" value="<?php echo $dni; ?>"/>
			  </div> 
		</div> 
	  </div>
	  
	  <div class="row">  	   
		   <div class="col-xs-6">
			 <div class="form-group">
			   <label for="ejemplo_email">email</label>
			   <input type="text"  size="20" name="txtEmail" class="form-control" id="ejemplo_email"
					   placeholder="correo electronico" value="<?php echo $email; ?>"/>
			 </div>
		   </div>		   
		   
		   <div class="col-xs-6">
			 <div class="form-group">
			   <label for="ejemplo_telefono">telefono-Movi</label>
			   <input type="text"  size="20" name="txtTelefono" class="form-control" id="ejemplo_telefono"
					   placeholder="Telefono fijo o movil" value="<?php echo $telefono; ?>"/>
			 </div>
		   </div>		   
	  </div>
	  
	
	   <div class="row">  

          	   
          <div class="col-xs-6">
			 <div  class="form-group">   
				 <label>Carrera</label>
				   <select class="form-control" name="txtCarrera" >
				      <option><?php echo $carrera; ?></option>
					  <option>Electronica</option>
					  <option>Construcciones</option>
					  <option>Electromecanica</option>
					  <option>Quimica</option>
					  <option>Software</option>
					  <option>Multimedia</option>
					  <option>Redes</option>
					  <option>Mecatronica</option>
				   </select>
			 </div>   
			</div>  
	 		  

		  	   
		   
		   <div class="col-xs-6">
			 <div class="form-group">
			   <label>Rol</label>
			   <select class="form-control" name="txtRol" >
			         <option><?php echo $rol; ?></option>
					 <option>Estudiante</option>
					 <option>Docente</option>
					 <option>Bibliotecario</option>
					 <option>administrador</option>
					 <option>Invitado</option>
				</select>	  
			 </div>
		   </div>		   
	  </div>
	  
	  
	 <div class="row">		
	 <div class="col-xs-4">
			 <div class="form-group">
			   <label for="ejemplo_user">Usuario</label>
			   <input type="text"  size="20" name="txtUser" class="form-control" id="ejemplo_user"
					   placeholder="Nombre de usuario" value="<?php echo $user; ?>"/>
			 </div>
		   </div>	
	 <div class="col-xs-4">
			 <div class="form-group">
			   <label for="ejemplo_pass">Password</label>
			   <input type="password"  size="20" name="txtPass" class="form-control" id="ejemplo_pass"
					   placeholder="Cambiar Pass" value=""/>
			 </div>
		   </div>	
	
	 <div class="col-xs-4">
			 <div class="form-group">
			   <label for="ejemplo_pass1">Repetir Pass</label>
			   <input type="password"  size="20" name="txtPass1" class="form-control" id="ejemplo_pass1"
					   placeholder="Cambiar Pass" value=""/>
			 </div>
		   </div>	
	
	 
	 </div>
		 
  
  <button method="post" type="submit" class="btn btn-default" ><?php echo $btn_txt;?></button>
   
  </form>
 </div>
</div>
  

</div>


</div>
