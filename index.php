<!DOCTYPE html>
<html lang="pt-br">
	<?php
		header('Content-Type: text/html; charset=utf-8');
		if (!isset($_SESSION))	{	session_start(); }
		include "./torm/torm.php";

		$link = "";
		if (isset($_GET["link"]))	{	$link = $_GET["link"];	}

		$administrador = 0;
		if ((isset($_SESSION["Administrador"])) &&
				($_SESSION["Administrador"] == 1))
		{
			$administrador = 1;
		}

		$sqgrupologado = "";
		if (isset($_SESSION["sqgrupo"]))	{	$sqgrupologado = $_SESSION["sqgrupo"];	}

		if (!isset($_SESSION["Autenticado"]) || ($_SESSION["Autenticado"] == 0))	{	header("location:./login.php");	}
	?>
   <head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Evolution System</title>
	  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	  <link rel="stylesheet" href="components/bootstrap/dist/css/bootstrap.min.css">
	  <link rel="stylesheet" href="components/font-awesome/css/font-awesome.min.css">
	  <link rel="stylesheet" href="components/Ionicons/css/ionicons.min.css">
	  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
	  <link rel="stylesheet" href="components/morris.js/morris.css">
	  <link rel="stylesheet" href="components/jvectormap/jquery-jvectormap.css">
	  <link rel="stylesheet" href="components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	  <link rel="stylesheet" href="components/bootstrap-daterangepicker/daterangepicker.css">
	  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<link href="components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="components/lobibox/css/lobibox.css"/>

		<script src="components/jquery/dist/jquery.min.js"></script>
		<script src="components/jquery-ui/jquery-ui.min.js"></script>
		<script>
		  $.widget.bridge('uibutton', $.ui.button);
		</script>
		<script src="components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="components/datatables.net/js/jquery.dataTables.min.js" type="application/javascript"></script>
		<script src="components/raphael/raphael.min.js"></script>
		<script src="components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<script src="components/jquery-knob/dist/jquery.knob.min.js"></script>
		<script src="components/moment/min/moment.min.js"></script>
		<script src="components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		<script src="components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<script src="components/fastclick/lib/fastclick.js"></script>
		<script src="dist/js/adminlte.min.js"></script>
		<script src="components/lobibox/js/lobibox.js"></script>
	</head>
	teste comit
	<body class="hold-transition skin-blue sidebar-mini">
		<?php include "./functions.php"; ?>
		<div class="wrapper">
			<?php
					include "./header.php";
			?>
			<?php
						include "./torm/models/Menu.php";
						include "./torm/models/VWCarregaMenu.php";
						if ($administrador == 1){
							MontaMenuAdministrador();
						}
						else {
							MontaMenu($sqgrupologado);
						}
			?>

		  <div class="content-wrapper">
		    <section class="content">
		      <div class="row">
					<?php
						if ($link != "")
						{
							require("./telas/".$link.".php");
						}
						else {
							require("./telas/home.php");
						}
			  	?>
		      </div>
		    </section>
		  </div>
			<?php
			include "./footer.php";
			 ?>
	 	</div>
	</body>
</html>
