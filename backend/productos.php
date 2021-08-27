<?php

session_start();

if (!$_SESSION) {
session_destroy();
header('Location: ./');
}

require __DIR__ . '/../includes/soporte.php';
require __DIR__ . '/../clases/app.php';
require __DIR__ . '/../includes/funciones_validar.php';

$section = 'products';
$current = 'products';

$productos = $db->getRepositorioProducts()->getProducts();

?>

<!doctype html>
<html lang="es">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administracion de productos. Laboratorio Ibc | Pharmavial">
    <meta name="author" content="Pablo Lires">

    <!-- Favicons -->
    <?php include('includes/favicon.php'); ?>

    <title>Pharmavial | Laboratorio IBC | Edición de Productos</title>

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
    <div id="app" class="backend_suite wrapper">

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
                <h1 class="m-0">Edición de productos.</h1>
              </div>
            </div>
          </div>
        </div>
        <!-- Titulo principal end -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-md-10 m-auto">

                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Seleccione el producto a editar y luego grabe los nuevos nuevos valores</h3>
                  </div>
                  
                  <!-- form start -->
                  <form id="form_product" method="post" class="needs-validation" novalidate>

                    <input type="hidden" id="id_product" name="id_product">
                    
                    <div class="card-body">

                      <div class="form-group text-right">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-primary active">
                            <input @click="changeLanguage('es')" type="radio" name="options" id="option1" checked> Español
                          </label>
                          <label class="btn btn-primary">
                            <input @click="changeLanguage('en')" type="radio" name="options" id="option2"> Ingles
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Seleccionar Producto</label>
                        <select required v-model="selected" id="product_id" name="name" class="custom-select">

                          <option value="0" selected>Seleccione producto para cambiar los valores</option>
                          
                          <option 
                            v-for="(product, index) in productsByLang" 
                            :key="index" :value="product.id"> {{ product.name }} - {{ product.language }}
                          </option>

                        </select>

                        <div class="invalid-feedback">
                          Seleccione un producto
                        </div>

                      </div>

                      <div v-bind:class="selected != 0 ? '' : 'd-none'">
                        
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="name">Nombre del Producto</label>
                            <input class="form-control" required type="text" id="name" name="name" placeholder="Nombre del Producto">
                            <div class="invalid-feedback">
                              Ingrese el nombre del producto
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="active_principle">Principio Activo</label>
                            <input required type="text" class="form-control" id="active_principle" name="active_principle" placeholder="Principio Activo">
                            <div class="invalid-feedback">
                              Ingrese el principio activo
                            </div>
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="presentation">Presentación</label>
                            <input required type="text" class="form-control" id="presentation" name="presentation" placeholder="Presentación">
                            <div class="invalid-feedback">
                              Ingrese la presentación
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="units_per_box">Unidades por Caja</label>
                            <input required type="text" class="form-control" id="units_per_box" name="units_per_box" placeholder="Unidades por Caja">
                            <div class="invalid-feedback">
                              Ingrese las unidades por caja
                            </div>
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="pharmaceutical_form">Forma Farmacéutica</label>
                            <input required type="text" class="form-control" id="pharmaceutical_form" name="pharmaceutical_form" placeholder="Forma Farmacéutica">
                            <div class="invalid-feedback">
                              Ingrese la forma farmacéutica
                            </div>
                          </div>

                          <div class="form-group col-md-6">
                            <label for="therapeutic_line">Línea Terapéutica</label>
                            <input required type="text" class="form-control" id="therapeutic_line" name="therapeutic_line" placeholder="Línea Terapéutica">
                            <div class="invalid-feedback">
                              Ingrese la línea terapéutica
                            </div>
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="language">Idioma (es = Español | en = Ingles)</label>
                            <input required type="text" class="form-control" id="language" name="language" placeholder="Idioma">
                            <div class="invalid-feedback">
                              Ingrese el idioma para visualizar en el sitio
                            </div>
                          </div>
                        </div>

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                      </div>

                    </div>
                    <!-- /.card-body -->

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

    <!-- Vue -->
    <script src="../node_modules/vue/dist/vue.js"></script>

    <!-- Axios -->
    <script src="../node_modules/axios/dist/axios.min.js"></script>

    <!-- Formularios.js -->
    <script src="../js/formularios.js"></script>

    <!-- Backend -->
    <script src="js/backend.js"></script>

    <!-- VUE Backend -->
    <script src="js/vue-backend-edit-product.js"></script>

    <!-- Productos -->
    <script src="js/products.js"></script>

  </body>
</html>