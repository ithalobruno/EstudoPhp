<?php
	include "../../torm/torm.php";
	include "../../torm/models/Usuarios.php";

	if (!isset($_SESSION))
	{
		session_start();
	}

	if (isset($_POST["BtnSalvar"]))
	{
      $squsuario = '';
	    if (isset($_POST["squsuario"])) { $squsuario= $_POST["squsuario"];  }

	    $usuario = '';
    	if (isset($_POST["usuario"]))	{	$usuario = $_POST["usuario"]; 	}

			$nmusuario = '';
    	if (isset($_POST["nmusuario"]))	{	$nmusuario = $_POST["nmusuario"]; 	}

      $email = '';
    	if (isset($_POST["email"]))	{	$email = $_POST["email"]; 	}

    	$senha = '';
    	if (isset($_POST["senha"]))	{	$senha = $_POST["senha"]; 	}

			$ativo = '';
    	if (isset($_POST["ativo"])) 	{	$ativo = 1;	} 	else 	{	$ativo = 0;	}

			$sqgrupo= '';
			if (isset($_POST["selgrupo"])) 	{ $sqgrupo = $_POST["selgrupo"]; 	}


    	$Usuario = new Usuarios();
    	$Usuario->squsuario = $squsuario;
			$Usuario->nmusuario = $nmusuario;
    	$Usuario->usuario = $usuario;
			$Usuario->email = $email;
			$Usuario->sqgrupo = $sqgrupo;
			if(!empty($_POST["squsuario"]))
			{
					$User = Usuarios::where(["squsuario" => $squsuario])->next();
					if (isset($User))
					{
						if($User->senha == $senha)
						{
							$senha= $_POST["senha"];
						}
						else
						{
						$senha = md5($_POST["senha"]);
						}
					}
			}
			else
			{
				$senha = md5($_POST["senha"]);
			}
			$Usuario->senha = $senha;
			$Usuario->ativo = $ativo;
			$Usuario->save();
			}
	if (isset($_GET["id"]))
	{
		$usuario = Usuarios::find($_GET["id"]);

		if(isset($usuario))
		{
			$usuario->destroy();
		}
	} else
	{
		$usuario= null;
	}
header("location:../../index.php?link=Cadusuario");
?>
