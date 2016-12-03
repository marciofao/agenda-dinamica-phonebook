<?php
require_once "conecta.php";

if ($_POST) {
	
	//INICIA TRANSAÇÃO
	$con->beginTransaction();
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
			':data_criacao' => date('Y-m-d H:i:s'),
			':data_modificacao' => date('Y-m-d H:i:s')
			));

		echo $stmt->rowCount(); 
		//die(var_dump($stmt));
		//die($con->lastInsertId());

		//PEGA O COD DO ULTIMO REGISTRO INSERIDO
		$stmt = $con->query('SELECT cod FROM contatos ORDER BY data_modificacao DESC LIMIT 1;');
		$linha = $stmt->fetch(PDO::FETCH_ASSOC);
		//die(var_dump($linha['cod']));
		$cod_contato = $linha['cod'];

		//die(var_dump($_POST['telefone']));
		die(var_dump($_POST));

		foreach ($_POST['telefone'] as $key => $value) {
			/*
			die(var_dump($_POST['label']));
			die(var_dump($value));
			*/
			echo "tel: ".$value."<br>" ;
			echo "lab: ".$_POST['label']."<br>" ;
			$stmt = $con->prepare('INSERT INTO telefones VALUES(NULL, :cod_contato, :telefone, :label)');
			$stmt->execute(array(
			':cod_contato' => $cod_contato,
			':telefone' => $value,
			':label' => $value['label']
			));

		echo $stmt->rowCount(); 
		}
die();

	} catch(PDOException $e) {
		//SE DER PROBLEMA DESFAZ ALTERAÇÕES
		$con->rollBack();
		echo 'Error: ' . $e->getMessage();
		die();
	}
	//GRAVA AS ALTERAÇÕES
	$con->commit();
}

	header(	"location:index.php");
	?>