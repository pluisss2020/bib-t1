<?php
//include_once("libreria/motor.php");
include_once("libreria/carteles.php");

$str_b =  $_GET['b'];
//echo "QUE".$_GET['b'];
$cart=Cartel::seleccionar($str_b);

?>
<?php
if (isset($cart)){
echo '<link rel="stylesheet" href="bootstrap/carteles.css">';
?>


 
  
	  
	  <?php
	  
		  foreach($cart as $carteles){
		  
		   echo '<div class="plantilla'.$carteles['plantilla'].'">';		   
		   if($carteles['imagen1']<>""){
		   $img_h="images/cartelera/".$carteles['imagen1'];
		   echo "<div style=\"background-image: url(".$img_h.");\"><header>
               <h1>$carteles[titulo]</h1>
               </header></div>";
		   }
           else{
		   echo "<header>
               <h1>$carteles[titulo]</h1>
               </header>";
		   }
		   
			   
			   
		if($carteles['link']<>""){   
		   echo "<nav><a href='$carteles[link]' target='_blank'>$carteles[titulo] en la web</a></nav>";
		}   
		   echo "<article>$carteles[texto]</article>";
		  
		  
		   if($carteles['imagen']<>"" && $carteles['texto1']<>"" && $carteles['texto2']<>""){
		        $img='images/cartelera/'.$carteles['imagen'];
				echo "<div id='cartel_imagen' class='row'>";
				  echo "<div class='col-sm-4'>$carteles[texto1]</div>";
				  echo "<div class='col-sm-4'><img src='$img'></div>";
				  echo "<div class='col-sm-4'>$carteles[texto2]</div>";
				echo "</div> ";
		   }
	       if($carteles['imagen']<>"" && $carteles['texto1']=="" && $carteles['texto2']==""){
		        $img='images/cartelera/'.$carteles['imagen'];
				echo "<div id='cartel_imagen' class='row'>";
				   echo "<div class='col-sm-2'>  </div>";
				  echo "<div class='col-sm-10'><img src='$img'></div>";
			      echo "</div> ";
		   }
           if($carteles['imagen']<>"" && $carteles['texto1']<>"" && $carteles['texto2']==""){
		        $img='images/cartelera/'.$carteles['imagen'];
				echo "<div id='cartel_imagen' class='row'>";
				  echo "<div class='col-sm-6'>$carteles[texto1]</div>";
				  echo "<div class='col-sm-6'><img src='$img'></div>";
		  		  echo "</div> ";
		   }
           if($carteles['imagen']<>"" && $carteles['texto1']=="" && $carteles['texto2']<>""){
		        $img='images/cartelera/'.$carteles['imagen'];
				echo "<div id='cartel_imagen' class='row'>";
				  echo "<div class='col-sm-6'><img src='$img'></div>";
				  echo "<div class='col-sm-6'>$carteles[texto2]</div>";
				echo "</div> ";
		   }


	if($carteles['v_desde']<>"" || $carteles['v_hasta']<>""){
		   echo "<footer><h3>$carteles[v_desde] $carteles[v_hasta]</h3></footer>";
		   }
		   echo '</div><br>';
		   }
	  ?>
	
	
	
	  
	 
	  
<?php
}
?>