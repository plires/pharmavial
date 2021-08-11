<?php

session_start();

if (!$_SESSION) {
session_destroy();
header('Location: ./');
}

include('../config.inc.php');
include_once('../soporte.php');

include_once('../clases/app.php');
include ('../includes/funciones_validar.php');

$section = 'users';
$current = 'user';

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Tag Manager Head -->
    <?php include_once("../includes/tag_manager_head.php"); ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administracion de usuarios. Hotel alojamiento Jonde. Suites de calidad y con precios inmejorables. Conocenos!">
    <meta name="author" content="Librecomunicacion">

    <!-- Favicons -->
    <?php include('includes/favicon.php'); ?>

    <title>Hotel Alojamiento Jonde. Backend</title>

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="../css/normalize.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">
    
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/plugins/toastr/toastr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/app.css">

  </head>

  <body class="hold-transition sidebar-mini">
    <!-- Tag Manager Body -->
    <?php include_once("../includes/tag_manager_body.php"); ?>
    <div class="wrapper">

      <!-- Loader -->
      <?php require('includes/loader.php'); ?>
      <!-- Loader end -->
      
      <?php include('includes/navbar.php'); ?>

      <?php include('includes/aside.php'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Titulo principal -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-12 text-center">
                <h1 class="m-0">Cambio de Contraseña</h1>
              </div>
            </div>
          </div>
        </div>
        <!-- Titulo principal end -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-6 offset-md-3">

                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Password.</h3>
                  </div>

                  <!-- form start -->
                  <form id="form_user" method="post" class="needs-validation" novalidate>

                    <input type="hidden" id="id_user" name="id_user">
                    
                    <div class="card-body">

                      <div class="form-group">
                        <label for="user">Usuario</label>
                        <input disabled type="text" class="form-control" id="user">
                        
                      </div>

                      <div class="form-group">
                        <label for="pass">Ingrese nueva contraseña</label>
                        <input required type="password" class="form-control" id="pass" name="pass" placeholder="Ingrese nueva contraseña">
                        <div class="invalid-feedback">
                          Ingrese una nueva contraseña
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="c_pass">Repita la contraseña</label>
                        <input required type="password" class="form-control" id="c_pass" name="c_pass" placeholder="Repita la contraseña">
                        <div class="invalid-feedback">
                          Repita la contraseña
                        </div>
                      </div>

                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                  </form>
                </div>
                
              </div>
            </div>
            
          </div>
        </section>

      </div>
      <!-- /.content-wrapper -->

      <?php include('includes/footer.php'); ?>
      

    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Toastr -->
    <script src="vendor/almasaeed2010/adminlte/plugins/toastr/toastr.min.js"></script>
    
    <!-- AdminLTE -->
    <script src="vendor/almasaeed2010/adminlte/dist/js/adminlte.js"></script>

    <!-- Formularios.js -->
    <script src="../js/formularios.js"></script>

    <!-- Backend -->
    <script src="js/backend.js"></script>

    <!-- user -->
    <script src="js/change-pass.js"></script>

  </body>
</html>