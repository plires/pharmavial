<?php

include_once('../includes/config.inc.php');
require_once("repositorio.php");
require_once("repositorioProductsSQL.php");
require_once("repositorioUsersSQL.php");

class RepositorioSQL extends Repositorio {

  protected $conexion;

  /**
   * [__construct Establece la conexion con la base]
   */
  public function __construct() {

    try {
      $this->conexion = new PDO(DSN, DB_USER, DB_PASS);
    } catch (Exception $e) {
      echo 'No se pudo conectar a la base de datos. Error: '. $e .' intente mas tarde...';
    }

    $this->repositorioProducts = new RepositorioProductsSQL($this->conexion);
    $this->repositorioUsers = new RepositorioUsersSQL($this->conexion);

  }
}

?>
