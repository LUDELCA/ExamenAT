<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link href="./assets/fontawesome_free_6.1.1_web/css/fontawesome.css" rel="stylesheet">
      <link href="./assets/fontawesome_free_6.1.1_web/css/brands.css" rel="stylesheet">
      <link href="./assets/fontawesome_free_6.1.1_web/css/solid.css" rel="stylesheet">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?pagina=recargas" class="brand-link">
      <img src="https://estafaopiniones.com/wp-content/uploads/2021/11/apuestatotal.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Apuesta Total</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Luis Delgado</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item">
            <a href="index.php?pagina=recargas" class="nav-link">
             <i class="nav-icon fas fa-coins"></i>
            <p>
            Recargas
            </p>
            </a>
            
            </li>
            <li class="nav-item">
            <a href="index.php?pagina=clientes" class="nav-link">
             <i class="nav-icon fas fa-users"></i>
            <p>
            Clientes
            </p>
            </a>
            
            </li>

            <li class="nav-item">
            <a href="index.php?pagina=bancos" class="nav-link">
             <i class="nav-icon fas fa-university"></i>
            <p>
            Banco
            </p>
            </a>
            
            </li>

            <li class="nav-item">
            <a href="index.php?pagina=reporte" class="nav-link">
             <i class="nav-icon fas fa-chart-line"></i>
            <p>
            Reporte
            </p>
            </a>
            
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

        <div class="container-fluid">
            <h3 class="text-center py-3">Sistema de Recargas</h3>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="container-fluid">
                    <div class="container py-5">
                        <?php
if (isset($_GET['pagina'])) {
    if ($_GET['pagina'] == "recargas" ||
        $_GET['pagina'] == "clientes" ||
        $_GET['pagina'] == "bancos" ||
        $_GET['pagina'] == "reporte") {
        include 'paginas/reg_' . $_GET["pagina"] . '.php';
    } else {
        include 'paginas/error404.php';
    }
} else {
    include 'paginas/reg_recargas.php';
    $_GET['pagina'] = "recargas";
}
?>
                    </div>
                </div>

            </div>
        </div>

</div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="">Apuesta Total</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap -->
<!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/68cce17049.js" crossorigin="anonymous"></script>
<script src="./assets/jquery/jquery.min.js"></script>
<script>
    var fecha_hoy = '<?php echo date('d/m/Y'); ?>';
</script>
<script src="vistas/js/<?php echo $_GET["pagina"] . ".js?v=" . date('YmdHis'); ?>"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>


      

</body>
</html>