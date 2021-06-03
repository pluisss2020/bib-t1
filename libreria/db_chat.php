<?php 
$host = "localhost"; 
$user = "root";
$pass = "lp4458"; 
$db_name = "biblio_t1"; 

$con = new mysqli($host,$user,$pass,$db_name);

function formatDate($date){
	return date('g:i a', strtotime($date));
}
?>