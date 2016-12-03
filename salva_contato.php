<?php
require_once "conecta.php";

if ($_POST) {
	

	try{
		$stmt = $con->prepare('INSERT INTO contatos VALUES(NULL, :nome, :sobrenome, :endereco, :cep, :bairro, :cidade, :cod_organizacao, :data_criacao, :data_modificacao)');
		$stmt->execute(array(
			':nome' => $_POST['nome'],
			':sobrenome' => $_POST['sobrenome'],
			':endereco' => $_POST['endereco'],
			':cep' => $_POST['cep'],
			':bairro' => $_POST['bairro'],
			':cidade' => $_POST['cidade'],
			':cod_organizacao' => $_POST['cod_organizacao'],
			':data_criacao' => date('d-m-Y H:i:s'),
			':data_modificacao' => date('d-m-Y H:i:s')
			));

		echo $stmt->rowCount(); 
	} catch(PDOException $e) {
		echo 'Error: ' . $e->getMessage();
		die();
	}
}

	header(	"location:index.php");
	?>