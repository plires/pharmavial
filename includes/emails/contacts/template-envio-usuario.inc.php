<?php 

//preparamos el mensaje de confirmacion que le enviaremos al remitente.
$body = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Pharmavial</title>

  <style type="text/css">
  </style>    
</head>
<body style="margin:0; padding:0; background-color:#fff;">
  <center>
    <table bgcolor="#fff" width="95%" border="0" cellpadding="0" cellspacing="0">
      <tr>
           <td height="40" style="font-size:16px; line-height:30px;">&nbsp;</td>
       </tr>
      <tr>
      <tr>
        <td align="center" valign="top">
          <img src="http://pharmavial.com.ar/img/header/header-logo-pharmavial.png" style="margin:0; padding:0; border:none; display:block;" border="0" alt="logo" /> 
        </td>
      </tr>
       <tr>
           <td height="40" style="font-size:16px; line-height:30px;">&nbsp;</td>
       </tr>
      <tr>
          <td align="center" valign="top">
            <strong>Hola '.$post['name'].', gracias por su contacto!</strong> <br>
            <p>
                Nos comunicaremos con usted lo antes posible.
            </p>

          </td>
      </tr>
      
      <tr>
           <td height="40" style="font-size:16px; line-height:30px;">&nbsp;</td>
       </tr>

    </table>
  </center>
</body>
</html>
';

?>