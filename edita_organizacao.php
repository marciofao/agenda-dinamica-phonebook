<?php 	
//se nada for recebido, retorna.
if (!$_GET) { header("location:organizacoes.php"); }

$title="Editar Organização";
require_once 'header.php';

$consulta = $con->query("SELECT * FROM organizacoes WHERE cod_organizacao=".$_GET['c'].";");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

?>
<div class="row col-md-12">	
	<form action="atualiza_organizacao.php?c=<?php 	echo $_GET['c'] ?>" method="post">
		<label>
			
			<span class="col-md-3">
				Nome:
			</span>
			<input required="required" type="text" name="nome" class="form-control form-inline col-md-9" 
			value="<?php echo $linha['nome_organizacao']	 ?>" 	/>
		</label>
		<label>
			<span class="col-md-3">
				Telefone:
			</span>
			<input required="required" type="text" name="telefone" class="form-control form-inline col-md-9" 
			value="<?php echo $linha['telefone']	 ?>"/>
		</label>

		<div class="row col-md-12">
			<input type="submit" class="btn-md btn btn-warning" value="Salvar" />
			
			
		</div><!-- /.row -->
	</form>
	<a href="deleta_organizacao.php?c=<?php echo $_GET['c'] ?>">
		<button class="btn btn-md btn-danger">Excluir</button>
	</a>
</div><!-- /.row col-md-12 -->
<?php

require_once 'footer.php';
?>