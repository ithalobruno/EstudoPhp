<?php
	include "../torm/torm.php";
	include "../torm/models/Usuarios.php";
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	if (isset($_GET["id"])) { $usuario = Usuarios::find($_GET["id"]); } else { $usuario= null; }

	$ListaUsuario = array();
	if(isset($usuario))
	{
	    $ListaUsuario[] = array('squsuario'    	 => $usuario->squsuario,
	                            'usuario'        => $usuario->usuario,
                              'email'          => $usuario->email,
	                            'senha'          => $usuario->senha,
	                            'nmusuario'      => $usuario->nmusuario,
															'sqgrupo'        => $usuario->sqgrupo,
	                            'ativo'          => $usuario->ativo
 	    );
	}

	echo (json_encode($ListaUsuario,true));
?>
