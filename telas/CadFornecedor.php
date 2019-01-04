<?php
$link = "";
if (isset($_GET["link"]))
{
	$link = $_GET["link"];
}

$id = "";
if (isset($_GET["id"]))
{
	$id = $_GET["id"];
}
?>
<script type="text/javascript">
	   var id = "<?php echo $id;?>";   
	var link = "<?php echo $link;?>";
</script>
<script src="./telas/js/fornecedor.js"></script>
<script src="./telas/js/Funcoes.js"></script>

<form class="form-horizontal" id="Cadfornecedor" method="post" action="./telas/banco/fornecedor.php">
	<fieldset>
		<legend style="margin-left:15px;">Cadastro de Fornecedor</legend>

		<div class="form-group col-lg-12">

			<input type="hidden" class="form-control" id="sqfornecedor" name="sqfornecedor">
			<div  class="col-md-3">
				<label class="control-label" for="razaoSocial">Razão Social:*</label>
				<input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="Razão Social..."required>
			</div>
            			
			<div class="col-md-3"> 
				<label class="control-label" for="nome">Pessoa:*</label><br/>
					<input type="radio"  id="tppessoa" onclick="javascript: VerificaPessoa();" name="tppessoa" value="F"> Física
					<input type="radio"  id="tppessoa" onclick="javascript: VerificaPessoa();" name="tppessoa" value="J"> Jurídica
			</div>		
			
			<div class="col-md-3">
				<label class="control-label" for="cpf">Cpf/Cnpj:*</label>
				<input type="text" class="form-control" id="cpf" name="cpf"  onblur="javascript: MontaMascara(this.value);" placeholder="Cpf cliente..."required>
			</div>
			
			<div  class="col-md-3">
				<label class="control-label" for="email" >Email:</label>
				<input type="text" class="form-control" id="email" name="email" placeholder="Email...">
			</div>
			<div  class="col-md-3">
				<label class="control-label" for="celular">Celular:</label>
				<input type="text" class="form-control" id="celular" name="celular" placeholder="Celular...">
			</div>
			<div  class="col-md-3">
				<label class="control-label" for="telefone" >Telefone:</label>
				<input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone...">
			</div>
			<div class="col-md-3">
				<label class="control-label" for="cep" >CEP:</label>
				<input type="text" class="form-control" id="cep" name="cep" placeholder="CEP...">
			</div>

			<div class="col-md-3">
				<label class="control-label" for="endereco">Endereço:</label>
				<input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço...">
			</div>

			<div class="col-md-3">
				<label class="control-label" for="numero" >Número:</label>
				<input type="text" class="form-control" id="numero" name="numero" placeholder="Número...">
			</div>

			<div class="col-md-3">
				<label class="control-label" for="complemento">Complemento:</label>
				<input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento...">
			</div>
			<div class="col-md-3">
				<label class="control-label" for="bairro">Bairro:</label>
				<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro..." >
			</div>

			<div class="col-md-3">
				<label class="control-label" for="cidade" >Cidade:</label>
				<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade...">
			</div>


			<div class="col-md-3">
				<label class="control-label" for="estado">Estado:</label>
				<input type="text" class="form-control" id="estado" name="estado" placeholder="Estado...">
			</div>

			<div class="col-md-3">
				<label class="control-label" for="pais">País:</label>
				<input type="text" class="form-control" id="pais" name="pais" placeholder="País...">
			</div>
		</div>
		<div class="col-md-12 form-group text-center">
			<button type="submit" class="btn btn-primary  glyphicon glyphicon-floppy-disk" id="BtnSalvar" name="BtnSalvar" > Salvar</button>
			<button type="reset" class="btn btn-default glyphicon glyphicon-refresh" onclick="LimpaCampos()"> Limpar</button>
		</div>
		<br>
		<br>
		<div class="modal-content col-md-12 table-responsive" style="font-size:10px;">
			<div class="text-center col-md-12">
				<h5><b>Lista de Fornecedores</b></h5>
			</div>
			<table class="table table-striped table-hover" id="tabela" >
				<thead>
					<tr>
						<th>Ações</th>
						<th>Email</th>
						<th>Nome</th>
						<th>Telefone</th>
					</tr>
				</thead>
				<tbody>
					<?php
					include "./torm/models/fornecedor.php";
					$fornecedores = fornecedor::all();
					if(isset($fornecedores))
					{
						if($fornecedores->count() > 0)
						{
							foreach ($fornecedores as $fornecedor)
							{
								echo '<tr>';
								echo '<td>';
								echo '<a class="btn btn-info btn-small" onclick="CarregaCliente('.$fornecedor->sqfornecedor.')" ><span class="glyphicon glyphicon-edit"></span></a>';
								echo '</td>';
								echo '<td>';
								echo $fornecedor->email;
								echo '</td>';
								echo '<td>';
								echo $fornecedor->razaosocial;
								echo '</td>';
								echo '<td>';
								echo $fornecedor->telefone;
								echo '</td>';
								echo '</tr>';
							}
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</fieldset>
</form>
