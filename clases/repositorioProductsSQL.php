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

  public function saveProduct($post)
  {

    $id = $post['id_product'];

    $sql = "
      UPDATE products SET 
        name = :name, 
        active_principle = :active_principle, 
        presentation = :presentation,
        units_per_box = :units_per_box,
        pharmaceutical_form = :pharmaceutical_form,
        therapeutic_line = :therapeutic_line,
        link = :link,
        language = :language
      WHERE id = '$id' ";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":name", $post['name'], PDO::PARAM_STR);
    $stmt->bindValue(":active_principle", $post['active_principle'], PDO::PARAM_STR);
    $stmt->bindValue(":presentation", $post['presentation'], PDO::PARAM_STR);
    $stmt->bindValue(":units_per_box", $post['units_per_box'], PDO::PARAM_STR);
    $stmt->bindValue(":pharmaceutical_form", $post['pharmaceutical_form'], PDO::PARAM_STR);
    $stmt->bindValue(":therapeutic_line", $post['therapeutic_line'], PDO::PARAM_STR);
    $stmt->bindValue(":link", $post['link'], PDO::PARAM_STR);
    $stmt->bindValue(":language", $post['language'], PDO::PARAM_STR);

    return $stmt->execute();

  }

}

?>
