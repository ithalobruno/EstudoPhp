<header class="main-header">
  <!-- Logo -->
  <a href="index.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>Ev</b>Sm</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Evolution</b>System</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- FOTINHA DO USUARIO LOGADO -->
            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo strtoupper (isset($_SESSION['NmUsuario']) ? $_SESSION['NmUsuario'] : "Usuário sem seção"); ?></span>
          </a>
          <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="nav navbar-nav">
                  <a href="./Deslogar.php" class="btn bg-navy btn-flat margin">Sair</a>
                </div>
              </li>
            </ul>
      </ul>
    </div>
  </nav>
</header>
