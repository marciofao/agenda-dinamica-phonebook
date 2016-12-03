<?php 	
$title="Editar Organização";
require_once 'header.php';
?>
<div class="row col-md-12">	
	<form action="atualiza_organizacao.php" method="post">
		<label>
			<span class="col-md-3">
				<span class="col-md-3">
					Nome:
				</span>
			</span><input required="required" type="text" name="nome" class="form-control form-inline col-md-9" />
		</label>
		<label>
			<span class="col-md-3">
				Telefone:
			</span>
			<input required="required" type="text" name="Telefone" class="form-control form-inline col-md-9" />
		</label>

		<input type="submit" class="btn-md btn btn-primary" value="Salvar" />
	</form>
</div><!-- /.row col-md-12 -->
<?php

require_once 'footer.php';
?>