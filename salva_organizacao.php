<?php
require_once "conecta.php";

if ($_POST) {
	
/*
	$stmt = $con->prepare("INSERT INTO organizacoes(nome, telefone) VALUES(?, ?)");
	$stmt->bindParam(1,”$_POST['nome']”);
	$stmt->bindParam(2,”$_POST['telefone']”);

	die(var_dump($stmt));
	
	$stmt->execute();
*/

	try{
		$stmt = $con->prepare('INSERT INTO organizacoes VALUES(NULL, :nome, :telefone)');
		$stmt->execute(array(
			':nome' => $_POST['nome'],
			':telefone' => $_POST['telefone']
			));

		echo $stmt->rowCount(); 
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
		die();
	}
}

	header(	"location:organizacoes.php");
	?>