<?php
include "../../torm/torm.php";
include "../../torm/models/VWPermissao.php";
include "../../torm/models/Permissao.php";

$sqgrupo = '';
if (isset($_POST["selgrupo"])) {  $sqgrupo= $_POST["selgrupo"]; }

$filtro = '';
$filtro = $filtro . 'sqgrupo = ' . $sqgrupo;
$filtro = $filtro . ' or sqgrupo is null ';

VWPermissao::scope("buscapermissoes", $filtro);
$permissoes = VWPermissao::buscapermissoes();

if(isset($permissoes))
{
	foreach ($permissoes as $permissao) {

		$pexistente = Permissao::where(["sqgrupo" => $sqgrupo, "sqmenu" => $permissao->sqmenu])->next();

		if (isset($pexistente))
		{
			if (isset($_POST["sqmenu".$permissao->sqmenu]))
			{
				$pexistente->ativo = 1;
			}
			else
			{
				$pexistente->ativo = 0;
			}
			$pexistente->save();
		}
		else
		{
			$p = new Permissao();
			$p->sqgrupo = $sqgrupo;
			$p->sqmenu = $permissao->sqmenu;

			if (isset($_POST["sqmenu".$permissao->sqmenu]))
			{
				$p->ativo = 1;
			}
			else
			{
				$p->ativo = 0;
			}
				$p->save();
		}
	}
}

	header("location:../../index.php?link=Cadpermissao");

?>
