<?php

abstract class repositorioProducts {
  public abstract function getProducts();
  public abstract function getImages();
  public abstract function getProductById($id);
  public abstract function getImagesByProductId($id);
  public abstract function saveProduct($post);
}

?>
