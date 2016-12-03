<?php 	
$title="Adicionar contato";
require_once 'header.php';
?>

<div class="row col-md-12 col-sm-12">	
	<form action="salva_contato.php" method="post" >

		<label class="col-md-4 col-sm-4 col-xs-12" >

			Nome:

			<input required="required" type="text" name="nome" class="form-control " />
		</label>
		<label class="col-md-8 col-sm-8 col-xs-12">

			Sobrenome:
			<input required="required" type="text" name="sobrenome" class="form-control" />
		</label>
		<label class="col-md-12 col-sm-12">
			Endereço:
			<input required="required" type="text" name="endereco" class="form-control" />
		</label>
		<label class="col-md-12 col-sm-12">
			CEP:
			<input required="required" type="text" name="cep" class="form-control" />
		</label>
		<label class="col-md-12 col-sm-12">
			Bairro:
			<input required="required" type="text" name="bairro" class="form-control" />
		</label>
		<label class="col-md-12 col-sm-12">
			Cidade:
			<input required="required" type="text" name="cidade" class="form-control" />
		</label>
		<label class="col-md-12 col-sm-12">
			Organização:
			<select required="required" name="organizacao" class="form-control">
				<?php 	 ?>
				<option value="">selecione...</option>
				<option value="	"></option>
			</select>

		</label>

		<label class="col-md-12 col-sm-12">
			Telefone:

			<input required="required" type="text" name="telefone[]" class="form-control  col-md-11" />
			<button class="btn btn-sm btn-alert  col-md-1 form-inline">+</button>
		</label>
		
		
		<label class="col-md-12 col-sm-12">
			Email:
			<input required="required" type="text" name="email[]" class="form-control  col-md-7" />
			<button class="btn btn-sm btn-alert  col-md-1">+</button>
		</label>
		<div class="row col-md-12 col-sm-12">	
			<input type="submit" class="btn-md btn btn-primary" value="Salvar" /></div><!-- /.row col-md-12 col-sm-12 -->
		</form>
	</div><!-- /.row col-md-12 col-sm-12 -->

	<?php
	require_once 'footer.php';
	?>