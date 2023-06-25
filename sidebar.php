
<div class="container-scroller">
  <!-- navbar -->
  <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="show-home.php"><img src="src/images/corazon.png" class="mr-" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="show-home.php"><img src="src/images/corazon.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="close-sesion" href="view/cerrar-sesion.php" data-toggle="dropdown" id="profileDropdown">
              <i class="icon-ellipsis"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="show-cerrar-sesion.php">
                <i class="ti-power-off text-primary"></i>
                Cerrar sesión
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
  </nav>
  <div class="container-fluid page-body-wrapper">        
    <!-- Comienza Sidebar -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="show-home.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Inicio</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-citas.php">
              <i class="mdi mdi-clipboard-outline menu-icon"></i>
              <span class="menu-title">Citas</span>
            </a>
          </li>
<!--           <li class="nav-item"> 
            <a class="nav-link" href="show-consultas.php">
              <i class="mdi mdi-weight-kilogram menu-icon"></i>
              <span class="menu-title">Consultas</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="show-empleados.php">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Empleados</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-stethoscope menu-icon"></i>
              <span class="menu-title">Pacientes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="show-form-pacientes.php">Nuevo Paciente</a></li>
                <li class="nav-item"> <a class="nav-link" href="show-table-pacientes.php">Tabla Pacientes</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-patologias.php">
              <i class="mdi mdi-heart-pulse menu-icon"></i>
              <span class="menu-title">Patologias</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-roles.php">
              <i class="mdi mdi-account-convert menu-icon"></i>
              <span class="menu-title">Roles</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-recibos.php">
              <i class=" icon-paper menu-icon"></i>
              <span class="menu-title">Recibos</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <i class="mdi mdi-pill menu-icon"></i>
              <span class="menu-title">Antecedentes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="show-usuarios.php">
              <i class="mdi mdi-account-multiple menu-icon"></i>
              <span class="menu-title">Usuarios</span>
            </a>
          </li>
          

       
        </ul>
      </nav>
      <!-- Termina Sidebar -->
