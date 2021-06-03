<?php


if (!empty($_POST)) {

    $file_txt = $_POST['archivo']  ;
	//echo $file_pdf;
	
	
	
    
}
?>


 <div class="container">
 
  <div class="row" >
 
	  <div class="col-sm-12" >
		  <div id="capa_L" class="container h1">
			<object data="<?php echo $file_txt;?>" type="text/html"  width="480" height="500"></object>
				<a href="<?php echo $file_txt;?>TXT</a>
			
		  </div>
	   </div>
  </div> 
</div>