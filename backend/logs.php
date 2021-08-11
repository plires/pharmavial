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

$section = 'logs';
$current = 'logs';

$logs = $db->getRepositorioLogs()->getLogs();

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Tag Manager Head -->
    <?php include_once("../includes/tag_manager_head.php"); ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administracion de precios. Hotel alojamiento Jonde. Suites de calidad y con precios inmejorables. Conocenos!">
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
    <div class="backend_suite wrapper">

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
                <h1 class="m-0">Logs de Cupones Descargados</h1>
              </div>
            </div>
          </div>
        </div>
        <!-- Titulo principal end -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-8 offset-md-2">

                <div class="card card-primary">

                  <?php if ($logs): ?>

                    <table class="table table-striped table-dark">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Sistema Operativo / Browser</th>
                          <th scope="col">IP</th>
                                      <th scope="col">Promoción Descargada</th>
                          <th scope="col">Serie</th>
                                      <th scope="col">Ciudad</th>
                          <th scope="col">Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($logs as $key => $log): ?>
                        <tr>
                          <td scope="row"><?= $key ?></td>
                          <td><?= $log['browser'] ?></td>
                          <td>
                                        <a target="_blank" class="transition" href="https://maps.google.com/?q=<?= $log['lat'] ?>,<?= $log['long'] ?>&z=14">
                                            <?= $log['ip'] ?>
                                        </a>
                                      </td>
                                      <td><?= $log['name_promo'] ?></td>
                          <td><?= $log['serie'] ?></td>
                                      <td><?= $log['city'] ?></td>
                          <td><?= $log['date'] ?></td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>

                  <?php else: ?>
                    <h3 class="text-center">No hay registros para mostrar</h3>
                  <?php endif ?>
                  
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

    <!-- Logs -->
    <script src="js/logs.js"></script>

  </body>
</html>