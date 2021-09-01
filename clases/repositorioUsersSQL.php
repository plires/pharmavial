<?php

require_once("repositorioUsers.php");

class RepositorioUsersSQL extends repositorioUsers
{
  protected $conexion;

  public function __construct($conexion) 
  {
    $this->conexion = $conexion;
  }

  public function login($user, $password)
  {

    $pass = md5($password);

    $sql = "
      SELECT * 
      FROM users
      WHERE user = '$user'
      AND pass = '$pass'
    ";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;

  }

  public function getUserById($id)
  {
    $sql = "SELECT * FROM users WHERE id = '$id' ";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;

  }

  public function setValuesUser($data)
  {

    $id = (int)$data['id_user'];

    $sql = "UPDATE users SET user = :user, email = :email WHERE id = '$id' ";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":user", $data['user'], PDO::PARAM_STR);
    $stmt->bindValue(":email", $data['email'], PDO::PARAM_STR);

    return $stmt->execute();

  }

  public function getUserByEmail($email)
  {

    $sql = "
      SELECT * 
      FROM users
      WHERE email = '$email'
    ";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user;

  }

  public function sendNewPassword($user)
  {

    $new_pass = substr( md5(microtime()), 1, 8);

    $id = (int)$user['id'];

    $sql = "UPDATE users SET pass = :pass WHERE id = '$id' ";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":pass", md5($new_pass), PDO::PARAM_STR);

    $set_new_pass = $stmt->execute();

    if ($set_new_pass) {

      $to = $user['email'];
      $subject = "Reset de contraseña";
      $message = "Tu nueva contraseña es: " . $new_pass;
      $headers = 'From: info@pharmavial.com.ar' . "\r\n" .
      'Reply-To: info@pharmavial.com.ar' . "\r\n" .
      'X-Mailer: PHP/' . phpversion();
       
      $send_email = mail($to, $subject, $message, $headers);

    }

    return $send_email;

  }

  public function setPasswordUser($data)
  {

    $id = (int)$data['id_user'];

    $sql = "UPDATE users SET pass = :pass WHERE id = '$id' ";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":pass", md5($data['pass']), PDO::PARAM_STR);

    return $stmt->execute();

  }

}

?>
