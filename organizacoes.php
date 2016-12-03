<?php 

$title="Organizações";
require_once 'header.php';
?>

<div class="row col-md-12">
	
</div><!-- /.row -->
<div class="panel panel-default">	
	<div class="panel-heading">	
		<h3><?php echo 	$title ?></h3>
		<a href=".php" class="btn btn-md-primary">Adicionar</a>
	</div><!-- /.panel-heading -->
</div><!-- /.panel panel-default -->
<table class="table table-stripped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Telefone</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<a href="edita_organizacao.php">
					lorem
				</a>
			</td>
			<td>lorem</td>
		</tr>
	</tbody>
</table><!-- /.table-stripped -->


<?php
require_once 'footer.php';

?>