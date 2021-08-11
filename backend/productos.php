<?php

session_start();

if (!$_SESSION) {
session_destroy();
header('Location: ./');
}

include('../includes/config.inc.php');
include_once('../includes/soporte.php');

include_once('../clases/app.php');
include ('../includes/funciones_validar.php');

$section = 'suites';
$current = 'suites';

$suites = $db->getRepositorioSuites()->getSuitesWithMainImage($section);

?>

<!doctype html>
<html lang="es">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administracion de precios. Hotel alojamiento Jonde. Suites de calidad y con precios inmejorables. Conocenos!">
    <meta name="author" content="Librecomunicacion">

    <!-- Favicons -->
    <?php include('includes/favicon.php'); ?>

    <title>Hotel Alojamiento Jonde. Backend</title>

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="../node_modules/normalize.css/normalize.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

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
                <h1 class="m-0">Precios y Descuentos Suites</h1>
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
                    <h3 class="card-title">Seleccione la suite a editar y luego grabe los nuevos valores</h3>
                  </div>
                  

                  <!-- form start -->
                  <form id="form_suite" method="post" class="needs-validation" novalidate>

                    <input type="hidden" id="id_suite" name="id_suite">
                    
                    <div class="card-body">

                      <div class="form-group mb-5">
                        <label>Seleccionar Suite</label>
                        <select id="suite_id" class="custom-select">

                          <?php foreach ($suites as $key => $suite): ?>
                            <option value=" <?= $suite['id'] ?> "> <?= $suite['name'] ?> </option>
                          <?php endforeach ?>

                          <option value="0" selected>Seleccione suite para cambiar los valores</option>

                        </select>
                      </div>

                      <div class="form-group">
                        <label for="price_regular">Precio Estandar</label>
                        <input required type="text" class="form-control" id="price_regular" name="price_regular" placeholder="Precio estandar">
                        <div class="invalid-feedback">
                          Ingrese un número válido
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="price_3_hs">Precio Turno 3 Hs (sólo si aplica)</label>
                        <input type="text" class="form-control" id="price_3_hs" name="price_3_hs" placeholder="Precio turno 3 Hs (si lo hay)">
                      </div>

                      <div class="form-group">
                        <label for="discount">Porcentaje de Descuento por pago contado (en blanco si no lo hay)</label>
                        <input required type="text" class="form-control" id="discount" name="discount" placeholder="Porcentaje de Descuento por pago contado (en blanco si no lo hay)">
                      </div>

                    </div>
                    <!-- /.card-body -->

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

    <!-- Suites -->
    <script src="js/suites.js"></script>

  </body>
</html>