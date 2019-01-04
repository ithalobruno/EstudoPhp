<script type="text/javascript">
var link = "<?php echo $link;?>";
</script>
<script src="./js/Permissao.js"></script>
<section class="content-header">
		<h1>
			Editor de Permissões
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-cog"></i>EvolutionSystem</a></li>
			<li class="active"><a href="#">Permissão</a></li>
		</ol>
</section>

<section class="content">
		<div class="row">
				<div class="col-md-12">
						<div class="box-body">
								<form class="form-horizontal" id="CadPermissao" method="post" action="./telas/banco/permissao.php">
										<div class="form-group">
											<label class="col-sm-2 control-label" for="selgrupo">Grupo:</label>
											<div class="col-lg-10">
													<select class="form-control" id="selgrupo" name="selgrupo" required="required" onchange="CarregaPermissoes()">
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
								<input type="hidden" class="form-control" id="sqgrupo" name="sqgrupo">
								<div class="form-group" id="checkboxs" name="checkboxs">	</div>
								<div class="box-footer">
										<button type="reset" class="btn btn-default" onclick="LimpaCampos()">Cancelar</button>
										<button type="submit" class="btn btn-info pull-right" id="BtnSalvar" name="BtnSalvar">Gravar</button>
							</div>
				 </form>
			</div>
		</div>
	</div>
</section>
