<?php

require __DIR__ . '/../includes/soporte.php';
require __DIR__ . '/../includes/funciones_validar.php';

$email = '';
$errors = [];

// Envio del formulario de newsletter
if (isset($_POST['send_pass'])) {

  // Verificamos si hay errores en el formulario
  if (!comprobar_email($_POST['email'])){
    $errors['email'] = 'Pst, el email no esta registrado :(';
  } else {
    $email = $_POST['email'];
  }

  if (!$errors) {

    // Comprobar email
    $user = $db->getRepositorioUsers()->getUserByEmail($email);

    if ($user) {

    // Enviar nuevo pass
    $send_pass = $db->getRepositorioUsers()->sendNewPassword($user);

    if ($send_pass) {
      $success='Te enviamos la nueva pass a tu correo. No olvides chequear SPAM :(';
    } else {
      $errors['email']='hubo un error al enviar el correo, por favor volve a intentar :(';
    }

    } else {
      $errors['email']='email no registrado :(';
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
    <meta name="description" content="Reseteo de contraseña. Laboratorio Ibc | Pharmavial">
    <meta name="author" content="Pablo Lires">

    <!-- Favicons -->
    <?php include('includes/favicon.php'); ?>

    <title>Pharmavial - Laboratorio IBC | Reseteo de Contraseña</title>

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

    <title>Pharmavial - Reset Pass</title>
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
                  <h3 class="card-title">Reseteo de contraseña</h3>
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

                <?php if (isset($success)): ?>
                  <div class="alert alert-success alert-dismissible fade show fadeInLeft" role="alert">
                    <strong>¡Reseteo existoso!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>

                    <p><?= $success ?></p>

                  </div>
                <?php endif ?>

                <form id="formLogin" method="post" class="needs-validation" novalidate>

                  <div class="card-body">

                    <!-- Email -->
                    <div class="form-group mb-5">
                      <label for="email">Ingresá tu Email</label>
                      <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?= $email ?>">
                      <div class="invalid-feedback">
                        pst... ingresa tu Email :(
                      </div>
                    </div>
                    
                    <div class="text-right">
                      <a href="./" class="btn btn-secondary mb-5">Volver al login</a>
                      <button name="send_pass" type="submit" class="btn btn-primary mb-5">Enviar nueva contraseña</button>
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