<?php
include("motor.php");


class Cartel{
 public $id_cartel;
 public $categoria;
 public $titulo;
 public $texto;
 public $imagen;
 public $plantilla;
 public $v_desde;
 public $v_hasta;
 public $activo;
 public $link;
 public $texto1;
 public $texto2;
 public $imagen1;
 
 
 function guardar(){  // creae cartel
    
  
   $sql="insert into carteles(categoria,titulo,texto,imagen,plantilla,v_desde,v_hasta,activo,link,texto1,texto2,imagen1)
   values('$this->categoria','$this->titulo','$this->texto','$this->imagen','$this->plantilla',
   '$this->v_desde','$this->v_hasta','$this->activo','$this->link','$this->texto1','$this->texto2','$this->imagen1')";
   //mysql_query($sql);
   $objConn = new Conexion();
   $objConn->enlace->query($sql);
 }
 
 function actualizar($nro=0)	// actualiza cartel
	{
	        
			$sql="update carteles set categoria='$this->categoria', titulo='$this->titulo',texto='$this->texto'
			,imagen='$this->imagen',plantilla='$this->plantilla',v_desde='$this->v_desde'
			,v_hasta='$this->v_hasta',activo='$this->activo',link='$this->link' 
			,texto1='$this->texto1',texto2='$this->texto2',imagen1='$this->imagen1' 
			 where id_cartel = $nro";
			//mysql_query($sql); // ejecuta la consulta para actualizar
			$objConn = new Conexion();
            $objConn->enlace->query($sql);
            			
	}
	
 
 function borrar($nro=0)	
	{
	        echo $nro;
			$sql="delete from carteles where id_cartel = $nro";
			$objConn = new Conexion();
            $objConn->enlace->query($sql);
			
	
	}	
	
function traer_datos($nro=0) // declara el constructor, si trae el numero de persona lo busca 
	{
		if ($nro!=0)
		{
			$sql="select * from carteles where id_cartel = $nro";
			//$result=mysql_query($sql);
			$objConn = new Conexion();
            $result = $objConn->enlace->query($sql);
			$recs=mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			$id=$row['id_cartel'];
			
			return $row;
		}
	}	
 
 
 
 static function buscar($str){
    $sql="select * from carteles where categoria like '%$str%' or titulo like '%$str%' or texto like '%$str%' or link like '%$str%' or id_cartel='$str' ";
    //$rs=mysql_query($sql);
	$objConn = new Conexion();
	$rs=$objConn->enlace->query($sql);
	$est=array();
	//while($fila=mysql_fetch_assoc($rs) > 0){
	while($fila=mysqli_fetch_assoc($rs)){
	  $est[]=$fila;
	}return $est;
 
 }
 
 static function seleccionar($str){
    $sql="select * from carteles where categoria = '$str' AND activo = 1 ";
    if(is_numeric($str)){
	 $sql="select * from carteles where id_cartel = '$str' ";
	}
	//echo $sql;
    
    //$rs=mysql_query($sql);
	$objConn = new Conexion();
	$rs=$objConn->enlace->query($sql);
	$est=array();
	//while($fila=mysql_fetch_assoc($rs) > 0){
	while($fila=mysqli_fetch_assoc($rs)){
	  $est[]=$fila;
	}return $est;
 
 }
 
 static function categorias(){
    $sql="select categoria,count(id_cartel) from carteles where activo=1 group by categoria";
    
	//echo $sql;
    
    $objConn = new Conexion();
	$rs=$objConn->enlace->query($sql);
	$est=array();
	//while($fila=mysql_fetch_assoc($rs) > 0){
	while($fila=mysqli_fetch_assoc($rs)){
	  $est[]=$fila;
	}return $est;
 
 }
 
 
 
 }