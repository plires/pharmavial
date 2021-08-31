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

    $alt = '';
    $alt = $post['alt'];
    $product_id = (int)$post['product_id'];

    $name = md5(rand(100, 200));

    $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    $filename = $name.'.'.$ext;

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
      $stmt->bindValue(":product_id", $product_id, PDO::PARAM_INT);

      $save = $stmt->execute();
      $id = $this->conexion->lastInsertId();

      $result['save'] = $save;
      $result['image_add'] = $id;

      return $result;

    } catch (Exception $e) {

      // lanzar error
      header("HTTP/1.1 500 Internal Server Error");

    }

  }

  public function moveFileInDirectory($file, $post) {
    $product_id = (int)$post['product_id'];

    $name = md5(rand(100, 200));

    $ext = pathinfo($file['uploadProspect']['name'], PATHINFO_EXTENSION);

    $filename = $name.'.'.$ext;

    $destination = $_SERVER['DOCUMENT_ROOT'] . 'prospectos/'.$filename;

    $location =  $file['uploadProspect']['tmp_name'];

    $data_upload['product_id'] = $product_id;
    $data_upload['new_filename'] = $filename;
    $data_upload['move_file'] =  move_uploaded_file( $location, $destination );

    return $data_upload;

  }

  public function uploadPdf($file, $post) {

    try {

      // Mover el archivo al directorio
      $data_upload = $this->moveFileInDirectory($file, $post);
      
      $product_id = $data_upload['product_id'];
      $new_filename = $data_upload['new_filename'];
      $move_file = $data_upload['move_file'];

      if ($move_file) {

        // Insertar en base de datos
        $save_in_bdd = $this->saveNewProspectInBdd($product_id, $new_filename);

        //Borrar el PDF antiguo del servidor si el registro nuevo se guardo correctamente
        if ( $save_in_bdd && $post['old_file_name_prospect'] ) {
          $this->deleteOldProspectFile($post['old_file_name_prospect']);
        }

        return $save_in_bdd;
      }

      
    } catch (Exception $e) {
      
      // lanzar error
      header("HTTP/1.1 500 Internal Server Error");

    }

  }

  public function deleteOldProspectFile($prospect) {
    unlink( $_SERVER['DOCUMENT_ROOT'] . 'prospectos/' . $prospect );
  }

  public function saveNewProspectInBdd($product_id, $new_filename) {

    $sql = "UPDATE products SET link = :link WHERE id = '$product_id' ";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindValue(":link", $new_filename, PDO::PARAM_STR);
    return $stmt->execute();

  }

  public function deleteImage($id)
  {

    $name_image = $this->getNameImage($id);

    $sql = "DELETE FROM images WHERE id='$id'";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $image_deleted_from_bdd = $stmt->rowCount();

    //Borrar fisicamente la imagen del servidor
    if ( $image_deleted_from_bdd ) {
      unlink( $_SERVER['DOCUMENT_ROOT'] . 'img/productos/' . $name_image );
    }

    return $image_deleted_from_bdd;

  }

  public function getNameImage($id) {
    $sql = "SELECT * FROM images WHERE id = '$id'";
    $stmt = $this->conexion->prepare($sql);
    $stmt->execute();
    $image_to_delete_from_server = $stmt->fetch(PDO::FETCH_ASSOC);
    return $image_to_delete_from_server['url'];
  }

  public function delCurrentProspect($id)
  {

    $sql = "UPDATE products SET link = :link WHERE id = '$id' ";
    $stmt = $this->conexion->prepare($sql);
    $stmt->bindValue(":link", '', PDO::PARAM_STR);
    return $stmt->execute();

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

  public function addProduct($post) {
    
    try {

      // Insertar en base de datos
      $sql = "INSERT INTO products values(default, :name, :active_principle, :presentation, :units_per_box, :pharmaceutical_form, :therapeutic_line, :link, :language)";

      $stmt = $this->conexion->prepare($sql);

      $stmt->bindValue(":name", $post['name'], PDO::PARAM_STR);
      $stmt->bindValue(":active_principle", $post['active_principle'], PDO::PARAM_STR);
      $stmt->bindValue(":presentation", $post['presentation'], PDO::PARAM_STR);
      $stmt->bindValue(":units_per_box", $post['units_per_box'], PDO::PARAM_STR);
      $stmt->bindValue(":pharmaceutical_form", $post['pharmaceutical_form'], PDO::PARAM_STR);
      $stmt->bindValue(":therapeutic_line", $post['therapeutic_line'], PDO::PARAM_STR);
      $stmt->bindValue(":link", '', PDO::PARAM_STR);
      $stmt->bindValue(":language", $post['language'], PDO::PARAM_STR);

      return $stmt->execute();

    } catch (Exception $e) {

      // lanzar error
      header("HTTP/1.1 500 Internal Server Error");

    }

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
        language = :language
      WHERE id = '$id' ";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindValue(":name", $post['name'], PDO::PARAM_STR);
    $stmt->bindValue(":active_principle", $post['active_principle'], PDO::PARAM_STR);
    $stmt->bindValue(":presentation", $post['presentation'], PDO::PARAM_STR);
    $stmt->bindValue(":units_per_box", $post['units_per_box'], PDO::PARAM_STR);
    $stmt->bindValue(":pharmaceutical_form", $post['pharmaceutical_form'], PDO::PARAM_STR);
    $stmt->bindValue(":therapeutic_line", $post['therapeutic_line'], PDO::PARAM_STR);
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
