<?php 

$con = new PDO("mysql:host=localhost;dbname=agenda", "root", ""); 

if ($con) {
	echo "success";
}

 ?>