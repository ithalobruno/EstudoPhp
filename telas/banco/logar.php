<?php
	if (!isset($_SESSION))
	{
		session_start();
	}

	include "../../torm/torm.php";
	include "../../torm/models/Usuarios.php";

	$user = '';
	if (isset($_POST["usuario"]))	{	$user = $_POST["usuario"];	}

	$senha = '';
	if (isset($_POST["senha"]))	{	$senha= md5(addslashes($_POST["senha"])); }

	$Usuario = Usuarios::where(["usuario" => $user, "senha" => $senha, "ativo" => 1])->next();

	if (isset($Usuario))
	{
	
	$_SESSION["squsuario"] = $Usuario->squsuario;
	$_SESSION["usuario"] = $Usuario->usuario;
    $_SESSION["NmUsuario"] = $Usuario->nmusuario;
    $_SESSION["sqgrupo"] = $Usuario->sqgrupo;
	$_SESSION["Administrador"] = 	($Usuario->sqgrupo == 1);
    $_SESSION["Autenticado"] = 1;
    header("location:../../index.php");

	}
	else
	{

		$_SESSION["Autenticado"] = 0;
		header("location:../../login.php");

	}
?>
