<?php
require __DIR__  . '/../backend/vendor/autoload.php';

require_once("repositorioProducts.php");

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

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

  public function uploadImage($file, $post) {

    if ( empty($file) || empty($post) ) {
      header("HTTP/1.1 500 Internal Server Error");
    }

    $alt = '';
    $alt = isset($post['alt']);
    $product_id = (int)$post['product_id'];

    $name = md5(rand(100, 200));

    $ext = explode('.',$_FILES['image']['name']);

    $filename = $name.'.'.$ext[1];

    $destination = $_SERVER['DOCUMENT_ROOT'] . 'img/productos/'.$filename;

    $location =  $_FILES['image']['tmp_name'];

    try {

      // Optimizar imagen
      self::optimizeImage($filename, $location);

      // Insertar en base de datos
      $sql = "INSERT INTO images values(default, :url, :alt, :product_id)";

      $stmt = $this->conexion->prepare($sql);
      
      $stmt->bindValue(":url", $filename, PDO::PARAM_STR);
      $stmt->bindValue(":alt", $alt, PDO::PARAM_STR);
      $stmt->bindValue(":product_id", $product_id, PDO::PARAM_STR);
            
      $save = $stmt->execute();

      return $save;

    } catch (Exception $e) {

      // lanzar error
      header("HTTP/1.1 500 Internal Server Error");

    }

  }

  public function deleteImage($id)
  {

    $sql = "DELETE FROM images WHERE id='$id'";
    $stmt = $this->conexion->prepare($sql);
    $image_delete = $stmt->execute();

    return $image_delete;

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

  function optimizeImage($filename, $location) {
    // Optimizar imagen
    $manager = new ImageManager(array('driver' => 'imagick'));

    $image = $manager->make($location)
      ->resize(600, 400)
      ->encode('jpg', 60)
      ->save($_SERVER['DOCUMENT_ROOT'] . 'img/productos/'.$filename, 90);
  }

}

?>
