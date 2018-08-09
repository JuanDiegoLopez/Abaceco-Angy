<?PHP
 $descripcion = $_POST['descripcion'];
 $precio = $_POST['precio'];
 $categoria = $_POST['categoria'];

 $conexion = pg_connect("host=localhost user=postgres port=5432 dbname=abaceco password=123456");

 $sql = "insert into articulos (descripcion_articulo, precio_articulo, codigo_categoria) values ('$descripcion','$precio','$categoria')";

 $result = pg_query($conexion,$sql);
 if (!$result) {;
  echo "Ocurrió un error.\n";
  exit;
  }
  else{
    header('Location:../tablas/articulosTabla.php');
  }
?>
