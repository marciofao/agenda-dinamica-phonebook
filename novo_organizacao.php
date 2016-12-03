<?php 	
$title="Adicionar Organização";
require_once 'header.php';
?>
		<form method="post" action="salva_organizacao.php">
		<label class="col-md-12 col-sm-12">
			Nome:
			<input required="required" type="text" name="nome" class="form-control" />
		</label>
		<label class="col-md-12 col-sm-12">
			Telefone:
			<input required="required" type="text" name="telefone" class="form-control" />
		</label>
		
		<div class="row col-md-12 col-sm-12">	
			<input type="submit" class="btn-md btn btn-primary" value="Salvar" /></div><!-- /.row col-md-12 col-sm-12 -->
		</form>
	</div><!-- /.row col-md-12 col-sm-12 -->
<?php

require_once 'footer.php';
?>