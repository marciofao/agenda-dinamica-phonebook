<?php 

$title="Contatos";
require_once 'header.php';
?>

<div class="row col-md-12">
	
</div><!-- /.row -->
<div class="panel panel-default">	
	<div class="panel-heading">	
		<h3><?php echo 	$title ?></h3>
		<a href="novo_contato.php" class="btn btn-md-primary">Adicionar</a>
	</div><!-- /.panel-heading -->
</div><!-- /.panel panel-default -->
<table class="table table-stripped">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Telefones</th>
			<th>Organização</th>
		</tr>
	</thead>
	<tbody>
		<?php  
		$consulta = $con->query("SELECT * FROM contatos LEFT JOIN (organizacoes) ON (organizacoes.cod_organizacao=contatos.cod_organizacao);");
		while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
			?>
			<tr>
				<td>

					<a href="edita_contato.php?c=<?php echo $linha['cod_contato'] ?>">
						<?php echo $linha['nome_contato']." ".$linha['sobrenome'] ?>
					</a>
				</td>
				<td>
					<a href="edita_contato.php?c=<?php echo $linha['cod_contato'] ?>">
						<?php echo $linha['telefone'] ?>
					</a>
				</td>
				<td>
					<a href="edita_contato.php?c=<?php echo $linha['cod_contato'] ?>">
						<?php echo $linha['nome_organizacao'] ?>
					</a>
				</td>
			</tr>

			<?php } ?>

		</tbody>
	</table><!-- /.table-stripped -->


	<?php
	require_once 'footer.php';

	?>