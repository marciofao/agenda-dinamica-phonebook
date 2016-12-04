<?php 	
$title="Editar contato";
require_once 'header.php';

//VALIDA RECEBIMENTO POR get
if (!$_GET) { header("location:index.php") ; }



$consulta = $con->query("SELECT * FROM 
	`contatos` left JOIN 
	(organizacoes, telefones, emails) 
	on (contatos.cod_org_contato=organizacoes.cod_organizacao and telefones.cod_contato=contatos.cod_contato and emails.cod_contato=contatos.cod_contato) 
	WHERE contatos.cod_contato=".$_GET['c'].";");
$linha = $consulta->fetch(PDO::FETCH_ASSOC);

//die(var_dump($linha));
?>


<div class="row col-md-12 col-sm-12">
	<span class="col-md-6 col-lg-6">
		Registro criado em: <?php echo 	date_format(date_create($linha['data_criacao']), 'd-m-Y H:i:s'); ?>
	</span>
	<span class="col-md-6 col-lg-6">
		Última alteração em: <?php echo  date_format(date_create($linha['data_modificacao']), 'd-m-Y H:i:s'); ?>
	</span>
	<form action="atualiza_contato.php?c=<?php echo $_GET['c'] ?>" method="post" >

		<label class="col-md-4 col-sm-4 col-xs-12" >

			Nome:

			<input required="required" type="text" name="nome" class="form-control " value="<?php echo $linha['nome_contato'] ?>" />
		</label>
		<label class="col-md-8 col-sm-8 col-xs-12">

			Sobrenome:
			<input required="required" type="text" name="sobrenome" class="form-control" value="<?php echo $linha['sobrenome'] ?>"  />
		</label>
		<label class="col-md-12 col-sm-12">
			Endereço:
			<input required="required" type="text" name="endereco" class="form-control" value="<?php echo $linha['endereco'] ?>" />
		</label>
		<label class="col-md-12 col-sm-12">
			CEP:
			<input required="required" type="text" name="cep" class="form-control" value="<?php echo $linha['cep'] ?>" />
		</label>
		<label class="col-md-12 col-sm-12">
			Bairro:
			<input required="required" type="text" name="bairro" class="form-control" value="<?php echo $linha['bairro'] ?>"  />
		</label>
		<label class="col-md-12 col-sm-12">
			Cidade:
			<input required="required" type="text" name="cidade" class="form-control" value="<?php echo $linha['cidade'] ?>"  />
		</label>
		<label class="col-md-12 col-sm-12">
			Organização:
			<select required="required" name="cod_organizacao" class="form-control">
				<option value="">selecione...</option>
				<?php  
				$consulta = $con->query("SELECT * FROM organizacoes;");
				while ($linha2 = $consulta->fetch(PDO::FETCH_ASSOC)) { 
					?>
					
					<option value="<?php echo $linha['cod_organizacao'] ?>"
						<?php if ($linha2['cod_organizacao']==$linha['cod_org_contato']): ?>
							selected="selected"
						<?php endif ?>
						><?php echo $linha2['nome_organizacao'] ?>

					</option>
					<?php 	
				} ?>
			</select>

		</label>

		<label class="col-md-12 col-sm-12">
			Telefone: 

			<span class="input_tel_wrap">
				<?php 

				$consulta = $con->query("SELECT * FROM `telefones` WHERE telefones.cod_contato=".$_GET['c'].";");
				$numero_etiqueta=-1;
				while ($linha2 = $consulta->fetch(PDO::FETCH_ASSOC)){
					$numero_etiqueta++;
					?>
					<div>
						<input required="required" type="text" name="telefone[]" class="form-control  col-md-6 col-sm-6" value="<?php echo $linha2['numero'] ?>"/>
						<select name="<?php echo $numero_etiqueta ?>"  class="form-control col-md-6 col-sm-6">
							<option 
							<?php if ($linha2['etiqueta']=="Residencial"): ?>
								selected="selected"
							<?php endif ?>
							value="Residencial">Residencial</option>
							<option value="Celular"
							<?php if ($linha2['etiqueta']=="Celular"): ?>
								selected="selected"
							<?php endif ?>
							>Celular</option>
							<option value="Trabalho"
							<?php if ($linha2['etiqueta']=="Trabalho"): ?>
								selected="selected"
							<?php endif ?>
							>Trabalho</option>
						</select>
					</div>
					<?php 
				} ?>
			</span>
			<button class="btn btn-sm btn-alert  col-md-1 form-inline add_tel_button">+</button>
		</label>


		<label class="col-md-12 col-sm-12">
			Email:
			<span class="input_email_wrap">
				<?php 
				$consulta = $con->query("SELECT * FROM `emails` WHERE emails.cod_contato=".$_GET['c'].";");

				while ($linha2 = $consulta->fetch(PDO::FETCH_ASSOC)){

					?>
					<input required="required" type="text" name="email[]" class="form-control  col-md-7" value="<?php echo $linha2['email'] ?>" />
					<?php 
				}  ?>
			</span>
			<button class="btn btn-sm btn-alert add_email_button col-md-1">+</button>
		</label>
		
			<div class="row col-md-12 col-sm-12">	
				<input type="submit" class="btn-md btn btn-alert" value="Salvar" />
			</div><!-- /.row col-md-12 col-sm-12 -->
		</form>
	

		<a href="deleta_contato.php?c=<?php echo $_GET['c'] ?>">
			<button class="btn btn-danger">Excluir</button>
		</a>
	
</div><!-- /.row col-md-12 col-sm-12 -->

<script>
			//FUNCÇÃO PARA ADICIONAR CAMPOS DE TELEFONE
			$(document).ready(function() {
			    var max_tel      = 5; //maximum input boxes allowed
			    var wrapper         = $(".input_tel_wrap"); //Fields wrapper
			    var add_tel      = $(".add_tel_button"); //Add button class
			    
			    var x = <?php echo $numero_etiqueta ?>; //initlal text box count
			    $(add_tel).click(function(e){ //on add input button click
			    	e.preventDefault();
			        if(x < max_tel){ //max input box allowed

			            $(wrapper).append('<div><input required="required" type="text" name="telefone[]" class="form-control  col-md-6 col-sm-6" /><select name="'+x+'" class="form-control col-md-6 col-sm-6"><option value="Residencial">Residencial</option><option value="Celular">Celular</option><option value="Trabalho">Trabalho</option></select><a href="#" class="remove_tel btn-link">Remover</a></div>'); //add input box
			        x++;//text box increment
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