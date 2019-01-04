<?php
include "../torm/torm.php";
include "../torm/models/Grupo.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if (isset($_GET["id"])) { $grupo = Grupo::find($_GET["id"]); } else { $grupo= null; }

$ListaGrupo = array();
if(isset($grupo))
{
	$ListaGrupo[] = array( 'sqgrupo'    	 				 => $grupo->sqgrupo,
	'grupo'        				 => $grupo->grupo,
	'ativo'       				 => $grupo->ativo,
	'administrador'        => $grupo->administrador
);
}

echo (json_encode($ListaGrupo,true));
?>
