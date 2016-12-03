<?php 	
/*
como usar:

<?php 	
$title="Editar Usuário";
require_once 'header.php';

require_once 'footer.php';
 ?>
*/

require_once 'conecta.php';
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo 	$title ?> - Agenda</title>
	<meta name="description" content="Agenda Telefonica">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>

<div class="content">
<div class="navbar navbar-default">
	<div class="navbar-header">
		<a href="#" class="navbar-brand ">
			Agenda - <?php echo $title ?>
		</a>
	</div><!-- /.navbar-header -->
	<div class="btn-toolbar">
		<div class="btn-group-lg btn-group">
			<a href="index.php" class="btn btn-primary">Contatos</a>
			<a href="organizacoes.php" class="btn btn-primary ">Organizações</a>
		</div><!-- /.btn-group-lg btn-group -->
	</div><!-- /.btn-toolbar -->
</div><!-- /.navbar navbar-default -->