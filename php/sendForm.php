<?php

  // Envio del formulario de contacto
  if (isset($_POST["send"])) {

    // Verificamos si hay errores en el formulario
    if (campoVacio($_POST['name'])){

      if ($_SESSION['lang'] === 'es') {
        $errors['name']='Ingresa tu nombre';
      } else {
        $errors['name']='Enter your name';
      }
      
    } else {
      $name = $_POST['name'];
    }

    if (!comprobar_email($_POST['email'])){

      if ($_SESSION['lang'] === 'es') {
        $errors['email']='Ingresa el mail :(';
      } else {
        $errors['email']='Enter your E-Mail';
      }

    } else {
      $email = $_POST['email'];
    }

    if (campoVacio($_POST['comments'])){

      if ($_SESSION['lang'] === 'es') {
        $errors['comments']='Ingresa tu consulta';
      } else {
        $errors['comments']='Enter your comments';
      }

    } else {
      $comments = $_POST['comments'];
    }

    if (!$errors) {

      //Enviamos los mails al cliente y usuario
      $app = new App;
      
      $sendClient = $app->sendEmail('Cliente', 'Contacto Cliente', $_POST);
      $sendUser = $app->sendEmail('Usuario', 'Contacto Usuario', $_POST);

      if ($sendClient) {
        // Redirigimos a la pagina de gracias
        ?>
        <script type="text/javascript">
          // Mostrar mensaje de exito
          document.getElementById("message").style.display = "inline-block";
        </script>
        <?php
      } else {
        ?>
        <script type="text/javascript">
          // Mostrar mensaje de error
          document.getElementById("message-error").style.display = "inline-block";
        </script>
        <?php
      }
      
    }

  }
?>