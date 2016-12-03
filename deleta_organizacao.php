<?php 	
//se houver GET, executa
if ($_GET) {
	//die("ok");
	require_once "conecta.php";


	try{
		$stmt = $con->prepare("DELETE FROM organizacoes WHERE cod=".$_GET['c'].";");

	//	die(var_dump($stmt));
		$stmt->execute();

		echo $stmt->rowCount(); 
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
		die();
	}

}

header("location:organizacoes.php"); 
?>