<?php
	if (!isset($_SESSION))
	{
		session_start('inicio');
	}

	session_destroy();
	header("location:./login.php");
?>
