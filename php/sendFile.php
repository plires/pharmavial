<?php

  // Envio del CV
  if (isset($_POST["sendFile"])) {

    $app = new App;

    $errorsCV = $app->checkUploadCV($_FILES['cv']);
      
		if (!$errorsCV) {

      $sendClient = $app->sendEmail('Cliente CV', 'Send CV Cliente', $_FILES['cv']);
      
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