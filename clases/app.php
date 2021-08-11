<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

  class App 
  {

    public function sendEmail($destinatario, $template, $post)
    {
      switch ($destinatario) {
        case 'Cliente':
          $emailDestino = EMAIL_RECIPIENT;
          if (isset($post['name'])) {
            $nameShow = $post['name'];
            $emailAddReplyTo = $post['email'];
            $emailBCC = EMAIL_BCC;
          } else {
            $nameShow = $post['email'];
            $emailAddReplyTo = $post['email'];
            $emailBCC = EMAIL_BCC;
          }
          $emailShow = EMAIL_SENDER;  // Mi cuenta de correo
          break;
        
        case 'Usuario':
          $emailDestino = $post['email'];
          $nameShow = NAME_SENDER_SHOW;
          $emailShow = EMAIL_RECIPIENT;  // Mi cuenta de correo
          $emailAddReplyTo = EMAIL_SENDER_SHOW;
          $emailBCC = '';
          break;

        case 'Cliente CV':
          $emailDestino = EMAIL_RECIPIENT;
          $nameShow = 'Sitio Web Laboratorio IBC';
          $emailAddReplyTo = EMAIL_SENDER;
          $emailBCC = EMAIL_BCC;
          $emailShow = EMAIL_SENDER;  
          break;
      }

      if ($_SESSION['lang'] === 'es') {
        $path = '';
      } else {
        $path = '../';
      }

      switch ($template) {
        case 'Contacto Cliente':
          include($path."includes/emails/contacts/template-envio-cliente.inc.php"); // Cargo el contenido del email a enviar al cliente.
          $subject = 'Nueva consulta desde el formulario web.';
          break;
        
        case 'Contacto Usuario':
          include($path."includes/emails/contacts/template-envio-usuario.inc.php"); // Cargo el contenido del email a enviar al usuario.
          $subject = 'Gracias por su contacto.';
          break;

        case 'Send CV Cliente':
          $this->uploadCV($post);

          include($path."includes/emails/cv/template-envio-cliente.inc.php"); // Cargo el contenido del email a enviar al cliente.
          $subject = 'Envio de CV desde Formulario web.';
          break;
      }

      // Instantiation and passing `true` enables exceptions
      $mail = new PHPMailer(true);

      $mail->isSMTP();
      $mail->Host = 'localhost';
      $mail->SMTPAuth = false; // Esto tiene que estar asi por GoDaddy
      $mail->SMTPAutoTLS = false; // Esto tiene que estar asi por GoDaddy
      $mail->Port = EMAIL_PORT; 

      $mail->IsHTML(true); 
      $mail->CharSet = EMAIL_CHARSET;

      $mail->From = $emailShow; // Email desde donde envío el correo.
      $mail->FromName = $nameShow; // Nombre para mostrar en el envío del correo.
      $mail->AddAddress($emailDestino); // Esta es la dirección a donde enviamos los datos del formulario
      $mail->AddReplyTo($emailAddReplyTo); // Esto es para que al recibir el correo y poner Responder, lo haga a la cuenta del visitante. 
      $mail->Subject = $subject; // Este es el asunto del email.
      $mail->Body = $body; // Texto del email en formato HTML
      // FIN - VALORES A MODIFICAR //
      
      if ($emailBCC != '') { // si no esta vacio el campo BCC
        $mail->addBCC($emailBCC, $subject); // Copia del email
      }

      $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
      );

      // $mail->SMTPDebug  = 2;


      $send = $mail->Send(); 
      
      return $send;

    }

    public function getURLBase()
    {

      return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['REQUEST_URI']
      );

    }

    public function randomString()
    {
      return md5(rand(100, 200));
    }

    public function uploadCV($cv)
    {

      $name = $this->randomString();
      $ext = explode('.',$cv['name']);
      $filename = $name.'.'.$ext[1];

      // Cargamos la en variable de session el la ruta y nombre del archivo subido
      $_SESSION['cv'] = $filename;

      // $destination = $_SERVER['DOCUMENT_ROOT'] . '/IBC/sitio/uploads/' .$filename; // Para Local
      $destination = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$filename; // Para Produccion
      $location =  $cv['tmp_name'];

      return move_uploaded_file($location,$destination);

    }

    public function checkUploadCV($cv)
    {

      $errorsCV = [];

      if ($cv['size'] === 0) {

        if ($_SESSION['lang'] === 'es') {
          $errorsCV['empty'] = "Falta cargar un CV (máx: 2mb)";
        } else {
          $errorsCV['empty'] = "Upload a CV (máx: 2mb) (PDF, XLS, XLSX, DOC, DOCX, JPG, PNG & GIF).";
        }

      }

      if ($cv['size'] > 2000000) {

        if ($_SESSION['lang'] === 'es') {
          $errorsCV['size'] = "Tamaño máximo de archivo: 2mb";
        } else {
          $errorsCV['size'] = "Maximum file size: 2mb";
        }
        
      }

      if(
        $cv['type'] != "image/jpeg" && 
        $cv['type'] != "png" && 
        $cv['type'] != "gif" && 
        $cv['type'] != "application/pdf" && 
        $cv['type'] != "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" && 
        $cv['type'] != "application/vnd.ms-excel" && 
        $cv['type'] != "application/msword" && 
        $cv['type'] != "application/vnd.openxmlformats-officedocument.wordprocessingml.document" ) {

        if ($_SESSION['lang'] === 'es') {
          $errorsCV['type'] = "Tipos de archivos permitidos: PDF, XLS, XLSX, DOC, DOCX, JPG, PNG & GIF.";
        } else {
          $errorsCV['type'] = "Allowed file types: PDF, XLS, XLSX, DOC, DOCX, JPG, PNG & GIF.";
        }

      }

      return $errorsCV;

    }

  }

?>