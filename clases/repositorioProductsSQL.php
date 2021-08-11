<?php
require __DIR__  . '/../vendor/autoload.php';

require_once("repositorioProducts.php");

class RepositorioProductsSQL extends repositorioProducts 
{
  protected $conexion;

  public function __construct($conexion) 
  {
    $this->conexion = $conexion;
  }

  public function getProductById($id)
  {
    $sql = "
      SELECT * FROM products
      WHERE id = '$id'
    ";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    return $product;

  }

  public function getImagesByProductId($id)
  {
    $sql = "
      SELECT * FROM images
      WHERE product_id = '$id'
    ";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $images;

  }

  public function getProducts()
  {
    $sql = "SELECT * FROM products ORDER BY name ASC";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $products;

  }

  public function getImages()
  {
    $sql = "SELECT * FROM images";

    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $images;

  }

}

?>
