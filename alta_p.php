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
    
    //$operacion = $_GET['operacion']  ;
	$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : 'alta' ;
	
	//echo "*".$operacion."*";
	
	if ($operacion == 'alta' && !isset($_GET['id_est'])){
	    //echo '1-alta';
		$persona->nombre=$_POST['txtNombre'];
		$persona->apellido=$_POST['txtApellido'];
		$persona->sexo=$_POST['txtSexo'];
		$persona->dni=$_POST['txtDni'];
		$persona->carrera=$_POST['txtCarrera'];
		$persona->telefono=$_POST['txtTelefono'];
		$persona->email=$_POST['txtEmail'];
		$persona->user=$_POST['txtUser'];
		$persona->rol=$_POST['txtRol'];
		if($_POST['txtPass'] != "" && $_POST['txtPass1'] != "" && ($_POST['txtPass'] == $_POST['txtPass1'])){
		  $persona->passwd=$_POST['txtPass'];
		}
        else{
		  $persona->passwd="";
		}	
		
		
		$persona->guardar();
	}
}
?>

<div id="capa_d"> 
<div class="container">
  
<div class="row" >
 
<div class="col-sm-6" > 
   
  <form  role="form" method="POST" action="">
  <legend>Agregar persona</legend>
     
     <div class="row">  	   
		   <div class="col-xs-6">
			 <div class="form-group">
			   <label for="ejemplo_apellido">Nombre</label>
			   <input type="text"  size="20" name="txtNombre" class="form-control" id="ejemplo_nombre"
					   placeholder="Introduce el nombre" />
			 </div>
		 </div>		   
	  
		   <div class="col-xs-6">
			 <div class="form-group">
			  <label for="ejemplo_nombre">Apellido</label>
			  <input type="text"  size="20" name="txtApellido" class="form-control" id="ejemplo_Apellido"
					   placeholder="Introduce el Apellido" />
			 </div> 
		   </div>
	  </div>
	  
	 <div class="row">   
		   <div class="col-xs-6">
			 <div  class="form-group">
			 <label>Sexo</label>
			    <div class="radio">
			     <label>
				  <input type="radio" name="txtSexo" id="sexo_1" value="Femenino" checked>
				  Femenino
			     </label>
			    </div>			  
			    <div class="radio">
			     <label>
				  <input type="radio" name="txtSexo" id="sexo_2" value="Masculino">
				  Masculino
			     </label>
			    </div>				 
			 </div> 
		   </div>
	  	
		<div class="col-xs-6">
			  <div class="form-group">
				<label for="ejemplo_Matricula">DNI</label>
				<input type="text"  size="20" name="txtDni" class="form-control" id="ejemplo_Matricula"
					   placeholder="Introduce el DNI" />
			  </div> 
		</div> 
	  </div>
	  
	  
	  <div class="row">  	   
		   <div class="col-xs-6">
			 <div class="form-group">
			   <label for="ejemplo_email">email</label>
			   <input type="text"  size="20" name="txtEmail" class="form-control" id="ejemplo_email"
					   placeholder="correo electronico" />
			 </div>
		   </div>		   
		   
		   <div class="col-xs-6">
			 <div class="form-group">
			   <label for="ejemplo_telefono">telefono-Movi</label>
			   <input type="text"  size="20" name="txtTelefono" class="form-control" id="ejemplo_telefono"
					   placeholder="Telefono fijo o movil" />
			 </div>
		   </div>		   
	  </div>
	  
	 <div class="row">		
		<div class="col-xs-6">
			 <div  class="form-group">   
				 <label>Carrera</label>
				   <select class="form-control" name="txtCarrera" >
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
					   placeholder="Nombre de usuario" "/>
			 </div>
		   </div>	
	 <div class="col-xs-4">
			 <div class="form-group">
			   <label for="ejemplo_pass">Password</label>
			   <input type="password"  size="20" name="txtPass" class="form-control" id="ejemplo_pass"
					   placeholder="Cambiar Pass" />
			 </div>
		   </div>	
	
	 <div class="col-xs-4">
			 <div class="form-group">
			   <label for="ejemplo_pass1">Repetir Pass</label>
			   <input type="password"  size="20" name="txtPass1" class="form-control" id="ejemplo_pass1"
					   placeholder="Cambiar Pass" />
			 </div>
		   </div>	
	
	 
	 </div>
		 
  		
  
  <button method="post" type="submit" class="btn btn-default" >Guardar</button>
   
  </form>
  </div>
  </div>
  

</div>
</div>
