<br>
<?php 
	
	include("libreria/db_chat.php");
	
	$query = "SELECT * FROM ( SELECT * FROM chat order by id DESC LIMIT 3) sub order by id ASC";
	$run = $con->query($query);
	while($row = $run->fetch_array()) :
		?>
	
			<div id="chat_data">
				<span  class="btn btn-default btn-xs"><span class="glyphicon glyphicon-user"></span>
				<b><?php echo $row['name']; ?></b></span>
				<span style="float:right;"><?php echo formatDate($row['date']); ?></span>
				<p style="color:gray;padding-left:20px;"><em><?php echo $row['msg']; ?></em></p>
			</div>
			<?php endwhile;?>
			
			