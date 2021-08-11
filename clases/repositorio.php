<?php

abstract class Repositorio {
  protected $repositorioProducts;
  protected $repositorioUsers;

  public function getRepositorioProducts() {
    return $this->repositorioProducts;
  }

  public function getRepositorioUsers() {
    return $this->repositorioUsers;
  }

}

?>