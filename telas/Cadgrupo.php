<?php
$link = "";
if (isset($_GET["link"])){ $link = $_GET["link"]; }
?>
<script type="text/javascript">
var link = "<?php echo $link;?>";
</script>
<script src="./js/Grupo.js"></script>

<section class="content-header">
	<h1>
		Editor de Grupos
	</h1>

	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-cog"></i>EvolutionSystem</a></li>
		<li class="active"><a href="#">Grupos</a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" id="CadGrupo" method="post"action="./telas/banco/grupo.php">
				<div class="box-body">
					<input type="hidden" class="form-control" id="sqgrupo" name="sqgrupo">
					<div class="form-group">
						<label for="inputNome" class="col-sm-2 control-label">Grupo:</label>
						<div class="col-sm-10">
							<input type="nome" class="form-control" id="grupo" required="required" name="grupo" placeholder="Grupo">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="ativo" id="ativo"> Grupo Ativo
								</label>
							</div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="administrador" id="administrador"> Grupo Administrador
								</label>
							</div>
						</div>
					</div>


					<div class="box-footer">
						<button type="reset" class="btn btn-default" onclick="LimpaCampos()">Cancelar</button>
						<button type="submit" class="btn btn-info pull-right" id="BtnSalvar" name="BtnSalvar">Gravar</button>
					</div>
				</div>
			</form>

			<div class="box box-info">
				<form class="form-horizontal" id="GridGrupo">
					<div class="box-body">

						<div class="box">
							<div class="box-body">
								<table class="table table-striped table-hover" id="tabela">
									<thead>
										<tr>
											<th>Grupo:</th>
											<th>Ativo:</th>
											<th>Administador:</th>
											<th>Editar:</th>
										</tr>
									</thead>
									<tbody>
										<?php
										include "./torm/models/Grupo.php";
										$grupos = Grupo::all();
										if(isset($grupos))
										{
											if($grupos->count() > 0)
											{
												foreach ($grupos as $grupo)
												{
													echo '<tr>';
													echo '<td>';
													echo $grupo->grupo;
													echo '</td>';
													echo'<td>';
													if ($grupo->ativo == 1)
													{
														echo 'SIM';
													}
													else
													{
														echo 'NÃO';
													}
													echo '</td>';
													echo'<td>';
													if ($grupo->administrador == 1)
													{
														echo 'SIM';
													}
													else
													{
														echo 'NÃO';
													}
													echo '</td>';

													echo '<td>';
													echo '<a class="btn btn-info btn-small" onclick="CarregaGrupo('.$grupo->sqgrupo.');"><span class="glyphicon glyphicon-edit"></span></a>';
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
