<?php 

////////////////////////
///Valores URI
////////////////////////
define('URI', $_SERVER['REQUEST_URI']);
define ('BASE', (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' );

////////////////////////
///Valores de DB Remota
////////////////////////
define('DSN', 'mysql:host=localhost;dbname=lc_pharmavial;charset=utf8;port:3306');
define('DB_USER', 'homestead');
define('DB_PASS', 'secret');

//////////////////////////////
///Valores de Envio de emails
//////////////////////////////
// define('EMAIL_PASS', 'envioinstituto2020'); // No se pasa este valor por GodaDdy
define('SMTP', 'localhost'); // Valor especial por GoDaddy
define('EMAIL_SENDER', 'info@laboratorioibc.com.ar');
define('EMAIL_SENDER_SHOW', 'info@laboratorioibc.com.ar');
define('NAME_SENDER_SHOW', 'Instituto Biológico Contemporaneo');
// define('EMAIL_RECIPIENT', 'info@laboratorioibc.com.ar');
define('EMAIL_RECIPIENT', 'carlos.castro.1975.2@gmail.com');
define('EMAIL_BCC', '');
define('EMAIL_PORT', 25);

define('EMAIL_NAME', 'Instituto Biológico Contemporaneo');
define('EMAIL_SUBJECT', 'Gracias por tu contacto');
define('EMAIL_CHARSET', 'utf-8');
define('EMAIL_ENCODING', 'quoted­printable');

?>