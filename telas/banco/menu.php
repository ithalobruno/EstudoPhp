<?php
include "../../torm/torm.php";
include "../../torm/models/Menu.php";

if (!isset($_SESSION))
{
	session_start();
}

if (isset($_POST["BtnSalvar"]))
{
	$sqmenu = '';
	if (isset($_POST["sqmenu"]))  { $sqmenu= $_POST["sqmenu"]; }

	$nome = '';
	if (isset($_POST["nome"]))	{	$nome = $_POST["nome"];	}

	$ordem = '';
	if (isset($_POST["ordem"]))	{	$ordem = $_POST["ordem"];	}

	$nivelmenu = '';
	if (isset($_POST["nivelmenu"]))	{	$nivelmenu = $_POST["nivelmenu"];	}

	$temsubmenu = '';
	if (isset($_POST["temsubmenu"])) 	{	$temsubmenu = 1;	} 	else 	{	$temsubmenu = 0;	}

	$submenu = '';
	if (isset($_POST["submenu"]))	{	$submenu = $_POST["submenu"];	}

	$link = '';
	if (isset($_POST["link"]))	{	$link = $_POST["link"];	}

	$classe = '';
	if (isset($_POST["classe"]))	{	$classe = $_POST["classe"];	}

	$Menu = new Menu();
	$Menu->sqmenu = $sqmenu;
	$Menu->nome = $nome;
	$Menu->ordem = $ordem;
	$Menu->nivelmenu = $nivelmenu;
	$Menu->temsubmenu = $temsubmenu;
	$Menu->submenu = $submenu;
	$Menu->link = $link;
	$Menu->class = $classe;
	$Menu->save();
}
header("location:../../index.php?link=CadMenu");
?>
