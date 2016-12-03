<?php 

$title="Organizações";
require_once 'header.php';

$consulta = $con->query("SELECT * FROM organizacoes;");



?>

<div class="row col-md-12">
	
</div><!-- /.row -->
<div class="panel panel-default">	
	<div class="panel-heading">	
		<h3><?php echo 	$title ?></h3>
		<a href="novo_organizacao.php" class="btn btn-md-primary">Adicionar</a>
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

		<?php  while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>
			<tr>
				<td>

					<a href="edita_organizacao.php?c=<?php echo $linha['cod'] ?>">
						<?php echo $linha['nome'] ?>
					</a>
				</td>
				<td>
					<a href="edita_organizacao.php?c=<?php echo $linha['cod'] ?>">
						<?php echo $linha['telefone'] ?>
					</a>
				</td>
			</tr>

		<?php } ?>


		
		</tbody>
	</table><!-- /.table-stripped -->


	<?php
	require_once 'footer.php';

	?>