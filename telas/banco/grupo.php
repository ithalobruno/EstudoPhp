<?php
include "../../torm/torm.php";
include "../../torm/models/Grupo.php";

if (!isset($_SESSION))
{
	session_start();
}
if (isset($_POST["BtnSalvar"]))
{

	$sqgrupo = '';
	if (isset($_POST["sqgrupo"])) { $sqgrupo= $_POST["sqgrupo"];  }

	$grupo = '';
	if (isset($_POST["grupo"]))	{	$grupo = $_POST["grupo"]; 	}

	$ativo = '';
	if (isset($_POST["ativo"])) 	{	$ativo = 1;	} 	else 	{	$ativo = 0;	}

	$administrador = '';
	if (isset($_POST["administrador"])) 	{	$administrador = 1;	} 	else 	{	$administrador = 0;	}

	$Grupo = new Grupo();
	$Grupo->sqgrupo = $sqgrupo;
	$Grupo->grupo = $grupo;
	$Grupo->ativo = $ativo;
	$Grupo->administrador = $administrador;
	$Grupo->save();
	header("location:../../index.php?link=Cadgrupo");

}
?>
