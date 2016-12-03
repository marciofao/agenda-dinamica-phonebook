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
				<option value="">selecione...</option>
				<?php  
				$consulta = $con->query("SELECT * FROM organizacoes;");
				while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { 
					?>
					
					<option value="<?php echo $linha['cod'] ?>"><?php echo $linha['nome'] ?></option>
					<?php 	} ?>
				</select>

			</label>

			<label class="col-md-12 col-sm-12">
				Telefone:

				<span class="input_tel_wrap">
					<input required="required" type="text" name="telefone[]" class="form-control  col-md-11" />
				</span>
				<button class="btn btn-sm btn-alert  col-md-1 form-inline add_tel_button">+</button>
			</label>


			<label class="col-md-12 col-sm-12">
				Email:
				<span class="input_email_wrap">
				<input required="required" type="text" name="email[]" class="form-control  col-md-7" />
				</span>
				<button class="btn btn-sm btn-alert add_email_button col-md-1">+</button>
			</label>
			<div class="row col-md-12 col-sm-12">	
				<input type="submit" class="btn-md btn btn-primary" value="Salvar" /></div><!-- /.row col-md-12 col-sm-12 -->
			</form>
		</div><!-- /.row col-md-12 col-sm-12 -->

		<script>
			//FUNCÇÃO PARA ADICIONAR CAMPOS DE TELEFONE
			$(document).ready(function() {
			    var max_tel      = 5; //maximum input boxes allowed
			    var wrapper         = $(".input_tel_wrap"); //Fields wrapper
			    var add_tel      = $(".add_tel_button"); //Add button class
			    
			    var x = 1; //initlal text box count
			    $(add_tel).click(function(e){ //on add input button click
			    	e.preventDefault();
			        if(x < max_tel){ //max input box allowed
			            x++; //text box increment
			            $(wrapper).append('<div><input required="required" type="text" name="telefone[]" class="form-control  col-md-1"/><a href="#" class="remove_tel btn-link">Remover</a></div>'); //add input box
			        }
			    });
			    
			    $(wrapper).on("click",".remove_tel", function(e){ //user click on remove text
			    	e.preventDefault(); $(this).parent('div').remove(); x--;
			    })
			});

			//FUNÇÃO PARA ADICIONAR CAMPOS DE EMAIL
			$(document).ready(function() {
			    var max_email      = 5; //maximum input boxes allowed
			    var wrapper         = $(".input_email_wrap"); //Fields wrapper
			    var add_email      = $(".add_email_button"); //Add button class
			    
			    var x = 1; //initlal text box count
			    $(add_email).click(function(e){ //on add input button click
			    	e.preventDefault();
			        if(x < max_email){ //max input box allowed
			            x++; //text box increment
			            $(wrapper).append('<div><input required="required" type="text" name="email[]" class="form-control  col-md-1"/><a href="#" class="remove_tel btn-link">Remover</a></div>'); //add input box
			        }
			    });
			    
			    $(wrapper).on("click",".remove_tel", function(e){ //user click on remove text
			    	e.preventDefault(); $(this).parent('div').remove(); x--;
			    })
			});
		</script>

		<?php
		require_once 'footer.php';
		?>