<?php
$link = "";
if (isset($_GET["link"])){ $link = $_GET["link"]; }
?>
<script type="text/javascript">
var link = "<?php echo $link;?>";
</script>
<script src="./js/Usuario.js"></script>

<section class="content-header">
	<h1>
		Editor de Usuários
	</h1>

	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-cog"></i>EvolutionSystem</a></li>
		<li class="active"><a href="#">Usuários</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" id="CadUsuario" method="post" action="./telas/banco/usuarios.php">
				<div class="box-body">
					<input type="hidden" class="form-control" id="squsuario" name="squsuario">
					<div class="form-group">
						<label for="inputNome" class="col-sm-2 control-label">Usuario:</label>
						<div class="col-sm-10">
							<input type="nome" class="form-control" id="usuario" required="required" name="usuario" placeholder="Nome">
						</div>
					</div>

					<div class="form-group">
						<label for="inputNome" class="col-sm-2 control-label">Nome:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nmusuario" name="nmusuario" required="required" placeholder="Nome a ser exibido no sistema">
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email">
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Senha</label>

						<div class="col-sm-10">
							<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha">
						</div>
					</div>

					<div class="form-group">
						<label for="inputGrupo" class="col-sm-2 control-label">Grupo</label>

						<div class="col-sm-10">
							<select class="form-control" id="selgrupo" name="selgrupo" required="required">
								<option value="">Selecione...</option>
								<?php
								include "./torm/models/Grupo.php";
								$grupos = Grupo::all();
								if(isset($grupos))
								{
									if($grupos->count() > 0)
									{
										foreach ($grupos as $grupo)
										{
											echo '<option value="'.$grupo->sqgrupo.'">'.$grupo->grupo.'</option>';
										}
									}
								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="ativo" id="ativo"> Usuário Ativo
								</label>
							</div>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<button type="reset" class="btn btn-default" onclick="LimpaCampos()">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right" id="BtnSalvar" name="BtnSalvar">Gravar</button>
				</div>

			</form>

			<div class="box box-info">
				<form class="form-horizontal" id="GridUsuario">
					<div class="box-body">

						<div class="box">
							<div class="box-body">
								<table class="table table-striped table-hover" id="tabela">
									<thead>
										<tr>
											<th>Nome:</th>
											<th>Email:</th>
											<th>Ativo:</th>
											<th>Editar:</th>
											<th>Excluir:</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "./torm/models/Usuarios.php";
										$usuarios = Usuarios::all();
										if(isset($usuarios))
										{
											if($usuarios->count() > 0)
											{
												foreach ($usuarios as $usuario)
												{
													echo '<tr>';
													echo '<td>';
													echo $usuario->usuario;
													echo '</td>';
													echo '<td>';
													echo $usuario->email;
													echo '</td>';
													echo'<td>';
													if ($usuario->ativo == 1)
													{
														echo 'SIM';
													}
													else
													{
														echo 'NÃO';
													}
													echo '</td>';
													echo '<td>';
													echo '<a class="btn btn-info btn-small" onclick="CarregaUsuario('.$usuario->squsuario.');Habilita()"><span class="glyphicon glyphicon-edit"></span></a>';
													echo '</td>';
													echo '<td>';
													echo '<a class="btn btn-danger"onclick="InativaUsuario('.$usuario->squsuario.')" ><span class="glyphicon glyphicon-remove"></span></a>';
													echo '</td>';
													echo '</tr>';
												}
											}
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>
