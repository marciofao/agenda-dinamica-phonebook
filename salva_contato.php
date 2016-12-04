<?php
require_once "conecta.php";

if ($_POST) {
	
	//INICIA TRANSAÇÃO
	$stmt=$con->beginTransaction();
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

		echo $stmt->rowCount(); //EXIBE 1 SE 1 COLUNA FOR ALTERADA
		//die(var_dump($stmt));
		//die($con->lastInsertId());

		//PEGA O COD DO ULTIMO REGISTRO INSERIDO
		$stmt = $con->query('SELECT cod_contato FROM contatos ORDER BY data_modificacao DESC LIMIT 1;');
		$linha = $stmt->fetch(PDO::FETCH_ASSOC);
		//die(var_dump($linha['cod']));
		$cod_contato = $linha['cod_contato'];

		//die(var_dump($_POST['telefone']));
		//die(var_dump($_POST));

		//PEGA O NUMERO DE TELEFONES=NUMERO DE ETIQUETAS (LABELS)
		$labels=sizeof($_POST['telefone']);
		//die(var_dump($labels));
		
		//CONTADOR SELECT "LABELS"
		$i=0;
		foreach ($_POST['telefone'] as $key => $value) {
			//LABEL=ETIQUETA NO BD
			
			//muda $i para string
			$i2="$i";
			$stmt = $con->prepare('INSERT INTO telefones VALUES(NULL, :cod_contato, :telefone, :label)');
			$stmt->execute(array(
			':cod_contato' => $cod_contato,
			':telefone' => $value,
			':label' => $_POST[$i2]
			));

			$i++;
			echo $stmt->rowCount(); 
		}

		foreach ($_POST['email'] as $key => $value) {
			
			$stmt = $con->prepare('INSERT INTO emails VALUES(NULL, :cod_contato, :email)');
			$stmt->execute(array(
			':cod_contato' => $cod_contato,
			':email' => $value
			));

			$i++;
			echo $stmt->rowCount(); 
		}
//die();

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