<?php

abstract class repositorioProducts {
  public abstract function getProducts();
  public abstract function getImages();
  public abstract function getProductById($id);
  public abstract function getImagesByProductId($id);
  public abstract function saveProduct($post);
  public abstract function addProduct($post);
  public abstract function uploadImage($file, $post);
  public abstract function uploadPdf($file, $post);
  public abstract function delCurrentProspect($id);
  public abstract function deleteProduct($id);
}

?>
