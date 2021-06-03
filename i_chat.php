<?php
		
echo '		
	<script>
		function ajax_chat(){
		
		var req = new XMLHttpRequest();
		
		req.onreadystatechange = function(){
		
		if(req.readyState == 4 && req.status == 200){
		
		document.getElementById(\'chat_box\').innerHTML = req.responseText;
		} 
		}
		req.open(\'GET\',\'chat.php\',true); 
		req.send();
		
		}
		setInterval(function(){ajax_chat()},1000);
	</script>
';	

include("menu_bs.php");			
		include("libreria/db_chat.php");
			
			?>
			<?php 
			if(isset($_POST['send'])){ 
			
			//$name = $_POST['name'];
			if (isset($_SESSION['username']) ){
		          $name =$_SESSION['username'];
		    }
			$message = $_POST['msg'];
			
			$query = "INSERT INTO chat (name,msg) values ('$name','$message')";
			
			$run = $con->query($query);
			}
			?>	


<div onload="ajax_chat();">


	
		
	<div id="container">
	<div class="row">
	   <div class="col-sm-8">
	     <div id="chat_box">	</div>	
	   </div>
	 </div>
		
		
    		
	 <div class="row">	
	  <div  id="envio">
		<div class="col-sm-8">
			<form method="post" action="i_chat.php">
			<div class="form-group">
				<input type="hidden" class="form-control" placeholder="Enter your Name" name="name" type="text" value="Alguien">	
			</div>	
			<div class="form-group">
				<textarea class="form-control" name="msg" placeholder="Escribi un mensaje .."></textarea>	
			</div>	
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				<input class="btn btn-primary" name="send"  type="submit" value="Enviar" style="position: absolute;top: 20px;">	
			</div>	
		</div>
			</form>
		</div>
		</div>
	 </div>
			
</div>

</html>