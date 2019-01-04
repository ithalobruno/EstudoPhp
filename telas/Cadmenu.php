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
<script src="./js/Menu.js"></script>

<section class="content-header">
	<h1>
		Editor de Menus
	</h1>

	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-cog"></i>EvolutionSystem</a></li>
		<li class="active"><a href="#">Menus</a></li>
	</ol>
</section>


<section class="content">
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" id="CadMenu" method="post" action="./telas/banco/menu.php">
				<div class="box-body">
					<input type="hidden" class="form-control" id="sqmenu" name="sqmenu">

					<div class="form-group">
						<label class="col-lg-2 control-label" for="nome">Nome:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome...">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label" for="link">link:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="link" name="link" placeholder="Link...">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label" for="ordem">Ordem:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="ordem" name="ordem" placeholder="Ordem...">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label" for="nivelmenu">Nível Menu:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="nivelmenu" name="nivelmenu" placeholder="Nível Menu...">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label" for="submenu">sub-Menu:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="submenu" name="submenu" placeholder="Sub-Menu...">
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-2 control-label" for="classe">Class:</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" id="classe" name="classe" placeholder="Classe...">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="temsubmenu" id="temsubmenu"> Tem Submenu:
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
											<th>Ações</th>
											<th>SqMenu</th>
											<th>Nome</th>
											<th>Ordem</th>
											<th>Nível Menu</th>
											<th>TemSubMenu</th>
											<th>SubMenu</th>
											<th>Link</th>
											<th>Class</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$Menus = Menu::all();
										if(isset($Menus))
										{
											if($Menus->count() > 0)
											{
												foreach ($Menus as $Menu)
												{
													echo '<tr>';
													echo '<td>';
													echo '<a class="btn btn-info btn-small" onclick="CarregaMenu('.$Menu->sqmenu.')" ><span class="glyphicon glyphicon-edit"></span></a>';
													echo '</td>';
													echo '<td>';
													echo $Menu->sqmenu;
													echo '</td>';
													echo '<td>';
													echo $Menu->nome;
													echo '</td>';
													echo '<td>';
													echo $Menu->ordem;
													echo '</td>';
													echo '<td>';
													echo $Menu->nivelmenu;
													echo '</td>';
													echo '<td>';
													if ($Menu->temsubmenu == 1)
													{
														echo "SIM";
													}
													else {
														echo "NÃO";
													}
													echo '</td>';
													echo '<td>';
													echo $Menu->submenu;
													echo '</td>';
													echo '<td>';
													echo $Menu->link;
													echo '</td>';
													echo '<td>';
													echo $Menu->class;
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
