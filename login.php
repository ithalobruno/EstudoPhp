<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Evolution System</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="components/lobibox/dist/css/Lobibox.min.css"/>
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <script src="components/lobibox/lib/jquery.1.11.min.js"></script>
    <script src="components/lobibox/dist/js/Lobibox.min.js"></script>
    <script src="components/jquery/dist/jquery.min.js"></script>
    <script src="components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/iCheck/icheck.min.js"></script>
  </head>
  <body class="hold-transition login-page">
    <?php
    	   if (!isset($_SESSION))
    	   {
    	   	session_start();
    	   }
           if (isset($_SESSION["Autenticado"]))
    	     {
      	     	if ($_SESSION["Autenticado"] == 0)
      	     	{
    ?>
                <script>
                  Lobibox.alert('error', //AVAILABLE TYPES: "error", "info", "success", "warning"
                    {
                      msg: "Usuário ou senha inválido"
                    });
                </script>
    <?php

      	     	}
    	     }

    ?>
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index.html"><b>Evolution</b>System</a>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">Conecte-se para iniciar a sessão</p>

        <form method="post" action="./telas/banco/logar.php">
          <div class="form-group has-feedback">
            <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Usuario">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input id="senha" type="password" class="form-control" name="senha" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
            </div>
          </div>
        </form>
        <br/>
        <br/>
        <a href="#">Esqueci minha senha</a><br>
      </div>
    </div>
  </body>
</html>
