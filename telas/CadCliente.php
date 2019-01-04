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
<script src="./telas/js/cliente.js"></script>
<script src="./telas/js/Funcoes.js"></script>

<form class="form-horizontal" id="Cadcliente" method="post" action="./telas/banco/cliente.php">
	<fieldset>
		<legend style="margin-left:15px;">Cadastro de Cliente</legend>

		<div class="form-group col-lg-12">

			<input type="hidden" class="form-control" id="sqcliente" name="sqcliente">
			<div  class="col-md-3">
				<label class="control-label" for="nome">Nome:*</label>
				<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome..."required>
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
				<label class="control-label" for="datanascimento" >Data de Nascimento:*</label>
				<input type="date" class="form-control" id="datanascimento" name="datanascimento" placeholder ="Data de Nascimento" required>
			</div>
			<div  class="col-md-3">
				<label class=" control-label" for="sexo" >Sexo:*</label>
				<select class="form-control" id="sexo" name="sexo" required>
					<option value="">Selecione...</option>
					<option value="0">Masculino</option>
					<option value="1">Feminino</option>
					<option value="2">Indefinido</option>
				</select>
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
				<h5><b>Lista de clientes</b></h5>
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
					include "./torm/models/cliente.php";
					$clientes = cliente::all();
					if(isset($clientes))
					{
						if($clientes->count() > 0)
						{
							foreach ($clientes as $cliente)
							{
								echo '<tr>';
								echo '<td>';
								echo '<a class="btn btn-info btn-small" onclick="CarregaCliente('.$cliente->sqcliente.')" ><span class="glyphicon glyphicon-edit"></span></a>';
								echo '</td>';
								echo '<td>';
								echo $cliente->email;
								echo '</td>';
								echo '<td>';
								echo $cliente->nome;
								echo '</td>';
								echo '<td>';
								echo $cliente->telefone;
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
