<?php

session_start();

if (!$_SESSION) {
session_destroy();
header('Location: ./');
}

require __DIR__ . '/../includes/soporte.php';
require __DIR__ . '/../clases/app.php';
require __DIR__ . '/../includes/funciones_validar.php';

$section = 'prospects';
$current = 'prospects';

$productos = $db->getRepositorioProducts()->getProducts();

?>

<!doctype html>
<html lang="es">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administracion de prospectos del productos. Laboratorio Ibc | Pharmavial">
    <meta name="author" content="Pablo Lires">

    <!-- Favicons -->
    <?php include('includes/favicon.php'); ?>

    <title>Pharmavial | Laboratorio IBC | Prospectos</title>

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="../node_modules/normalize.css/normalize.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/plugins/toastr/toastr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/app.css">

  </head>

  <body class="hold-transition sidebar-mini">
    <div id="app" class="content_imagenes content_prospectos wrapper">

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
                <h1 class="m-0">Prospectos del Producto.</h1>
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
                    <h3 class="card-title">Seleccione el producto para editar su prospecto</h3>
                  </div>

                  <div v-if="errors.length > 0" class="alert alert-danger alert-dismissible fade show" role="alert">
                    Por favor corregí la siguiente <strong>información</strong>
                    <button @click="errors = []" type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                      <li v-for="error in errors" v-cloak>{{ error }}</li>
                    </ul>
                  </div>

                  <!-- form start -->
                  <form id="form_product" enctype="multipart/form-data" method="post">

                    <div class="card-body">

                      <div class="form-group text-right">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                          <label class="btn btn-primary active">
                            <input @click="changeLanguage('es')" type="radio" id="option1" checked>Español
                          </label>
                          <label class="btn btn-primary">
                            <input @click="changeLanguage('en')" type="radio" id="option2">Ingles
                          </label>
                        </div>
                      </div>

                      <div class="form-group mb-5">
                        <label>Seleccionar Producto</label>
                        <select 
                          required 
                          v-model="selected" 
                          id="product_id" 
                          class="custom-select">

                          <option value="0" selected>Seleccione producto para editar el prospecto</option>
                          
                          <option 
                            v-for="(product, index) in productsByLang" 
                            :key="index" :value="product.id"> {{ product.name }} - {{ product.language }}
                          </option>

                        </select>

                      </div>

                      <div v-if="prospect && selected != 0" class="mb-5 text-center">
                        <a 
                          class="btn btn-success transition" 
                          target="_blank" 
                          :href="'./../prospectos/' + prospect">Ver Prospecto Cargado
                          <i class="fas fa-file-pdf"></i>
                        </a>

                        <button @click.prevent="deleteCurrentProspect(selected)" class="btn btn-danger ml-2 transition">
                          Eliminar
                          <i class="far fa-trash-alt"></i>
                        </button>

                      </div>

                      <div v-if="selected != 0" class="form-group">
                        <label for="uploadProspect">Cargar / Cambiar Prospecto actual (Sólo PDF - Máx 5mb.)</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input 
                              type="file" 
                              class="custom-file-input" 
                              id="uploadProspect" 
                              name="uploadProspect"
                              ref="myFile">
                            <label class="custom-file-label" for="uploadProspect">Elegir Archivo</label>
                          </div>
                          <div class="input-group-append">
                            <button @click.prevent="sendNewProspect" class="input-group-text">Cargar</button>
                          </div>
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

    <!-- Alerts -->
    <script src="./../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- VUE Backend -->
    <script src="js/vue-backend-prospects.js"></script>

    <!-- prospects -->
    <script src="js/prospects.js"></script>

  </body>
</html>