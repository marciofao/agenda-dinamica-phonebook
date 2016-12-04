<?php
require_once "conecta.php";

if ($_POST) {
	
	//VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
	if(in_array(null, $_POST)) die("Favor preencher todos os campos!"); 
	
	//INICIA TRANSAÇÃO
	$stmt=$con->beginTransaction();
	try{
		
		//die(var_dump($_POST));
		$stmt = $con->prepare("UPDATE contatos SET 
			nome_contato = :nome, 
			sobrenome = :sobrenome, 			endereco = :endereco,
			cep = :cep, 
			bairro = :bairro, 
			cidade = :cidade, 
			cod_org_contato = :cod_organizacao, 
			data_modificacao = :data_modificacao WHERE cod_contato=".$_GET['c']."");
		//die(var_dump($stmt));

		$stmt->execute(array(
			':nome' => $_POST['nome'],
			':sobrenome' => $_POST['sobrenome'],
			':endereco' => $_POST['endereco'],
			':cep' => $_POST['cep'],
			':bairro' => $_POST['bairro'],
			':cidade' => $_POST['cidade'],
			':cod_organizacao' => $_POST['cod_organizacao'],
			':data_modificacao' => date('Y-m-d H:i:s')
			));
		//die(var_dump($stmt));
		echo $stmt->rowCount(); //EXIBE 1 SE 1 COLUNA FOR ALTERADA
		//die(var_dump($stmt));
		//die($con->lastInsertId());

		
		$cod_contato = $_GET['c'];

		//die(var_dump($_POST['telefone']));
		//die(var_dump($_POST));

		//PEGA O NUMERO DE TELEFONES=NUMERO DE ETIQUETAS (LABELS)
		$labels=sizeof($_POST['telefone']);
		//die(var_dump($labels));

		//PRIMEIRO APAGA OS TELEFONES DO CONTATO ANTES DE RE-INSERIR
		$stmt = $con->prepare("DELETE FROM telefones WHERE cod_contato=".$_GET['c'].";");
		$stmt->execute();

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

		//PRIMEIRO APAGA OS EMAILS DO CONTATO ANTES DE RE-INSERIR
		$stmt = $con->prepare("DELETE FROM emails WHERE cod_contato=".$_GET['c'].";");
		$stmt->execute();

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