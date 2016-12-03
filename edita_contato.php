<?php 	
$title="Adicionar contato";
require_once 'header.php';
?>

<div class="row col-md-12">	
		<form action="atualiza_contato.php" method="post">
			<label>
				<span class="col-md-3">
				<span class="col-md-3">
					Nome:
				</span>
				</span><input required="required" type="text" name="nome" class="form-control form-inline col-md-9" />
			</label>
			<label>
				<span class="col-md-3">
				Sobrenome:
				</span>
				<input required="required" type="text" name="sobrenome" class="form-control form-inline col-md-9" />
			</label>
			<label>
				<span class="col-md-3">
				Endereço:
				</span>
				<input required="required" type="text" name="endereco" class="form-control form-inline col-md-9" />
			</label>
			<label>
				<span class="col-md-3">
				CEP:
				</span>
				<input required="required" type="text" name="cep" class="form-control form-inline col-md-9" />
			</label>
			<label>
				<span class="col-md-3">
				Bairro:
				</span>
				<input required="required" type="text" name="bairro" class="form-control form-inline col-md-9" />
			</label>
			<label>
				<span class="col-md-3">
				Cidade:
				</span>
				<input required="required" type="text" name="cidade" class="form-control form-inline col-md-9" />
			</label>
			<label>
				<span class="col-md-3">
				Organização:
				</span>
				<select required="required" name="organizacao" class="form-control form-inline col-md-9">
				<?php 	 ?>
					<option value="">selecione...</option>
					<option value="	"></option>
				</select>

			</label>

			<label>
				<span class="col-md-3">
				Telefone:
				</span>
				<input required="required" type="text" name="telefone" class="form-control form-inline col-md-8" />
				<button class="btn btn-sm btn-alert form-inline col-md-1">+</button>
			</label>
			<label>
				<span class="col-md-3">
				Email:
				</span>
				<input required="required" type="text" name="email" class="form-control form-inline col-md-8" />
				<button class="btn btn-sm btn-alert form-inline col-md-1">+</button>
			</label>
			<input type="submit" class="btn-md btn btn-primary" value="Salvar" />
		</form>
</div><!-- /.row col-md-12 -->

<?php
require_once 'footer.php';
 ?>