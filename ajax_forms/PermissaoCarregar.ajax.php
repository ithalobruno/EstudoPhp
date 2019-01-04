<?php
include "../torm/torm.php";
include "../torm/models/VWPermissao.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (isset($_GET["id"])) {
	$filtro = '';
	$filtro = $filtro . 'sqgrupo = ' . $_GET["id"];
	$filtro = $filtro . ' or sqgrupo is null';

	VWPermissao::scope("buscapermissoes", $filtro);
	$permissoes = VWPermissao::buscapermissoes();
}
else { $permissoes= null; }

$ListaPermissao = array();
if(isset($permissoes))
{
	foreach ($permissoes as $permissao) {
		$ListaPermissao[] = array('sqmenu'   => $permissao->sqmenu,
		'sqgrupo'       => $permissao->sqgrupo,
		'menu'          => $permissao->menu,
		'link'          => $permissao->link,
		'ativo'          => $permissao->ativo,
	);
}
}
echo (json_encode($ListaPermissao,true));
?>
