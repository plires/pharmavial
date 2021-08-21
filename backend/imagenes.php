<?php

session_start();

if (!$_SESSION) {
session_destroy();
header('Location: ./');
}

require __DIR__ . '/../includes/soporte.php';
require __DIR__ . '/../clases/app.php';
require __DIR__ . '/../includes/funciones_validar.php';

$section = 'images';
$current = 'images';

$productos = $db->getRepositorioProducts()->getProducts();

?>

<!doctype html>
<html lang="es">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Administracion de imagenes de productos. Laboratorio Ibc | Pharmavial">
    <meta name="author" content="Pablo Lires">

    <!-- Favicons -->
    <?php include('includes/favicon.php'); ?>

    <title>Pharmavial | Laboratorio IBC | Imagenes</title>

    <!-- Normalize CSS -->
    <link rel="stylesheet" href="../node_modules/normalize.css/normalize.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/plugins/fontawesome-free/css/all.min.css">

    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/plugins/ekko-lightbox/ekko-lightbox.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/dist/css/adminlte.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="vendor/almasaeed2010/adminlte/plugins/toastr/toastr.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/app.css">

  </head>

  <body class="hold-transition sidebar-mini">
    <div id="app" class="content_imagenes wrapper">

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
                <h1 class="m-0">Imagenes del Producto.</h1>
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
                    <h3 class="card-title">Seleccione el producto para editar sus imágenes</h3>
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
                  <form id="form_image" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>

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

                      <div class="form-group">
                        <label>Seleccionar Producto</label>
                        <select 
                          required 
                          v-model="selected" 
                          id="product_id" 
                          class="custom-select">

                          <option value="0" selected>Seleccione producto para editar imágenes</option>
                          
                          <option 
                            v-for="(product, index) in productsByLang" 
                            :key="index" :value="product.id"> {{ product.name }} - {{ product.language }}
                          </option>

                        </select>

                        <div class="invalid-feedback">
                          Seleccione un producto
                        </div>

                      </div>

                      <div v-if="imagesByProduct.length > 0 && selected != 0" class="row">

                        <div v-for="(image, index) in imagesByProduct" :key="index" class="col-sm-2 content_image">

                          <div title="Borrar Imagen" class="transition" @click="deleteImage(image.id, index)" id="deleteImage">
                            <i class="fas fa-trash transition"></i>
                          </div>

                          <a 
                            :href="'/../img/productos/' + image.url"
                            data-toggle="lightbox" 
                            :data-title="image.alt" 
                            data-gallery="gallery"
                          >
                            <img 
                              :src="'/../img/productos/' + image.url"
                              class="img-fluid mb-2" 
                              :alt="image.alt"
                            />
                          </a>

                        </div>

                      </div>

                      <div v-else-if="selected != 0">
                        <p class="parrafo_sin_imagenes">Producto sin imágenes</p>
                      </div>

                      <div v-if="selected != 0"class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <hr>
                            <div class="form-row">
                              
                              <div class="form-group col-md-5">
                                <label for="presentation">Agregar imágen (*) (Recomendado: 600x400px o proporcional)</label>
                                <div class="custom-file">
                                  <input 
                                    type="file" 
                                    class="custom-file-input" 
                                    id="customFileLang" 
                                    ref="myFile"
                                    lang="es">
                                  <label class="custom-file-label" for="customFileLang">Agregar Imágen</label>
                                </div>
                              </div>

                              <div class="form-group col-md-5">
                                <label for="alt">Ingrese un texto alternativo para la nueva imagen (opcional)</label>
                                <input type="text" class="form-control" id="alt" name="alt" placeholder="(Una buena elección puede ser colocar el nombre del producto)">
                              </div>

                              <div class="form-group col-md-2">
                                <button @click.prevent="sendImage" class="btn btn-primary">Subir Imágen</button>
                              </div>

                            </div>
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

    <!-- Ekko Lightbox -->
    <script src="vendor/almasaeed2010/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    
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
    <script src="js/vue-backend.js"></script>

    <!-- Images -->
    <script src="js/images.js"></script>

  </body>
</html>