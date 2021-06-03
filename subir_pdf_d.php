<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES["fileToUpload"]["type"])){
$target_dir = "libros_d/";
$carpeta=$target_dir;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
 
$target_file = $carpeta . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $errors[]= "El archivo es un documento - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $errors[]= "El archivo no es un documento.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $errors[]="Lo sentimos, archivo ya existe.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 12524288) {
    $errors[]= "Lo sentimos, el archivo es demasiado grande.  Tamaño máximo admitido: 0.5 MB";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "txt" && $imageFileType != "docx"
&& $imageFileType != "doc" ) {
    $errors[]= "Lo sentimos, sólo archivos PDF, TXT, DOCX & DOC  son permitidos.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $errors[]= "Lo sentimos, tu archivo no fue subido.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       $messages[]= "El Archivo ha sido subido correctamente.";
	   
	   
    } else {
       $errors[]= "Lo sentimos, hubo un error subiendo el archivo.";
    }
}
 
if (isset($errors)){
	?>
	<div class="alert alert-danger alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Error!</strong> 
	  <?php
	  foreach ($errors as $error){
		  echo"<p>$error</p>";
	  }
	  ?>
	</div>
	<?php
}
 
if (isset($messages)){
	?>
	<div class="alert alert-success alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Aviso!</strong> 
	  <?php
	  foreach ($messages as $message){
		  echo"<p>$message</p>";
	  }
	  ?>
	</div>
	<?php
}
}
else echo "error";
?>