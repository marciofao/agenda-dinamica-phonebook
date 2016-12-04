<?php 	

//caso houver GET
if ($_GET) {
	//caso houver POST
	if ($_POST) { 
		//VERIFICA SE TODOS OS CAMPOS FORAM PREENCHIDOS
		if(in_array(null, $_POST)) die("Favor preencher todos os campos!"); 

		require_once "conecta.php";

		try {


			$stmt = $con->prepare('UPDATE organizacoes SET nome_organizacao = :nome, telefone = :telefone WHERE cod_organizacao = :cod');
			$stmt->execute(array(
				':cod'   => $_GET['c'],
				':nome' => $_POST['nome'],
				':telefone' => $_POST['telefone']
				));

			echo $stmt->rowCount(); 
		} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
			die();
		}

	}
}

header("location:organizacoes.php");
?>