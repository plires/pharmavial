<?php

session_start();

if ($_SESSION) {
  header('Location: productos.php');
}

require __DIR__ . '/../includes/soporte.php';
require __DIR__ . '/../includes/funciones_validar.php';

$user = '';
$errors = [];

// Envio del formulario de newsletter
if (isset($_POST['send_login'])) {

  // Verificamos si hay errores en el formulario
  if (campoVacio($_POST['user'])){
    $errors['user']='Pst, falta el usuario :(';
  } else {
    $user = $_POST['user'];
  }

  if (campoVacio($_POST['pass'])){
    $errors['pass']='Pst, falta el pass :(';
  } else {
    $pass = $_POST['pass'];
  }

  if (!$errors) {

    // Comprobar usuario y pass
    $user = $db->getRepositorioUsers()->login($user, $pass);

    if ($user) {
      session_start();
      $_SESSION['user'] = $user;
      header('location:productos.php');
    } else {
      $errors['login']='Usuario o pass incorrectos :(';
    }

  }

}

?>

<!doctype html>
<html class="h-100" lang="es">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Login - Pharmavial">
    <meta name="author" content="Pablo Lires">

    <!-- Favicons -->
    <?php include('includes/favicon.php'); ?>

    <title>Pharmavial. Backend</title>

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

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/app.css">

    <title>Login Pharmavial</title>
  </head>
  <body class="hold-transition sidebar-mini h-100">

    <div class="backend_login content-header h-100">
      <!-- Main content -->
      <section class="content h-100">
        <div class="container-fluid h-100">

          <div class="row h-100">
            <div class="col-md-6 offset-md-3">

              <div class="w-100 card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Login de usuario</h3>
                </div>
                <!-- /.card-header -->

                <?php if ($errors): ?>
                  <div id="error" class="alert alert-danger alert-dismissible fade show fadeInLeft" role="alert">
                    <strong>¡Por favor verificá los datos!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                    <ul style="padding: 0;">
                      <?php foreach ($errors as $error) { ?>
                        <li> <?php echo $error; ?></li>
                      <?php } ?>
                    </ul>

                  </div>
                <?php endif ?>

                <form id="formLogin" method="post" class="needs-validation" novalidate>

                  <div class="card-body">

                    <!-- Usuario -->
                    <div class="form-group mb-5">
                      <label for="user">Ingresá tu Usuario</label>
                      <input required type="text" class="form-control" id="user" name="user" aria-describedby="userlHelp" placeholder="Usuario" value="<?= $user ?>">
                      <div class="valid-feedback">
                        Bien Hecho!
                      </div>
                      <div class="invalid-feedback">
                        pst... ingresa tu usuario :(
                      </div>
                    </div>
                    
                    <!-- Pass -->
                    <div class="form-group mb-3">
                      <label for="pass">Ingresá tu Password</label>
                      <input required type="password" class="form-control" id="pass" name="pass" placeholder="Password">
                      <div class="valid-feedback">
                        Bien Hecho!
                      </div>
                      <div class="invalid-feedback">
                        pst... ingresa tu pasword :(
                      </div>
                    </div>

                    <div>
                      <a href="reset_password.php">Olvide mi contraseña</a>
                    </div>

                    <div class="text-right">
                      <button name="send_login" type="submit" class="btn btn-primary mb-5">Login</button>
                    </div>

                  </div>

                </form>
               
              </div>
              
            </div>
          </div>
          
        </div>
      </section>
    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="vendor/almasaeed2010/adminlte/plugins/jquery/jquery.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="vendor/almasaeed2010/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- AdminLTE -->
    <script src="vendor/almasaeed2010/adminlte/dist/js/adminlte.js"></script>

    <!-- Formularios.js -->
    <script src="../js/formularios.js"></script>

  </body>
</html>