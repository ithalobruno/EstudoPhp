<?php
	include "../torm/torm.php";
	include "../torm/models/Menu.php";
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");

	if (isset($_GET["id"])) { $Menu = Menu::find($_GET["id"]); } else { $Menu= null; }

	$ListaMenu = array();
	if(isset($Menu))
	{
	    $ListaMenu[] = array('sqmenu'      => $Menu->sqmenu,
	                         'nome'       => $Menu->nome,
							 'ordem'      => $Menu->ordem,
							 'nivelmenu'  => $Menu->nivelmenu,
							 'temsubmenu' => $Menu->temsubmenu,
							 'submenu'    => $Menu->submenu,
							 'link'       => $Menu->link,
							 'classe'       => $Menu->class
 	    );
	}

	echo (json_encode($ListaMenu,true));
?>
