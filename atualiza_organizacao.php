<?php 	

//caso houver GET
if ($_GET) {
	//caso houver POST
	if ($_POST) { 

		require_once "conecta.php";

		try {


			$stmt = $con->prepare('UPDATE organizacoes SET nome = :nome, telefone = :telefone WHERE cod = :cod');
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